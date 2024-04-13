<?php
// Mulai sesi PHP
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

    require_once 'koneksi.php';

    // Siapkan dan jalankan kueri SQL untuk menambahkan like ke dalam kolom like pada tabel post
    $sql = "UPDATE post SET `likes` = `likes` + 1 WHERE id_post = ?";

    echo $sql;
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();

    // Tutup statement dan koneksi
    $stmt->close();
    $connection->close();

    header('Location: meme.php');
    exit();
} else {
    header('Location: home.php');
    exit();
}
