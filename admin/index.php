<?php
// Panggil auth.php untuk mengecek apakah pengguna sudah login
include '../includes/auth.php';

// Koneksi ke database
include '../includes/db.php';

// Ambil data artikel dari database
$result = $conn->query("SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <a href="create.php">Add New Article</a>
    <h2>Artikel List</h2>
    <table border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Nah bro fr delete this?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
