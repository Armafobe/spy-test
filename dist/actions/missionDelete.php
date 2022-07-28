<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM mission_contact WHERE mission_id = '$_POST[delete]'";
  $sql2 = "DELETE FROM mission_agent WHERE mission_id = '$_POST[delete]'";
  $sql3 = "DELETE FROM mission WHERE id = '$_POST[delete]'";
  $pdo->exec($sql);
  $pdo->exec($sql2);
  $pdo->exec($sql3);
  header('Location: ../index.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
