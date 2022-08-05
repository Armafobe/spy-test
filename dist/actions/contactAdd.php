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
  $sql = "INSERT INTO contact (last_name, first_name, birth_date, code_name, nationality_id) VALUES 
  ('$_POST[last_name]', 
  '$_POST[first_name]', 
  '$_POST[birth_date]', 
  '$_POST[code_name]', 
  '$_POST[nationality]')";
  mysqli_query($pdo, $sql);
  header('Location: ../contacts.php');
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
