<?php

require_once 'koneksi.php';

if (isset($_POST['nama'], $_POST['email'], $_POST['password'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    // Persiapkan kueri insert menggunakan parameter
    $stmt = $connection->prepare("INSERT INTO users (nama, email, sandi) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pwd);

    // Jalankan kueri
    $stmt->execute();

    // Tutup statement
    $stmt->close();
    $connection->close();

    // Redirect ke halaman login.php
    header("Location: login.php");
    exit();
} else {
    echo 'Masukkan Data-Data yang Diminta untuk Mendaftarkan Akun Anda.';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | P Gabut</title>
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


        #link-login {
            text-decoration: none;
            color: lightyellow;
        }

        #link-login:hover {
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
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" required>
                    </div>
                    <div class="input-form">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="input-form">
                        <label for="">Sandi</label>
                        <input class="form-control" type="text" name="password" id="password" required>
                    </div>
                    <div class="input-form">
                        <label for="">Konfirmasi Sandi</label>
                        <input class="form-control" type="text" required>
                    </div>
                    <div class="input-form">
                        <input class="btn-plus" type="submit" value="Daftar">
                    </div>
                </form>
                <div class="link-login-con">
                    <a class="input-form" id="link-login" href="login.php">Sudah Memiliki Akun?</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>