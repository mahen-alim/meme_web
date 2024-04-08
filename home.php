<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | P Gabut</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="img-con">
                <img class="logo" src="img/logo_meme.png" alt="">
            </div>
            <div class="nav-item">
                <ul>
                    <li><a href="home.php" class="active">Home</a></li>
                    <?php
                    // Periksa apakah session 'email' sudah ada
                    if (isset($_SESSION['email'])) {
                        // Jika sudah login, tampilkan link ke post.php
                    ?>
                        <li><a href="post.php">Post</a></li>
                    <?php
                    }
                    ?>
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
        <div class="container">
            <div class="img-icon">
                <img src="img/brokoli.avif" alt="">
                <div class="title-desc-con">
                    <h2>Selamat Datang Memers, Cari Meme Favoritmu!</h2>
                    <form action="">
                        <div class="search-con">
                            <select class="search-input" name="kategori" id="exampleInputPrice" style="font-family: Tilt Neon, sans-serif; font-size: 15px;">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Meme Receh">Meme Receh</option>
                                <option value="Meme Halal">Meme Halal</option>
                                <option value="Meme Candid">Meme Candid</option>
                                <option value="Meme Random">Meme Random</option>
                            </select>
                            <select class="search-input" name="gender" id="exampleInputPrice" style="font-family: Tilt Neon, sans-serif; font-size: 15px;">
                                <option value="" disabled selected>Pilih Gender</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <input class="btn-meme" type="submit" value="Cari" style="font-family: Tilt Neon, sans-serif; font-size: 15px;">
                        </div>
                    </form>
                </div>
            </div>
            <div class="post">
                <a href="post.php" class="any-post">
                    <img class="post-logo" src="img/receh.jpg" alt="">
                    <h3>Meme Receh Post</h3>
                </a>
                <a href="post.php" class="any-post">
                    <img class="post-logo" src="img/moslem.avif" alt="">
                    <h3>Meme Halal Post</h3>
                </a>
                <a href="post.php" class="any-post">
                    <img class="post-logo" src="img/brokoli.avif" alt="">
                    <h3>Meme Candid Post</h3>
                </a>
                <a href="post.php" class="any-post">
                    <img class="post-logo" src="img/botak.avif" alt="">
                    <h3>Meme Random Post</h3>
                </a>
            </div>


            <div class="card">
                <div class="col-img">
                    <img class="desc-logo" src="img/brokoli.avif" alt="">
                </div>
                <div class="con-txt">
                    <h2>Website ini sebenarnya dibuat untuk internal golongan C. Namun kamu juga bisa mengakses dan mengirimkan sticker-sticker random, nanti kita akan tampilkan disini sesuai dengan kategori yang website ini sediakan. Terimakasih ya!</h2>
                    <label for="line" class="underline-desc"></label>
                </div>
            </div>


            <div class="card">
                <div class="list-txt">
                    <div class="head-collect">
                        <h2>Koleksi Meme/Sticker</h2>
                        <a href="post.php" class="btn-add-collect">+</a>
                    </div>
                    <div class="sub-list-meme">
                        <div class="col-list-img">
                            <img class="desc-logo" src="img/cahaya-ilahi.jpg" alt="">
                            <img class="desc-logo" src="img/halo-dek.jpg" alt="">
                            <img class="desc-logo" src="img/medure.jpg" alt="">
                            <img class="desc-logo" src="img/ok-sip.jpg" alt="">
                        </div>
                    </div>
                    <label for="line" class="underline-list"></label>
                </div>
            </div>


            <div class="review-con">
                <p>Ulasan</p>
                <div class="rev-scroll">
                    <div class="rev-card">
                        <img class="post-logo" src="img/brokoli.avif" alt="">
                        <h3>"web baji***n, lucunya gak ketulungan. Wkwkwkwk 🤣"</h3>
                    </div>
                    <div class="rev-card">
                        <img class="post-logo" src="img/botak.avif" alt="">
                        <h3>"web baji***n, lucunya gak ketulungan. Wkwkwkwk 🤣"</h3>
                    </div>
                    <div class="rev-card">
                        <img class="post-logo" src="img/receh.jpg" alt="">
                        <h3>"web baji***n, lucunya gak ketulungan. Wkwkwkwk 🤣"</h3>
                    </div>
                    <div class="rev-card">
                        <img class="post-logo" src="img/brokoli.avif" alt="">
                        <h3>"web baji***n, lucunya gak ketulungan. Wkwkwkwk 🤣"</h3>
                    </div>
                    <div class="rev-card">
                        <img class="post-logo" src="img/botak.avif" alt="">
                        <h3>"web baji***n, lucunya gak ketulungan. Wkwkwkwk 🤣"</h3>
                    </div>
                    <div class="rev-card">
                        <img class="post-logo" src="img/receh.jpg" alt="">
                        <h3>"web baji***n, lucunya gak ketulungan. Wkwkwkwk 🤣"</h3>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="footer-txt-con">
                    <h3>Halaman</h3>
                    <a href="home.php">Home</a>
                    <a href="post.php">Post</a>
                    <a href="#">Profil</a>
                    <div class="sosmed-flex">
                        <a href="#">
                            <img src="img/wa.png" alt="">
                        </a>
                        <a href="#">
                            <img src="img/fb.png" alt="">
                        </a>
                        <a href="#">
                            <img src="img/yt.png" alt="">
                        </a>
                        <a href="#">
                            <img src="img/ig.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="footer-txt-con">
                    <h3>Meme</h3>
                    <a href="#">Kategori</a>
                    <a href="#">Postingan</a>
                    <a href="#">Favorit</a>
                    <a href="#">Ulasan</a>
                </div>
                <div class="footer-txt-con">
                    <h3>Narahubung</h3>
                    <a href="#">📞 0895807400305</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Ketika dokumen dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen h2
            var h2Element = document.querySelector('.title-desc-con h2');
            // Tambahkan kelas "active" ke elemen h2 setelah jeda singkat
            setTimeout(function() {
                h2Element.classList.add('active');
            }, 100);
            // Dapatkan semua elemen dengan kelas "any-post"
            var anyPostElements = document.querySelectorAll('.any-post');
            // Iterasi melalui setiap elemen dan tambahkan kelas "active" setelah jeda singkat
            anyPostElements.forEach(function(element) {
                setTimeout(function() {
                    element.classList.add('active');
                }, 100);
            });

        });
    </script>


</body>

</html>