<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Forum Gamingowe</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require_once "auth.php";
$user = current_user();

$res = $conn->query("SELECT posts.*, users.name FROM posts JOIN users ON posts.user_id=users.id ORDER BY id DESC");
?>

<header>
  <h1>🎮 Forum Gamingowe </h1>
  <nav>
    <?php if ($user): ?>
      Witaj, <?= htmlspecialchars($user['name']) ?> (<?= $user['role'] ?>)
      | <a href="logout.php">Wyloguj</a>
      | <a href="post_add.php">Nowy post</a>
    <?php else: ?>
      <a href="login.php">Zaloguj</a> | <a href="register.php">Zarejestruj</a>
    <?php endif; ?>
  </nav>
</header>

<main>
  <?php while($row = $res->fetch_assoc()): ?>
    <article>
      <h2><?= htmlspecialchars($row['title']) ?></h2>
      <div class="meta">Autor: <?= htmlspecialchars($row['name']) ?> | <?= $row['created_at'] ?></div>
      <p><?= nl2br(htmlspecialchars($row['body'])) ?></p>
      <?php if ($user && ($user['role']=='admin' || $user['id']==$row['user_id'])): ?>
        <a href="post_edit.php?id=<?= $row['id'] ?>">Edytuj</a>
        <a href="post_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Usunąć?')">Usuń</a>
      <?php endif; ?>
    </article>
  <?php endwhile; ?>

</main>

</body>
</html>
