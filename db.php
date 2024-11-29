<?php

// Konfigurasi db
$host = 'localhost';
$dbname = 'simple_crud'; // nama database
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "koneksi berhasil"; //untuk debugging
}catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

?>