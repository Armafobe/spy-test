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
  $sql = "DELETE FROM agent_skill WHERE skill_id = '$_POST[delete]'";
  $sql2 = "DELETE FROM skill WHERE id = '$_POST[delete]'";
  $sql3 = "DELETE FROM mission WHERE skill_id = '$_POST[delete]'";
  mysqli_query($pdo, $sql);
  mysqli_query($pdo, $sql2);
  mysqli_query($pdo, $sql3);
  header('Location: ../skills.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
