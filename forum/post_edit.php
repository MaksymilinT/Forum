<?php
require_once "auth.php";
require_login();
$user = current_user();
$id = $_GET['id'];

$res = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $res->fetch_assoc();

if (!$post) die("Post nie istnieje");
if ($user['role']!='admin' && $post['user_id']!=$user['id']) die("Brak uprawnień");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $stmt = $conn->prepare("UPDATE posts SET title=?, body=? WHERE id=?");
  $stmt->bind_param("ssi", $title, $body, $id);
  $stmt->execute();
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Edycja</title></head>
<body>
<h2>Edycja posta</h2>
<form method="post">
  <input name="title" value="<?= htmlspecialchars($post['title']) ?>"><br>
  <textarea name="body"><?= htmlspecialchars($post['body']) ?></textarea><br>
  <button>Zapisz</button>
</form>
</body></html>
