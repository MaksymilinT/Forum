<?php
session_start();
require_once "db.php";

function current_user() {
  global $conn;
  if (!isset($_SESSION['user_id'])) return null;
  $id = $_SESSION['user_id'];
  $res = $conn->query("SELECT * FROM users WHERE id=$id");
  return $res->fetch_assoc();
}

function require_login() {
  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
  }
}
?>
