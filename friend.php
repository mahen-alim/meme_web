<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend | P Gabut</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: black;
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
            height: 50px;
            height: auto;
            margin-top: 100px;
            border: 1px solid white;
            gap: 500px;
            justify-content: space-between;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 10px;
        }

        .search-con:hover {
            cursor: pointer;
        }

        .search-con img {
            width: 30px;
            height: 30px;
            margin-top: 15px;
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
            width: max-content;
            height: 100px;
            display: flex;
            flex-direction: row;
            border: 1px solid white;
            border-radius: 10px;
            padding: 20px;
            gap: 30px;
            box-shadow: 2px 2px 20px 2px white;
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

        .line {
            width: 93%;
            height: 1px;
            background-color: white;
            margin-top: -60px;
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
                    <li><a href="home.php" class="active" disabled>Home</a></li>
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
        <div class="search-con">
            <h5>Search...</h5>
            <img src="img/search.png" alt="">
        </div>
        <div class="body-con">
            <div class="card">
                <img src="img/brokoli.avif" alt="">
                <h5>ini nama teman</h5>
                <img src="img/follow.png" alt="">
            </div>
            <div class="line"></div>
            <h5 id="comen">ini pesan...</h5>
        </div>
    </div>

</body>

</html>