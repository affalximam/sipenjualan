<?php

$host = "127.0.0.1"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$database = "pytzch_cybertech"; // Ganti dengan nama database Anda

// Buat koneksi ke database menggunakan MySQLi
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Setel charset menjadi UTF8 (opsional)
$conn->set_charset("utf8");


// Jika ingin menggunakan PDO, gunakan kode berikut:
/*
try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Setel mode error PDO ke exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Setel charset menjadi UTF8 (opsional)
    $conn->exec("set names utf8");
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
*/

?>
