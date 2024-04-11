<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend | P Gabut</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            height: 100rem;
            background: linear-gradient(to top, lightyellow, white);
            color: white;
            font-family: "Tilt Neon", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "XROT" 0, "YROT" 0;
            overflow-x: hidden;
            /* Mencegah pengguliran horizontal */
        }

        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }


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

        .nav-item ul {
            list-style-type: none;
            padding: 0;
            margin-left: 50px;
            margin-top: 23px;
        }

        .nav-item ul li {
            display: inline-block;
            /* Membuat tautan sejajar secara horizontal */
            margin-right: 10px;
            /* Jarak antara tautan */
        }

        .nav-item ul li a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: lightyellow;
            border-radius: 10px;
        }

        .nav-item ul li a:hover {
            background-color: lightyellow;
            color: black;
        }

        .nav-item ul li a.active {
            background-color: lightyellow;
            color: black;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 120px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 46px;
            /* Atur jarak dari sisi kanan */
            margin-top: 35px;
            border-radius: 20px;
        }

        /* Style untuk tombol profil */
        .btn-auth-profil {
            background-color: transparent;
            border: none;
            cursor: pointer;
            margin-right: 80px;
            /* Atur jarak dari sisi kanan */
            float: right;
        }

        /* Style untuk tautan dalam dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Style untuk tautan dalam dropdown saat dihover */
        .dropdown-content a:hover {
            background-color: lightyellow;
            border-radius: 20px;
        }

        .nav-btn-auth {
            display: flex;
            margin-left: auto;
            margin-top: 30px;
            font-size: 15px;
            text-align: center;
        }

        .btn-auth {
            text-decoration: none;
            color: lightyellow;
            margin-right: 20px;
            height: 20px;
            padding: 5px;
        }

        .btn-auth:hover {
            background-color: lightyellow;
            color: black;
            border-radius: 10px;
        }

        .search-con {
            display: flex;
            width: max-content;
            height: auto;
            margin-top: 100px;
            border: 1px solid #ccc;
            gap: 10px;
            justify-content: space-between;
            padding: 10px;
            border-radius: 10px;
            align-items: center;
            background-color: white;
        }

        #icon-search {
            font-size: 30px;
            color: #ccc;
        }

        #find {
            width: 520px;
            background-color: white;
            border: 1px solid #ccc;
            align-items: flex-start;
            color: black;
            padding: 5px;
            border-radius: 5px;
            font-weight: medium;
            font-size: 15px;
        }


        .body-con {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
            gap: 20px;
        }

        .card {
            width: 100%;
            height: 100px;
            display: flex;
            flex-direction: row;
            border-radius: 10px;
            padding: 20px;
            gap: 58px;
            border: 1px solid #ccc;
            background-color: white;
            color: black;
        }

        .card img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }

        .card img:hover {
            cursor: pointer;
        }

        .card h5 {
            margin-top: 10px;
            margin-right: 306px;
        }

        #comen {
            margin-top: -10px;
            margin-left: -490px;
            color: #ccc;
        }

        #comen:hover {
            cursor: pointer;
        }

        .txt-users-con {
            display: flex;
            flex-direction: column;
            margin-top: -10px;
            margin-left: -30px;
        }

        .txt-users-con h6 {
            font-weight: lighter;
            margin-top: -20px;
            color: black;
        }

        .txt-users-con i {
            width: 128%;
            border: 2px dashed black;
            border-radius: 10px;
            margin-top: 10px;
        }

        .txt-users-con p {
            margin-top: 13px;
            font-size: 15px;
        }

        .ph {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <nav class="navbar">
            <div class="img-con">
                <img class="logo" src="img/meme-c2.png" alt="">
            </div>
            <div class="nav-item">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <?php
                    // Periksa apakah session 'email' sudah ada
                    if (isset($_SESSION['email'])) {
                        // Jika sudah login, tampilkan link ke post.php
                    ?>
                        <li><a href="post.php">Post</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="meme.php">Meme</a></li>
                    <li><a href="friend.php" class="active" disabled>Teman</a></li>
                    <li><a href="about_me.php">Tentang Kami</a></li>
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
        <form action="" method="get">
            <div class="search-con">
                <input type="text" name="find" id="find">
                <i class="ph ph-magnifying-glass" id="icon-search"></i>
            </div>
        </form>
        <div class="body-con">
            <?php
            require 'koneksi.php';

            $sql = "SELECT * FROM users";
            $hasil = mysqli_query($connection, $sql);
            $nomer = 1;
            while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
            ?>
                <div class="card">
                    <img src="img/brokoli.avif" alt="">
                    <div class="txt-users-con">
                        <h5><?php echo $data['nama']; ?></h5>
                        <h6><?php echo $data['meme_favorit']; ?></h6>
                        <i></i>
                        <p>ini pesan...</p>
                    </div>
                    <i class="ph ph-user-plus"></i>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>