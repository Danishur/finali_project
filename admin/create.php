<?php include '../includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Add New Article</title>
</head>
<body>
  <h1>Add New Article</h1>
  <form action="process.php" method="POST">
    <input type="hidden" name="action" value="create">
    <input type="text" name="title" placeholder="Article Title" required>
    <textarea name="content" placeholder="Article Text" rows="10" required></textarea>
    <button type="submit">Save</button>
  </form>
</body>
</html>