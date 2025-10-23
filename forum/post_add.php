<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Nowy post</title>
  </head>
<body>
<h2>Nowy post</h2>
<form method="post">
  <input name="title" placeholder="Tytuł" required><br>
  <textarea name="body" placeholder="Treść" required></textarea><br>
  <button>Dodaj</button>
</form>

<?php
require_once "auth.php";
require_login();
$user = current_user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $stmt = $conn->prepare("INSERT INTO posts (title,body,user_id) VALUES (?,?,?)");
  $stmt->bind_param("ssi", $title, $body, $user['id']);
  $stmt->execute();
  header("Location: index.php");
}
?>


</body>
</html>
