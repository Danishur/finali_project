<?php
include '../includes/db.php';
include '../includes/auth.php';

$id = (int)$_GET['id'];
$stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header('Location: index.php');
exit();
?>