<?php
session_start(); // Mulai session untuk memverifikasi login

// Jika session username tidak ada, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php"); // Redirect ke halaman login jika belum login
    exit(); // Hentikan eksekusi script lebih lanjut
}
