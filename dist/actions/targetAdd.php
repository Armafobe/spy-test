<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reset = "ALTER TABLE target auto_increment = 0;";
  $sql = "INSERT INTO target (last_name, first_name, birth_date, code_name, nationality_id, mission_id) VALUES ('$_POST[last_name]', '$_POST[first_name]', '$_POST[birth_date]', '$_POST[code_name]', '$_POST[nationality_id]', '$_POST[mission_id]')";
  $pdo->exec($reset);
  $pdo->exec($sql);
  header('Location: ../targets.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
