<?php
session_start();
require 'koneksi.php';

// Pastikan data yang diterima dari AJAX tersedia dan tidak kosong
if (isset($_POST['id_post'], $_POST['comment'])) {
    // Tangkap data yang dikirimkan melalui AJAX
    $id_post = $_POST['id_post'];
    $comment = $_POST['comment'];

    // Periksa apakah email telah disimpan dalam session
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Query SQL untuk mengambil id_users berdasarkan email dari session
        $sql = "SELECT id_users FROM users WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Jika query berhasil dieksekusi dan mengembalikan hasil
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_users = $row['id_users'];

            // Query SQL untuk menyisipkan komentar ke dalam tabel comments
            $sql_insert = "INSERT INTO comments (id_post, id_users, comment) VALUES (?, ?, ?)";
            $stmt_insert = $connection->prepare($sql_insert);
            $stmt_insert->bind_param("iis", $id_post, $id_users, $comment);

            // Eksekusi query
            if ($stmt_insert->execute()) {
                // Jika penyisipan berhasil, kirimkan pesan sukses ke AJAX
                echo "Komentar berhasil disimpan";
            } else {
                // Jika terjadi kesalahan saat menjalankan query, kirimkan pesan error ke AJAX
                echo "Terjadi kesalahan saat menyimpan komentar";
            }

            // Tutup statement dan koneksi database
            $stmt_insert->close();
        } else {
            // Jika email tidak ditemukan dalam database, kirimkan pesan error ke AJAX
            echo "Email tidak ditemukan";
        }

        // Tutup statement dan koneksi database
        $stmt->close();
    } else {
        // Jika session email tidak tersedia, kirimkan pesan error ke AJAX
        echo "Session email tidak tersedia";
    }

    // Tutup koneksi database
    $connection->close();
} else {
    // Jika data yang diterima dari AJAX tidak lengkap, kirimkan pesan error
    echo "Data yang diterima tidak lengkap";
}
