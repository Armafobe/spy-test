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
  $sql = "INSERT INTO hideout (code, address, type, country_id, mission_id) VALUES ('$_POST[code]', '$_POST[address]', '$_POST[type]', '$_POST[country_id]', '$_POST[mission_id]')";
  foreach (mysqli_query($pdo, "SELECT name FROM country WHERE id = '$_POST[country_id]'") as $c) {
    foreach (mysqli_query($pdo, "SELECT country FROM mission WHERE id = '$_POST[mission_id]'") as $m) {
      if (($c['name'] != $m['country'])) {
        header('Location: ../hideouts.php');
      } else {
        mysqli_query($pdo, $sql);
        header('Location: ../hideouts.php');
      }
    }
  }
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
