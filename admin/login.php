<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website_artikel";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa username dan password
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        // Jika login berhasil, mulai session dan simpan data user
        session_start();
        $_SESSION['username'] = $username;

        // Redirect ke halaman admin/index.php
        header("Location: /finali.project/admin/index.php");
        exit(); // Pastikan tidak ada output setelah header
    } else {
        echo "Username atau password salah.";
    }
}
?>

<!-- Form Login -->
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
