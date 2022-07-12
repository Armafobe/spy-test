<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reset = "ALTER TABLE skill auto_increment = 0;";
  $sql = "INSERT INTO skill (name) VALUES ('$_POST[name]')";
  $pdo->exec($reset);
  $pdo->exec($sql);
  header('Location: ../skills.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
