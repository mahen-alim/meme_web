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
            float: right;
        }

        .btn-auth-profil img {
            width: 30px;
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

        #icon-search:hover {
            color: black;
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
            color: #ccc;
        }

        .txt-users-con p:hover {
            cursor: pointer;
            color: black;
        }

        .ph {
            font-size: 30px;
            color: #ccc;
        }

        .ph:hover {
            color: black;
            cursor: pointer;
        }

        /* Style the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Style the textarea */
        #commentField {
            width: 100%;
            resize: vertical;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        /* Style the submit button */
        #submitComment {
            background-color: white;
            color: black;
            padding: 10px 20px;
            border: 2px dashed black;
            border-radius: 10px;
            cursor: pointer;
        }

        #submitComment:hover {
            background-color: lightyellow;
        }

        .total_likes {
            width: max-content;
            height: 20px;
            background-color: white;
            margin-right: 20px;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            text-align: center;
            color: black;
        }

        .total_likes:hover {
            cursor: pointer;
        }

        .total_likes i {
            font-size: 24px;
            color: black;
        }

        .nav-btn-auth {
            display: flex;
            margin-left: auto;
            font-size: 15px;
            text-align: center;
            align-items: center;
            margin-top: 0px;
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
                require_once 'get_likes_count.php'; // Sertakan file dengan fungsi pengambilan jumlah likes

                // Panggil fungsi untuk mengambil jumlah likes
                $likesCount = getLikesCount();
                ?>

                <!-- Tampilkan label dengan jumlah likes -->
                <label class='total_likes' id='likesLabel'><i class='ph ph-bell'></i><?php echo $likesCount; ?></label>

                <?php
                // Setelah penanganan login, periksa apakah ada sesi email
                if (isset($_SESSION['email'])) {
                    // Jika ada, ubah tombol-tombol Login dan Register menjadi tombol profil
                    echo '<div class="dropdown">
                        <button class="btn-auth-profil" onclick="toggleDropdown()">
                            <img src="img/profil.png" alt="Profile">
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
                        <p id="openModal">ini pesan...</p>

                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <textarea id="commentField" placeholder="Tambahkan komentar..." rows="4"></textarea>
                                <button id="submitComment">Kirim</button>
                            </div>
                        </div>
                    </div>
                    <i class="ph ph-user-plus"></i>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("openModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap elemen label
            var likesLabel = document.getElementById('likesLabel');

            // Tambahkan event listener untuk menangani tindakan klik
            likesLabel.addEventListener('click', function() {
                // Kirim permintaan AJAX ke server untuk mengatur jumlah likes menjadi 0
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Tangkap respons dari server
                        var response = xhr.responseText;

                        // Perbarui jumlah likes pada label menjadi 0
                        likesLabel.textContent = 0;

                        // Tampilkan daftar pengguna yang melakukan like
                        alert(response);
                    }
                };

                // Kirim permintaan POST ke file PHP yang menghandle reset jumlah likes
                xhr.open('POST', 'reset_likes.php', true);
                xhr.send();
            });
        });
    </script>

</body>

</html>