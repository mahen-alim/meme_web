<?php
require 'koneksi.php';

if (isset($_POST['post_id'])) {

    $post_id = $_POST['post_id'];

    $sql = "SELECT c.comment, u.nama
            FROM comments AS c  
            JOIN users AS u ON c.id_users = u.id_users
            WHERE c.id_post = ?
            ORDER BY c.created_at DESC"; 
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Siapkan string untuk menampung semua komentar
        $comments = "";

        // Loop melalui setiap baris hasil
        while ($row = $result->fetch_assoc()) {
            // Tambahkan komentar ke dalam string
            $comments .= "<h5>" . $row['nama'] . ": " . $row['comment'] . "</h5>";
        }

        // Mengembalikan string komentar
        echo $comments;
    } else {
        // Jika tidak ada komentar, kirimkan pesan "Belum ada komentar"
        echo "Belum ada komentar";
    }

    $stmt->close();
    $connection->close();
} else {
    // Jika data yang diterima dari AJAX tidak lengkap, kirimkan pesan error
    echo "Data yang diterima tidak lengkap";
}