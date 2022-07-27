<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reset = "ALTER TABLE hideout auto_increment = 0;";
  $sql = "INSERT INTO hideout (code, address, type, country_id, mission_id) VALUES ('$_POST[code]', '$_POST[address]', '$_POST[type]', '$_POST[country_id]', '$_POST[mission_id]')";
  foreach ($pdo->query("SELECT name FROM country WHERE id = '$_POST[country_id]'") as $c) {
    foreach ($pdo->query("SELECT country FROM mission WHERE id = '$_POST[mission_id]'") as $m) {
      if (($c['name'] != $m['country'])) {
        header('Location: ../hideouts.php');
        echo 'Hideout must be located in mission country';
      } else {
        $pdo->exec($reset);
        $pdo->exec($sql);
        header('Location: ../hideouts.php');
      }
    }
  }
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
