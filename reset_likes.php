<?php
// Sertakan file koneksi ke database
require_once 'koneksi.php';

// Kueri SQL untuk mengatur jumlah likes kembali menjadi 0
$sql = "UPDATE post SET likes = 0";

// Eksekusi kueri SQL
if ($connection->query($sql) === TRUE) {
    // Jika berhasil, panggil get_liked_users.php untuk mendapatkan daftar pengguna yang melakukan like
    require_once 'get_liked_users.php';
} else {
    // Jika gagal, kirim pesan error
    echo "Error: " . $connection->error;
}
