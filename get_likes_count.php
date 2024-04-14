<?php
// File: get_likes_count.php

require_once 'koneksi.php'; // Sertakan file koneksi database

function getLikesCount()
{
    global $connection; // Gunakan koneksi database global

    // Kueri SQL untuk mengambil jumlah likes dari tabel post
    $sql = "SELECT SUM(likes) AS total_likes FROM post";

    // Jalankan kueri SQL
    $result = $connection->query($sql);

    // Periksa apakah kueri berhasil dieksekusi
    if ($result) {
        // Ambil jumlah likes dari hasil kueri
        $row = $result->fetch_assoc();
        $totalLikes = $row['total_likes'];

        // Kembalikan jumlah likes
        return $totalLikes;
    } else {
        // Jika kueri gagal, kembalikan pesan error
        return "Error: " . $connection->error;
    }
}
