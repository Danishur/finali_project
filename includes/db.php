<?php
$servername = "localhost"; // Server database (biasanya localhost)
$username = "root";        // Username database
$password = "";            // Password database (default kosong untuk XAMPP)
$dbname = "website_artikel"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
