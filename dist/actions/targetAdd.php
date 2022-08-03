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
  $sql = "INSERT INTO target (last_name, first_name, birth_date, code_name, nationality_id, mission_id) VALUES 
  ('$_POST[last_name]', 
  '$_POST[first_name]', 
  '$_POST[birth_date]', 
  '$_POST[code_name]', 
  '$_POST[nationality]', 
  '$_POST[mission]')";

  foreach (mysqli_query($pdo, "SELECT * FROM mission_agent WHERE mission_id = '$_POST[mission]'") as $ma) {
    foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE id = '$ma[agent_id]'") as $agent) {
      if ($_POST['nationality'] == $agent['nationality_id']) {
        header('Location: ../targets.php');
      } else {
        mysqli_query($pdo, $sql);
        header('Location: ../targets.php');
      }
    }
  }
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
