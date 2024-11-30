<?php
include '../includes/db.php';
include '../includes/auth.php';

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
  die('Article not found ¯\_(ツ)_/¯');
}

$article = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>Edit Article</title>
</head>
<body>
  <h1>Edit Article</h1>
  <form action="process.php" method="POST">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
    <input type="text" name="title" value="<?php echo $article['title']; ?>" required>
    <textarea name="content" rows="10" required><?php echo $article['content']; ?></textarea>
    <button type="submit">Save edit</button>
  </form>
</body>
</html>