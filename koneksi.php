<?php

$connection = new mysqli("localhost", "root", "", "human");

// Cek koneksi database
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    // echo 'connected to database';
}
