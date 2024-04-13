<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Meme | P Gabut</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <style>
        body {
            height: 100rem;
            scroll-behavior: smooth;
            overflow-x: hidden;
            background: linear-gradient(to top, lightyellow, white);
            font-family: "Tilt Neon", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "XROT" 0, "YROT" 0;
            overflow-x: hidden;

            /* Mencegah pengguliran horizontal */
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

        .img-icon {
            display: flex;
            width: 100%;
            padding: 50px;
            margin-top: -20px;
            gap: 110px;
        }

        .img-icon img {
            width: 300px;
            border-radius: 20px;
            margin-left: 110px;
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

        .btn-auth-profil img {
            width: 30px;
            height: 30px;
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

        /* Display Card */

        .row2 {
            margin-top: 200px;
            margin-left: 100px;
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .card {
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
            gap: 20px;
        }

        .sos-reac img {
            width: 30px;
            height: 30px;
        }

        .comen-con {
            display: flex;
            padding-top: 10px;
            gap: 400px;
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
        }

        .body-con h4 {
            font-weight: medium;
        }

        /* Title Container */

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
        <?php
        require_once 'koneksi.php'; // Sambungkan ke database

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil nilai dari form
            $kategori = $_POST['kategori'];

            // Atur judul sesuai dengan nilai yang dipilih dari form
            switch ($kategori) {
                case "Meme Receh":
                    $judul = "Meme Receh";
                    break;
                case "Meme Halal":
                    $judul = "Meme Halal";
                    break;
                case "Meme Candid":
                    $judul = "Meme Candid";
                    break;
                case "Meme Random":
                    $judul = "Meme Random";
                    break;
                default:
                    $judul = "Semua Postingan";
            }
        } else {
            // Default judul jika tidak ada pengiriman POST
            $judul = "Semua Postingan";
        }
        ?>

        <div class="title-container">
            <h3><?php echo $judul; ?></h3>
        </div>

        <div class="row2">
            <?php
            require_once 'koneksi.php'; // Sambungkan ke database

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Pemeriksaan apakah $_POST['kategori'] dan $_POST['gender'] sudah didefinisikan
                if (isset($_POST['kategori']) && isset($_POST['gender'])) {
                    // Ambil nilai dari form
                    $kategori = $_POST['kategori'];
                    $gender = $_POST['gender'];

                    // Query untuk pencarian berdasarkan kategori dan jenis kelamin
                    $sql = "SELECT users.nama, post.deskripsi, post.foto
                FROM users
                JOIN post ON users.id_users = post.id_users
                WHERE users.meme_favorit = ? AND post.jenis_kelamin = ?";

                    // Siapkan statement
                    $stmt = $connection->prepare($sql);
                    $stmt->bind_param("ss", $kategori, $gender);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // Menampilkan hasil pencarian dalam bentuk card
                        while ($row = $result->fetch_assoc()) {
            ?>
                            <div class="card">
                                <!-- Nama gambar diambil dari kolom foto pada tabel post -->
                                <h5><?php echo $row['foto']; ?></h5>
                                <!-- Gambar diambil dari folder uploads -->
                                <img src="uploads/<?php echo $row['foto']; ?>" alt="Gambar Postingan">
                                <div class="sos-reac">
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-solid fa-share"></i>
                                </div>
                                <div class="body-con">
                                    <h4><?php echo $row['nama']; ?></h4>
                                    <h6><?php echo $row['deskripsi']; ?></h6>
                                </div>
                                <div class="comen-con">
                                    <h5>Lihat semua XX komentar</h5>
                                    <!-- <i class="fa-solid fa-heart"></i> -->
                                </div>
                            </div>
            <?php
                        }
                    } else {
                        echo "Oops nggak ada nih."; // Pesan jika tidak ada hasil pencarian
                    }

                    // Tutup statement
                    $stmt->close();
                } else {
                    echo "Pilih kategori dan gender terlebih dahulu."; // Pesan jika kategori dan gender tidak didefinisikan
                }
            }
            ?>

        </div>
    </div>
</body>

</html>