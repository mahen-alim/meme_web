<?php
session_start();

// Periksa apakah pengguna belum login
if (!isset($_SESSION['email'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post | P Gabut</title>
    <link rel="stylesheet" href="post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            background: linear-gradient(to top, lightyellow, white);
            font-family: "Tilt Neon", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "XROT" 0, "YROT" 0;
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

        .row {
            margin-top: 130px;
        }

        .card {
            display: flex;
            gap: 48px;
        }

        .col-12 {
            margin-top: -45px;
            width: 40%;
            height: 100rem;
            border-right: 1px solid black;
        }

        .col-13 {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-top: -40px;
            background-color: white;
            margin-left: -47.5px;
            padding-left: 47px;
        }

        .input-form {
            margin: 20px;
            width: 85%;
        }

        .form-control {
            display: flex;
            margin-top: 10px;
            border-radius: 10px;
            width: 93%;
            height: 30px;
            border: 2px dashed black;
            padding-left: 10px;
        }

        .form-file {
            margin-top: 10px;
        }

        .area-control {
            display: flex;
            margin-top: 10px;
            border-radius: 10px;
            width: 90%;
            height: 250px;
            border: 2px dashed black;
            padding: 10px;
            resize: none;
        }

        .header-post {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
        }

        .img-post {
            width: 170px;
            height: 170px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .btn-plus {
            width: 95%;
            height: 40px;
            background-color: lightyellow;
            color: black;
            border: 2px dashed black;
            border-radius: 10px;
            margin-top: 30px;
        }

        .header-post-title {
            display: flex;
        }

        .header-post-title img {
            width: 30px;
            height: 30px;
            margin-top: 23px;
            margin-left: 10px;
        }

        #postTitle {
            width: max-content;
            padding: 10px;
            background-color: lightyellow;
            border-radius: 10px;
            border: 2px dashed black;
        }

        .newText {
            width: max-content;
            height: 20px;
            padding: 10px;
            background: linear-gradient(to top, lightyellow, #DCDCB3);
            border-radius: 10px;
            margin-left: 10px;
            margin-top: 20.5px;
            text-align: left;
            font-weight: bold;
            opacity: 0;
            transition: opacity 2s ease-in-out;
        }

        .newText:hover {
            cursor: pointer;
            background: linear-gradient(to bottom, lightyellow, #DCDCB3);
        }

        #arrowImg:hover {
            cursor: pointer;
        }

        .fadeIn {
            opacity: 1;
        }

        .btn-auth-profil img {
            width: 30px;
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
        }

        .total_likes:hover {
            cursor: pointer;
        }

        .total_likes i {
            font-size: 24px;
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
    <div class="container">
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
                        <li><a href="post.php" class="active">Post</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="meme.php">Meme</a></li>
                    <li><a href="friend.php">Teman</a></li>
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
        <div class="row">
            <div class="card">
                <div class="col-12">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="input-form">
                            <label for="">Nama</label>
                            <input class="form-control" type="text" name="nama" id="nama" required>
                        </div>
                        <div class="input-form">
                            <label for="">Jenis Kelamin</label>
                            <input class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin" required>
                        </div>
                        <div class="input-form">
                            <label for="">Deskripsi</label>
                            <textarea class="area-control" name="deskripsi" id="deskripsi"></textarea>
                        </div>
                        <div class="input-form">
                            <label for="">Foto Meme</label>
                            <input class="form-file" type="file" name="file" id="file" required>
                        </div>
                        <div class="input-form">
                            <input class="btn-plus" type="submit" value="Tambahkan" style="font-family: Tilt Neon, sans-serif; font-size: 15px;">
                        </div>
                    </form>
                </div>
                <div class="col-13">
                    <div class="header-post-title">
                        <h3 id="postTitle">Semua Postingan</h3>
                        <img id="arrowImg" src="img/all-arrow.png" alt="">
                    </div>

                    <div class="header-post">
                        <?php

                        if (isset($_SESSION['email'])) {
                            require_once 'koneksi.php'; // Sambungkan ke database

                            // Ambil email dari session
                            $email = $_SESSION['email'];

                            // Query untuk mendapatkan id_users dari tabel users berdasarkan email
                            $query_user_id = "SELECT id_users FROM users WHERE email = ?";
                            $stmt_user_id = $connection->prepare($query_user_id);
                            $stmt_user_id->bind_param("s", $email);
                            $stmt_user_id->execute();
                            $result_user_id = $stmt_user_id->get_result();
                            $row_user_id = $result_user_id->fetch_assoc();
                            $id_users = $row_user_id['id_users'];

                            // Query untuk mendapatkan nama file dari tabel post berdasarkan id_users
                            $query_files = "SELECT foto FROM post WHERE id_users = ?";
                            $stmt_files = $connection->prepare($query_files);
                            $stmt_files->bind_param("i", $id_users);
                            $stmt_files->execute();
                            $result_files = $stmt_files->get_result();

                            // Menampilkan gambar-gambar tersebut
                            while ($row_file = $result_files->fetch_assoc()) {
                                $filename = $row_file['foto'];
                        ?>
                                <img class="img-post" src="uploads/<?php echo $filename; ?>" alt="">
                        <?php
                            }

                            // Tutup koneksi dan statement
                            $stmt_files->close();
                            $stmt_user_id->close();
                            $connection->close();
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Membuat variabel untuk menyimpan status gambar (di sebelah kiri atau kanan)
        let imgOnLeft = true;

        // Mendapatkan elemen gambar dan judul postingan
        const arrowImg = document.getElementById('arrowImg');
        const postTitle = document.getElementById('postTitle');

        // Menambahkan event listener untuk klik pada gambar
        arrowImg.addEventListener('click', function() {
            // Menghapus teks yang sudah ada
            const newTextElements = document.querySelectorAll('.newText');
            newTextElements.forEach(element => {
                element.parentNode.removeChild(element);
            });

            // Mengubah teks judul postingan
            if (imgOnLeft) {
                // Menambahkan teks dengan efek fade-in
                setTimeout(() => {
                    postTitle.insertAdjacentHTML('afterend', '<span class="newText">Meme Receh</span>');
                    postTitle.nextElementSibling.classList.add('fadeIn');
                }, 100);

                setTimeout(() => {
                    postTitle.insertAdjacentHTML('afterend', '<span class="newText">Meme Halal</span>');
                    postTitle.nextElementSibling.classList.add('fadeIn');
                }, 200);

                setTimeout(() => {
                    postTitle.insertAdjacentHTML('afterend', '<span class="newText">Meme Candid</span>');
                    postTitle.nextElementSibling.classList.add('fadeIn');
                }, 300);

                setTimeout(() => {
                    postTitle.insertAdjacentHTML('afterend', '<span class="newText">Meme Random</span>');
                    postTitle.nextElementSibling.classList.add('fadeIn');
                }, 400);
            }

            // Mengubah gambar dan menggesernya ke kanan atau kiri
            if (imgOnLeft) {
                arrowImg.src = 'img/all-arrow.png';
            } else {
                arrowImg.src = 'img/all-arrow.png';
            }

            // Memperbarui status gambar (di sebelah kiri atau kanan)
            imgOnLeft = !imgOnLeft;
        });
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