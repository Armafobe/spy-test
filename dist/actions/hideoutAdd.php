<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reset = "ALTER TABLE hideout auto_increment = 0;";
  $sql = "INSERT INTO hideout (code, address, type, country_id, mission_id) VALUES ('$_POST[code]', '$_POST[address]', '$_POST[type]', '$_POST[country_id]', '$_POST[mission_id]')";
  $pdo->exec($reset);
  $pdo->exec($sql);
  header('Location: ../hideouts.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
