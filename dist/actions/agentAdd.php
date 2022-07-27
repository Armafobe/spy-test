<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $reset = "ALTER TABLE agent auto_increment = 0;";
  $pdo->exec($reset);
  $sql = "INSERT INTO agent (last_name, first_name, birth_date, code_id, nationality_id) VALUES ('$_POST[last_name]', '$_POST[first_name]', '$_POST[birth_date]', '$_POST[code_id]', '$_POST[nationality]')";
  $pdo->exec($sql);
  foreach ($pdo->query("SELECT * from agent WHERE last_name = '$_POST[last_name]'") as $agent) {
    $sql2 = "INSERT INTO agent_skill (agent_id, skill_id) VALUES ('$agent[id]', '$_POST[skill]')";
  }
  $pdo->exec($sql2);
  header('Location: ../agents.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
