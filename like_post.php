<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    // Jika belum, alihkan ke halaman login
    header('Location: login.php');
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah mengalihkan
}

// Periksa apakah data post_id telah diterima dari formulir
if (isset($_POST['post_id'])) {
    // Tangkap nilai post_id dari formulir
    $post_id = $_POST['post_id'];

    // Sertakan file koneksi database
    require_once 'koneksi.php';

    // Ambil id_users berdasarkan email dari session
    $email = $_SESSION['email'];
    $sql_user = "SELECT id_users FROM users WHERE email = ?";
    $stmt_user = $connection->prepare($sql_user);
    $stmt_user->bind_param("s", $email);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    // Periksa apakah pengguna dengan email yang sesuai ditemukan
    if ($result_user->num_rows > 0) {
        $user_data = $result_user->fetch_assoc();
        $user_id = $user_data['id_users'];

        // Query untuk menyimpan riwayat like
        $sql = "INSERT INTO riwayat_like (id_post, id_user) VALUES (?, ?)";

        // Persiapkan statement
        $stmt = $connection->prepare($sql);

        // Bind parameter dan jalankan kueri
        $stmt->bind_param("ii", $post_id, $user_id);
        $stmt->execute();

        // Tutup statement dan koneksi
        $stmt->close();
    } else {
        echo "User not found.";
    }

    // Query untuk menambahkan like ke postingan
    $sql_add_like = "UPDATE post SET likes = likes + 1 WHERE id_post = ?";

    // Persiapkan statement
    $stmt_add_like = $connection->prepare($sql_add_like);

    // Bind parameter dan jalankan kueri
    $stmt_add_like->bind_param("i", $post_id);
    $stmt_add_like->execute();

    // Tutup statement
    $stmt_add_like->close();
    header('Location: meme.php');
} else {
    // Jika data post_id tidak diterima, alihkan ke halaman lain
    header('Location: home.php');
    exit();
}
