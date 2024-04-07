<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    // Jika belum, arahkan kembali ke halaman login atau tindakan lain yang sesuai
    header("Location: login.php");
    exit();
}

// Sambungkan ke database
require_once 'koneksi.php';

// Ambil email dari sesi
$email = $_SESSION['email'];

// Periksa jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $gender = $_POST['gender'];

    // Persiapkan kueri untuk memperbarui data pengguna
    $stmt = $connection->prepare("UPDATE users SET nama=?, meme_favorit=?, gender=? WHERE email=?");
    $stmt->bind_param("ssss", $nama, $kategori, $gender, $email);

    // Jalankan kueri update
    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Persiapkan kueri untuk mengambil nama, meme favorit, dan gender berdasarkan email
$stmt = $connection->prepare("SELECT nama, meme_favorit, gender FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah hasilnya ditemukan
if ($result->num_rows > 0) {
    // Ambil baris hasil dan simpan nama, meme favorit, dan gender ke dalam variabel
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $kategori = $row['meme_favorit'];
    $gender = $row['gender'];
} else {
    // Jika tidak ditemukan, lakukan tindakan yang sesuai (misalnya, arahkan kembali ke halaman login)
    header("Location: login.php");
    exit();
}

// Tutup koneksi dan statement
$stmt->close();
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <!-- Link ke profil.css -->
    <link rel="stylesheet" href="profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
</head>

<body>
    <div class="back-con">
        <a href="javascript:history.back()">
            <img src="img/back3.png" alt="" style="width: 30px; margin-top: 25px; margin-right: 20px;">
        </a>
        <h1>Profil Pengguna</h1>
    </div>
    <div class="row">
        <div class="card">
            <div class="col-12">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
                    <div class="input-form">
                        <label for="email">Nama</label>
                        <input class="form-control" type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                    </div>
                    <div class="input-form">
                        <label for="password">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="<?php echo $email; ?>" required readonly>
                    </div>
                    <div class="input-form">
                        <label for="email">Meme Favorit</label>
                        <select class="form-select-control" name="kategori" id="kategori">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Meme Receh" <?php if ($kategori == 'Meme Receh') echo 'selected'; ?>>Meme Receh</option>
                            <option value="Meme Halal" <?php if ($kategori == 'Meme Halal') echo 'selected'; ?>>Meme Halal</option>
                            <option value="Meme Candid" <?php if ($kategori == 'Meme Candid') echo 'selected'; ?>>Meme Candid</option>
                            <option value="Meme Random" <?php if ($kategori == 'Meme Random') echo 'selected'; ?>>Meme Random</option>
                        </select>
                    </div>
                    <div class="input-form">
                        <label for="email">Gender</label>
                        <select class="form-select-control" name="gender" id="exampleInputPrice">
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" <?php if ($gender == 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($gender == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                            <option value="Lainnya" <?php if ($gender == 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                        </select>
                    </div>

                    <div class="input-form">
                        <input class="btn-plus" type="submit" value="Edit">
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>