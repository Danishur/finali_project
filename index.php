<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>Komcad Article</title>
</head>
<body>
  <h1>Article List</h1>
  <ul>
    <?php
    $result = $conn->query("SELECT id, title, created_at FROM articles ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()) {
      echo "<li><a href='article.php?id={$row['id']}'>{$row['title']}</a> <em>({$row['created_at']})</em></li>";
    }
    ?>
  </ul>
</body>
</html>