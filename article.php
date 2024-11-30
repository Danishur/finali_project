<?php
include 'includes/db.php';

if (!isset($_GET['id'])) {
  die('Article not found ¯\_(ツ)_/¯');
}

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT title, content, created_at FROM articles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  die('Article not found ¯\_(ツ)_/¯');
}

$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="article.css">
  <title><?php echo $article['title']; ?></title>
</head>
<body>
  <h1><?php echo $article['title']; ?></h1>
  <p><em>Published: <?php echo $article['created_at']; ?></em></p>
  <div>
    <?php echo nl2br($article['content']); ?>
  </div>
  <a href="index.php">Back</a>
</body>
</html>