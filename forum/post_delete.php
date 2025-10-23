<?php
require_once "auth.php";
require_login();
$user = current_user();
$id = $_GET['id'];

$res = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $res->fetch_assoc();

if ($user['role']=='admin' || $user['id']==$post['user_id']) {
  $conn->query("DELETE FROM posts WHERE id=$id");
}
header("Location: index.php");
?>