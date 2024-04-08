<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sambungkan ke database
    require_once 'koneksi.php'; // Sesuaikan dengan file koneksi Anda

    // Ambil data yang dikirimkan melalui form
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $deskripsi = $_POST['deskripsi'];

    // Cek apakah file sudah diunggah dengan benar
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Simpan informasi file yang diunggah
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];

        // Pindahkan file yang diunggah ke direktori yang diinginkan
        $upload_path = 'uploads/' . $file_name; // Sesuaikan dengan direktori penyimpanan Anda
        move_uploaded_file($file_tmp, $upload_path);
    } else {
        // Jika file tidak diunggah, berikan nama default atau lakukan tindakan lainnya
        $file_name = 'default.jpg';
    }

    // Siapkan query SQL untuk memasukkan data ke tabel post
    $query = "INSERT INTO post (nama, jenis_kelamin, deskripsi, foto) VALUES (?, ?, ?, ?)";

    // Siapkan statement
    $stmt = $connection->prepare($query);

    // Bind parameter ke statement
    $stmt->bind_param("ssss", $nama, $jenis_kelamin, $deskripsi, $file_name);

    // Eksekusi statement
    $stmt->execute();

    // Tutup statement
    $stmt->close();

    // Tutup koneksi
    $connection->close();

    // Redirect ke halaman sukses atau halaman lain yang sesuai
    header("Location: post.php"); // Sesuaikan dengan halaman sukses Anda
    echo 'Data Post Berhasil Disimpan';
    exit();
} else {
    // Jika bukan metode POST, redirect ke halaman lain atau tampilkan pesan kesalahan
    header("Location: error.php"); // Sesuaikan dengan halaman error Anda
    exit();
}
