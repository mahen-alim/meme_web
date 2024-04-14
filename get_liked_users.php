<?php
session_start();

// Sertakan file koneksi database
require_once 'koneksi.php';

// Buat query untuk mendapatkan id_user terbaru dari tabel riwayat_like
$sql = "SELECT id_user FROM riwayat_like ORDER BY id DESC LIMIT 1";

// Persiapkan statements
$stmt = $connection->prepare($sql);

// Jalankan kueri
$stmt->execute();

// Simpan hasil kueri dalam variabel
$result = $stmt->get_result();

// Tangkap id_user terbaru
if ($row = $result->fetch_assoc()) {
    $id_user = $row['id_user'];

    // Buat query untuk mendapatkan nama pengguna berdasarkan id_user terbaru
    $sqlNama = "SELECT nama FROM users WHERE id_users = ?";

    // Persiapkan statement
    $stmtNama = $connection->prepare($sqlNama);
    $stmtNama->bind_param("i", $id_user);

    // Jalankan kueri
    $stmtNama->execute();

    // Simpan hasil kueri dalam variabel
    $resultNama = $stmtNama->get_result();

    // Inisialisasi array untuk menyimpan nama pengguna yang telah muncul
    $uniqueLikedUsers = array();

    // Loop untuk mengambil nama pengguna
    while ($rowNama = $resultNama->fetch_assoc()) {
        $uniqueLikedUsers[] = $rowNama['nama'];
    }

    // Gabungkan semua nama pengguna yang unik menjadi satu string
    $likedUsers = implode(", ", $uniqueLikedUsers);

    // Tampilkan daftar pengguna yang melakukan like sebagai respons
    echo $likedUsers;

    // Tutup statement dan koneksi
    $stmtNama->close();
}

$stmt->close();
$connection->close();
