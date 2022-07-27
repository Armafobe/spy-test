<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM agent_skill WHERE skill_id = '$_POST[delete]'";
  $sql2 = "DELETE FROM skill WHERE id = '$_POST[delete]'";
  $sql3 = "DELETE FROM mission WHERE skill_id = '$_POST[delete]'";
  $pdo->exec($sql);
  $pdo->exec($sql2);
  $pdo->exec($sql3);
  header('Location: ../skills.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
