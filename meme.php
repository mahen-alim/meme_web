<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meme | P Gabut</title>
    <script src="https://kit.fontawesome.com/924b40cfb7.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            scroll-behavior: smooth;
            overflow-x: hidden;
            background: linear-gradient(to top, lightyellow, white);
            font-family: "Tilt Neon", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "XROT" 0, "YROT" 0;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 200px;
        }

        .row2 {
            margin-left: 100px;
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .card {
            width: 450px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background-color: #fff;
            flex-basis: calc(20% - 10px);
            margin-bottom: 20px;
        }

        .card h5 {
            margin-top: -5px;
        }

        .card img {
            width: 100%;
            height: 250px;
            border-radius: 8px;
            margin-top: -10px;
        }

        .card img:hover {
            border-radius: 0px;
        }

        .sos-reac {
            display: flex;
            justify-content: flex-start;
            padding: 5px 0;
            gap: 10px;
        }

        .sos-reac img {
            width: 30px;
            height: 30px;
        }

        .comen-con {
            display: flex;
            margin-bottom: auto;
            background-color: lightyellow;
            overflow-y: auto;
            max-height: 30px;
            border-radius: 5px;
        }


        .comen-con h5 {
            margin: 0;
        }

        .con-logo-like-comen img {
            width: 20px;
            height: 20px;
        }

        .body-con {
            display: flex;
            font-weight: bold;
            gap: 10px;
            margin-top: -10px;
        }

        .body-con h5 {
            margin-top: 23px;
            font-weight: bold;
        }

        .body-con h6 {
            margin-top: 23.5px;
            font-weight: medium;
            font-size: 12px;
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


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0px;
            top: 0px;
            /* Atur jarak dari sisi kanan */
            margin-top: 30px;
            border-radius: 10px;
            border: 1px solid #ccc;
            align-items: center;
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

        .title-container {
            padding: 10px;
            text-align: start;
            margin-top: 100px;
            margin-bottom: -200px;
        }

        .title-container h3 {
            width: max-content;
            background-color: lightyellow;
            padding: 10px;
            border: 2px dashed black;
            border-radius: 10px;
            margin-left: 90px;
        }

        .btn-auth-profil img {
            width: 30px;
        }

        /* Style untuk tombol notifikasi */
        .notification-button {
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

        .like-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        /* Style for the love icon */
        .like-button i {
            font-size: 24px;
            padding: 3px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
            /* Add transition for smooth effect */
            cursor: pointer;
        }

        /* Hover effect */
        .like-button i:hover {
            background-color: #ff0000;
            /* Change background color on hover */
            color: white;
        }

        /* Active (clicked) effect */
        .like-button i.active {
            background-color: #ff0000;
            /* Change background color when clicked */
            color: white;
        }


        #sos-icon {
            font-size: 24px;
            padding: 3px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
            /* Add transition for smooth effect */
            cursor: pointer;
            margin-top: -3px;
        }

        #sos-icon:hover {
            background-color: lightyellow;
            color: black;
        }

        #sos-icon-dots {
            height: max-content;
            font-size: 24px;
            padding: 3px;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 1s;
            cursor: pointer;
            margin-left: auto;
            font-weight: bold;
            margin-top: -5px;
        }

        #sos-icon-dots:hover {
            background-color: lightyellow;
            color: black;
        }

        #sos-icon-download {
            height: max-content;
            font-size: 24px;
            padding: 3px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
            /* Add transition for smooth effect */
            cursor: pointer;
            margin-left: auto;
            font-weight: bold;
            margin-top: -5px;
        }

        #sos-icon-download:hover {
            background-color: lightyellow;
            color: black;
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

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .card-header-title-con {
            display: flex;
        }

        .card-header-title-con .dropdown {
            margin-left: auto;
            text-align: center;
        }


        .card-header-title-con h5 {
            margin-top: 5px;
        }

        .body-container {
            margin-top: 3px;
        }

        .modal-content textarea {
            width: 210px;
            resize: none;
            height: max-content;
            border-radius: 5px;
            text-align: start;
            border: 1px solid #ccc;
            color: black;
        }

        .modal-content button {
            border: none;
            border-radius: 5px;
            text-align: start;
            background-color: white;
            color: black;
            box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.2);
            font-family: "Tilt Neon", sans-serif;
            padding: 3px;
            height: max-content;
        }

        .modal-content button:hover {
            background-color: lightyellow;
            color: black;
            cursor: pointer;
        }

        .modal-content img {
            width: 300px;
            height: 300px;
            margin-top: 20px;
        }

        .pesan-container {
            margin-top: 10px;
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .pesan-container button i {
            font-size: 24px;
            margin-left: auto;
        }

        /* Style the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0px;
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
            border-radius: 10px;
            width: max-content;
            height: max-content;
            margin-top: 90px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Style the body content of modal */
        .body-con-modal {
            padding: 20px;
            margin-top: 20px;
        }

        /* Style headings */
        .body-con-modal h5 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .body-con-modal h6 {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        /* Style form input fields */
        .body-con-modal input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style form button */
        .body-con-modal button {
            width: 75%;
            background-color: lightyellow;
            color: black;
            padding: 10px 20px;
            border: 2px dashed black;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .body-con-modal button:hover {
            background-color: black;
            color: lightyellow;
        }

        .component_con label {
            width: 100px;
        }

        .component_con textarea {
            margin-left: -28px;
        }

        #edit-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            text-align: start;
            margin-top: 20px;
        }

        #edit-form #edited-input {
            width: 100%;
        }

        .component_con {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .btn-modal-con {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .btn-modal-con .close {
            width: max-content;
            background-color: black;
            color: lightyellow;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 15px;
        }

        /* Style untuk kontainer pesan */
        .pesan-container {
            margin-top: 10px;
            display: flex;
        }

        /* Style untuk textarea */
        .pesan-container textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            height: max-content;
        }

        /* Style untuk tombol */
        .pesan-container button {
            font-size: 24px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
            /* Add transition for smooth effect */
            cursor: pointer;
            margin-top: -3px;
            background-color: white;
        }

        /* Style untuk tombol saat dihover */
        .pesan-container button:hover {
            background-color: lightyellow;
            /* Warna latar belakang */
        }
    </style>
</head>

<body>
    <div class="title-container">
        <h3>Semua Postingan</h3>
    </div>
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
                        <li><a href="post.php">Post</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="meme.php" class="active" disabled>Meme</a></li>
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

        <div class="row2">
            <?php
            require 'koneksi.php';

            // Mendapatkan daftar semua file di folder "uploads/"
            $files = glob('uploads/*');

            // Mengurutkan file berdasarkan tanggal modifikasi (file terbaru akan berada di atas)
            array_multisort(array_map('filemtime', $files), SORT_DESC, $files);

            // Mengambil 12 file terbaru
            $latest_files = array_slice($files, 0, 12);

            // Menampilkan gambar-gambar tersebut dalam card
            foreach ($latest_files as $file) {
                // Mendapatkan nama file dari path
                $filename = basename($file);

                // Mengambil data nama dan deskripsi dari tabel users dan post
                $sql = "SELECT users.nama, post.deskripsi, post.foto, post.id_post, latest_comment.comment AS latest_comment, latest_comment.nama AS comment_author
                        FROM users
                        JOIN post ON users.id_users = post.id_users
                        LEFT JOIN (
                            SELECT c.comment, u.nama, c.id_post
                            FROM comments AS c  
                            JOIN users AS u ON c.id_users = u.id_users
                            ORDER BY c.created_at DESC
                        ) AS latest_comment ON post.id_post = latest_comment.id_post
                        WHERE post.foto = ?";

                $stmt = $connection->prepare($sql);
                $stmt->bind_param("s", $filename);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                    // Mendapatkan nama file dari kolom foto di tabel post
                    $foto = $data['foto'];
                    $post_id = $data['id_post'];
                    $deskripsi = $data['deskripsi'];
                    $comments = $data['latest_comment'];
            ?>
                    <div class="card">
                        <div class="card-header-title-con">
                            <h5><?php echo $filename; ?></h5>
                            <?php
                            // Periksa apakah pengguna telah login dan sesi email tersedia
                            if (isset($_SESSION['email']) && $_SESSION['email']) {
                                // Tampilkan dropdown hanya untuk pengguna dengan email 'mahennekkers27@gmail.com'
                            ?>
                                <div class="dropdown">
                                    <i class="ph ph-dots-three-vertical" id="sos-icon-dots"></i>
                                    <div class="dropdown-content" id="dropdown-content-private">
                                        <!-- Tambahkan data-postid untuk menampung ID post -->
                                        <a href="#" class="edit-link" data-postid="<?php echo $post_id; ?>">
                                            <img src="img/edit.png" alt="" style="width: 20px; height: 20px; margin-right: 10px;">Edit
                                        </a>
                                        <a href="#">
                                            <img src="img/delete.png" alt="" style="width: 20px; height: 20px; margin-right: 10px;">Delete
                                        </a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                        <div class="body-container">
                            <img src="<?php echo $file; ?>" alt="Gambar Postingan">
                            <div class="sos-reac">
                                <!-- Love icon -->

                                <form action="like_post.php" method="POST">
                                    <!-- Tambahkan input tersembunyi untuk menyimpan data yang akan dikirim -->
                                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $post_id; ?>">
                                    <button type="submit" class="like-button">
                                        <i class="ph ph-heart" onclick="toggleLike(this)"></i>
                                    </button>
                                </form>

                                <i class="ph ph-chat-circle" id="sos-icon"></i>
                                <i class="ph ph-share-fat" id="sos-icon"></i>
                                <i class="ph ph-download-simple" id="sos-icon-download"></i>
                            </div>

                            <div class="body-con">
                                <h5><?php echo $data['nama']; ?></h5>
                                <h6><?php echo $data['deskripsi']; ?></h6>
                            </div>
                            <div class="comen-con">
                                <h5 id="latest-comments"><?php echo $comments; ?></h5>
                            </div>

                            <div class="pesan-container">
                                <textarea id="comment-textarea-<?php echo $post_id; ?>" placeholder="Tulis komentar..."></textarea>
                                <!-- ID post dari postingan yang sesuai -->
                                <input type="hidden" id="post_id_<?php echo $post_id; ?>" value="<?php echo $post_id; ?>">
                                <button onclick="postComment(<?php echo $post_id; ?>)"><i class="ph ph-paper-plane-right"></i></button>
                            </div>


                        </div>

                        <!-- Modal -->
                        <div id="edit-modal-<?php echo $post_id; ?>" class="modal" style="display: none;">
                            <div class="modal-content">
                                <img src="<?php echo $file; ?>" alt="Gambar Postingan">
                                <div class="body-con-modal">
                                    <!-- Form untuk mengedit data -->
                                    <form class="edit-form">
                                        <!-- Input fields untuk mengedit data -->
                                        <div class="component_con">
                                            <label for="">Nama</label>
                                            <input type="text" class="edited-nama" value="<?php echo $data['nama']; ?>" style=" font-family: 'Tilt Neon', sans-serif;">
                                        </div>
                                        <div class="component_con">
                                            <label for="">Deskripsi</label>
                                            <textarea class="edited-deskripsi" cols="10" rows="5"><?php echo $data['deskripsi']; ?></textarea>
                                        </div>
                                        <div class="btn-modal-con">
                                            <button type="submit">Simpan Perubahan</button>
                                            <span class="close">Batal</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>

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

    <!-- Script untuk menampilkan modal -->
    <script>
        // Fungsi untuk menampilkan modal
        function showModal() {
            var modal = document.getElementById('commentModal');
            modal.style.display = 'block';
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            var modal = document.getElementById('commentModal');
            modal.style.display = 'none';
        }

        // Fungsi untuk mem-posting komentar (Anda dapat menyesuaikan fungsinya)
        function postComment() {
            // Ambil nilai komentar dari textarea
            var comment = document.querySelector('#commentModal textarea').value;
            // Lakukan sesuatu dengan komentar, misalnya kirim ke server atau tampilkan di halaman
            console.log('Komentar:', comment);
            // Tutup modal setelah posting
            closeModal();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var closeModal = $('.modal .close');

            // Mengaitkan event click untuk tombol edit di setiap card
            $('.edit-link').on('click', function(event) {
                event.preventDefault();
                // Mendapatkan ID post dari atribut data-postid
                var postId = $(this).data('postid');
                // Menampilkan modal yang sesuai dengan ID post
                $('#edit-modal-' + postId).css('display', 'block');
            });

            // Ketika tombol close pada modal ditekan, sembunyikan modal
            closeModal.on('click', function() {
                $(this).closest('.modal').css('display', 'none');
            });

            // Ketika user mengklik di luar modal, sembunyikan modal
            $(window).on('click', function(event) {
                if ($(event.target).hasClass('modal')) {
                    $(event.target).css('display', 'none');
                }
            });

            // Event listener untuk menyimpan perubahan pada form
            $('.edit-form').on('submit', function(event) {
                event.preventDefault();

                // Mengambil nilai dari input
                var nama = $(this).find('.edited-nama').val();
                var deskripsi = $(this).find('.edited-deskripsi').val();

                // Mengirim permintaan AJAX
                $.ajax({
                    url: 'update_data.php', // Lokasi file PHP untuk mengeksekusi query update
                    method: 'POST',
                    data: {
                        nama: nama,
                        deskripsi: deskripsi
                    }, // Data yang akan dikirimkan ke server
                    success: function(response) {
                        // Menutup modal setelah data berhasil diperbarui
                        $('.modal').css('display', 'none');
                        // Menampilkan pesan dari server setelah berhasil
                        alert(response);
                    },
                    error: function(xhr, status, error) {
                        // Menampilkan pesan kesalahan jika ada kesalahan saat mengirim permintaan
                        console.error(xhr.responseText);
                        alert('Terjadi kesalahan saat menyimpan data');
                    }
                });
            });
        });
    </script>

    <script>
        function postComment(post_id) {
            // Ambil nilai komentar dari textarea
            var comment = $('#comment-textarea-' + post_id).val();

            // Ambil nilai id_post dari input tersembunyi
            var id_post = $('#post_id_' + post_id).val();

            var latest_comments = $('#latest-comments-' + post_id).val();

            // Lakukan permintaan AJAX dengan nilai id_post yang sesuai
            $.ajax({
                url: 'insert_comment.php',
                method: 'POST',
                data: {
                    id_post: id_post,
                    comment: comment
                },
                success: function(response) {
                    // Handle success
                    alert(response);
                    // Kosongkan textarea setelah berhasil submit
                    $('#comment-textarea-' + post_id).val('');
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menyimpan komentar');
                }
            });
        }
    </script>

</body>

</html>