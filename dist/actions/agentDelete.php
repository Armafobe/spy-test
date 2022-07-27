<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM agent WHERE id = '$_POST[delete]'";
  $pdo->exec($sql);
  header('Location: ../agents.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
