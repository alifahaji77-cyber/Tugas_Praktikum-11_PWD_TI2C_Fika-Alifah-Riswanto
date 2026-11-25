<?php
// koneksi.php - Menghubungkan PHP dengan database db_perpustakaan
mysqli_report(MYSQLI_REPORT_OFF);

$host     = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan";

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa apakah koneksi gagal
if (!$koneksi) {
    die("Koneksi gagal: " . htmlspecialchars(mysqli_connect_error()));
}

// Mengatur karakter agar huruf dan simbol tersimpan dengan benar
mysqli_set_charset($koneksi, "utf8mb4");
?>