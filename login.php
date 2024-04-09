<?php

require_once 'koneksi.php';

session_start(); // Mulai sesi

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    // Persiapkan kueri untuk memeriksa apakah email dan sandi cocok
    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ? AND sandi = ?");
    $stmt->bind_param("ss", $email, $pwd);

    // Jalankan kueri
    $stmt->execute();

    // Simpan hasil kueri dalam variabel
    $result = $stmt->get_result();

    // Periksa apakah ada baris yang cocok
    if ($result->num_rows == 1) {
        // Pengguna berhasil login, simpan email dalam sesi
        $_SESSION['email'] = $email;

        // Arahkan ke halaman home.php
        header("Location: home.php");
        exit(); // Pastikan untuk keluar dari skrip setelah pengalihan halaman
    } else {
        // Email atau sandi salah, tampilkan pesan kesalahan
        echo 'Email atau sandi salah.';
    }

    // Tutup statement dan hasil kueri
    $stmt->close();
    $result->close();
} else {
    echo 'Masukkan Data-Data yang Diminta untuk Masuk ke Halaman Home.';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | P Gabut</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to top, lightyellow, white);
            font-family: "Tilt Neon", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "XROT" 0, "YROT" 0;
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .card {
            background-color: black;
            padding: 20px;
            margin: 100px;
            width: max-content;
            border-radius: 20px;
            color: white;
        }

        .input-form {
            margin: 20px;
        }

        .form-control {
            display: flex;
            margin-left: 180px;
            margin-top: -20px;
            border-radius: 20px;
            width: 300px;
            height: 30px;
            border: 2px solid lightyellow;
            padding-left: 10px;
        }

        .form-file {
            margin-left: 40px;
            border-radius: 10px;
        }

        .btn-plus {
            width: 100%;
            height: 40px;
            background-color: black;
            color: lightyellow;
            border: 2px solid lightyellow;
            border-radius: 50px;
            margin-top: 30px;
            font-weight: bold;
        }

        .btn-plus:hover {
            background-color: lightyellow;
            color: black;
        }

        #link-regis {
            text-decoration: none;
            color: lightyellow;
        }

        #link-regis:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="card">
            <div class="col-12">
                <form action="" method="post" autocomplete="off">
                    <div class="input-form">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="input-form">
                        <label for="password">Sandi</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="input-form">
                        <input class="btn-plus" type="submit" value="Masuk">
                    </div>
                </form>
                <div class="link-regis-con">
                    <a class="input-form" id="link-regis" href="register.php">Belum Memiliki Akun?</a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>