<?php
include '../includes/db.php';
include '../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'];
  $title = htmlspecialchars($_POST['title']);
  $content = htmlspecialchars($_POST['content']);

  if ($action === 'create') {
    $stmt = $conn->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    header('Location: index.php');
  } elseif ($action === 'edit') {
    $id = (int)$_POST['id'];
    $stmt = $conn->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    header('Location: index.php');
  }
}
?>