<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>logownie</title>
  <link rel="stylesheet" href="css/styl.css">
</head>
<body>
 
<div class="main">
<h2>🔐 Logowanie</h2>
<form method="post">
  <input name="email" placeholder="Email" type="email" required><br>
  <input name="password" placeholder="Hasło" type="password" required><br>
  <button>Zaloguj</button>
</form>
</div>

<?= isset($err)?$err:'' ?>


<?php
require_once "db.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $res = $conn->query("SELECT * FROM users WHERE email='$email'");
  $u = $res->fetch_assoc();
  if ($u && password_verify($pass, $u['password'])) {
    $_SESSION['user_id'] = $u['id'];
    header("Location: index.php");
    exit;
  } else {
    $err = "Nieprawidłowe dane logowania.";
  }
}
?>
</body>
</html>