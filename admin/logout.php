<?php
session_start(); // Mulai session

// Hapus semua session
session_unset();

// Hancurkan session
session_destroy();

// Arahkan ke halaman login setelah logout
header("Location: ../login.php");
exit();
?>