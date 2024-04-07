<?php

require_once 'koneksi.php';

if (isset($_POST['nama'], $_POST['usia'], $_POST['jenis_kelamin'], $_POST['pekerjaan'], $_POST['file'])) {
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];
    $file = $_POST['file'];

    // Persiapkan kueri insert menggunakan parameter
    $stmt = $connection->prepare("INSERT INTO profile (nama, usia, jenis_kelamin, pekerjaan, file) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $usia, $jenis_kelamin, $pekerjaan, $file);

    // Eksekusi kueri
    if ($stmt->execute()) {
        echo json_encode(array("message" => "Data inserted successfully"));
    } else {
        echo json_encode(array("message" => "Failed to insert data"));
    }

    // Tutup statement
    $stmt->close();
    $connection->close();
} else {
    echo json_encode([
        'message' => 'Title and/or content is not defined'
    ]);
}
