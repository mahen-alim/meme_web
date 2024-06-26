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
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        .footer-txt-con {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-left: 20px;
        }

        #meme-con {
            margin-left: -50px;
        }

        .desc-logo {
            width: 150px;
            height: 150px;
        }

        .post {
            width: 100%;
            display: flex;
            gap: 50px;
            text-align: center;
            justify-content: space-between;
        }

        .btn-auth-profil img {
            width: 30px;
        }

        /* Style untuk tombol notifikasi */
        .notification-btn {
            background-color: lightyellow;
            border: none;
            border-radius: 10px;
            color: black;
            padding: 10px 32px;
            text-align: center;
            font-size: 15px;
            margin: 2px 10px 20px;
            cursor: pointer;
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
        <div class="container">
            <div class="img-icon">
                <img src="img/brokoli.avif" alt="">
                <div class="title-desc-con">
                    <h2>Selamat Datang Memers, Cari Meme Favoritmu!</h2>
                    <form action="search_meme.php" method="post">
                        <div class="search-con">
                            <select class="search-input" name="kategori" id="exampleInputPrice" style="font-family: Tilt Neon, sans-serif; font-size: 15px;" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Meme Receh">Meme Receh</option>
                                <option value="Meme Halal">Meme Halal</option>
                                <option value="Meme Candid">Meme Candid</option>
                                <option value="Meme Random">Meme Random</option>
                            </select>
                            <select class="search-input" name="gender" id="exampleInputPrice" style="font-family: Tilt Neon, sans-serif; font-size: 15px;" required>
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
                <a href="meme.php" class="any-post">
                    <img class="post-logo" src="img/receh.jpg" alt="">
                    <h3>Meme Receh</h3>
                </a>
                <a href="meme.php" class="any-post">
                    <img class="post-logo" src="img/moslem.avif" alt="">
                    <h3>Meme Halal</h3>
                </a>
                <a href="meme.php" class="any-post">
                    <img class="post-logo" src="img/brokoli.avif" alt="">
                    <h3>Meme Candid</h3>
                </a>
                <a href="meme.php" class="any-post">
                    <img class="post-logo" src="img/botak.avif" alt="">
                    <h3>Meme Random</h3>
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
                            <?php
                            // Mendapatkan daftar semua file di folder "uploads/"
                            $files = glob('uploads/*');

                            // Mengurutkan file berdasarkan tanggal modifikasi (file terbaru akan berada di atas)
                            array_multisort(array_map('filemtime', $files), SORT_DESC, $files);

                            // Mengambil 6 file terbaru
                            $latest_files = array_slice($files, 0, 6);

                            // Menampilkan gambar-gambar tersebut
                            foreach ($latest_files as $file) {
                            ?>
                                <img class="desc-logo" src="<?php echo $file; ?>" alt="">
                            <?php
                            }
                            ?>
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
                <div class="footer-txt-con" id="meme-con">
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