<?php
$cleardb_url = parse_url(getenv("DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
try {
  $pdo = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  $count = "SELECT count(id) FROM agent";
  $reset = "ALTER TABLE agent AUTO_INCREMENT = ($count + 1)";
  mysqli_query($pdo, $reset);
  $sql = "INSERT INTO agent (last_name, first_name, birth_date, code_id, nationality_id) VALUES 
  ('$_POST[last_name]', 
  '$_POST[first_name]', 
  '$_POST[birth_date]', 
  '$_POST[code_id]', 
  '$_POST[nationality]')";
  mysqli_query($pdo, $sql);
  foreach ($pdo->query("SELECT * from agent WHERE last_name = '$_POST[last_name]'") as $agent) {
    $sql2 = "INSERT INTO agent_skill (agent_id, skill_id) VALUES ('$agent[id]', '$_POST[skill]')";
  }
  mysqli_query($pdo, $sql2);
  header('Location: ../agents.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
