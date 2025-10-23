<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styl.css">
  <title>Rejestracja</title>
</head>
<body>
<div class="main">
<h2>✍ Rejestracja</h2>
<form method="post">
  <input  name="name" placeholder="Login" required><br>
  <input name="email" placeholder="Email" type="email" required><br>
  <input name="password" placeholder="Hasło" type="password" required><br>
  <button>Zarejestruj</button>
</form>
<div>
<?= isset($err)?$err:'' ?>

<?php
require_once "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
  $stmt->bind_param("sss", $name, $email, $pass);
  if ($stmt->execute()) header("Location: login.php");
  else $err = "Email już istnieje!";
}
?>


</body>
</html>