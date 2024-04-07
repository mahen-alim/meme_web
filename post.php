<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | P Gabut</title>
    <link rel="stylesheet" href="post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <style>
        .navbar {
            width: 100%;
            display: flex;
            height: 85px;
            background-color: black;
            margin-bottom: 50px;
            border-radius: 10px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .logo {
            height: 85px;
        }

        .logo:hover {
            transition: 1000ms;
            transform: rotate(180deg);
            cursor: pointer;
        }

        .row {
            margin-top: 130px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="img-con">
                <img class="logo" src="img/logo_meme.png" alt="">
            </div>
            <div class="nav-item">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="post.php" class="active">Post</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                </ul>
            </div>
            <div class="nav-btn-auth">
                <?php
                // Setelah penanganan login, periksa apakah ada sesi email
                if (isset($_SESSION['email'])) {
                    // Jika ada, ubah tombol-tombol Login dan Register menjadi tombol profil
                    echo '<div class="dropdown">
                    <button class="btn-auth-profil" onclick="toggleDropdown()">
                        <img src="img/akun.png" alt="Profile">
                    </button>
                    <div id="dropdownMenu" class="dropdown-content" style="display: none;">
                        <a href="profil.php">Profil</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>';

                    echo '<script>
                    function toggleDropdown() {
                        var dropdownMenu = document.getElementById("dropdownMenu");
                        if (dropdownMenu.style.display === "block") {
                            dropdownMenu.style.display = "none";
                        } else {
                            dropdownMenu.style.display = "block";
                        }
                    }
                </script>';
                } else {
                    // Jika tidak ada sesi email, tampilkan tombol Login dan Register
                    echo '<a class="btn-auth" href="login.php">Login</a>';
                    echo '<a class="btn-auth" href="register.php">Register</a>';
                }
                ?>
            </div>

        </nav>
        <div class="row">
            <div class="card">
                <div class="col-12">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="input-form">
                            <label for="">Nama</label>
                            <input class="form-control" type="text" name="nama" id="nama">
                        </div>
                        <div class="input-form">
                            <label for="">Usia</label>
                            <input class="form-control" type="number" name="usia" id="usia">
                        </div>
                        <div class="input-form">
                            <label for="">Jenis Kelamin</label>
                            <input class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin">
                        </div>
                        <div class="input-form">
                            <label for="">Pekerjaan</label>
                            <input class="form-control" type="text" name="pekerjaan" id="pekerjaan">
                        </div>
                        <div class="input-form">
                            <label for="">Deskripsi</label>
                            <textarea class="area-control" name="deskripsi" id="deskripsi"></textarea>
                        </div>
                        <div class="input-form">
                            <label for="">Foto Meme</label>
                            <input class="form-file" type="file" name="file" id="file">
                        </div>
                        <div class="input-form">
                            <input class="btn-plus" type="submit" value="Tambahkan" style="font-family: Tilt Neon, sans-serif; font-size: 15px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>