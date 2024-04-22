<?php
// Memeriksa apakah permintaan datang melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah data nama dan deskripsi telah diterima
    if (isset($_POST['deskripsi']) && isset($_POST['id_post'])) {
        // Memperoleh data deskripsi dari permintaan POST
        $deskripsi = $_POST['deskripsi'];
        $id_post = $_POST['id_post'];

        require_once 'koneksi.php';

        // Mencegah SQL Injection dengan menggunakan prepared statement
        $stmt = $conn->prepare("UPDATE post SET deskripsi = ? WHERE id_post = ?");
        $stmt->bind_param("si", $deskripsi, $id_post);

        // Eksekusi pernyataan
        if ($stmt->execute()) {
            echo "Data berhasil diperbarui";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup pernyataan dan koneksi
        $stmt->close();
        $conn->close();
    } else {
        echo "Deskripsi tidak diterima";
    }
} else {
    echo "Metode permintaan yang tidak valid";
}
