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
  $sql = "INSERT INTO mission (title, description, code_name, country, start_date, end_date, skill_id, mission_type_id, mission_status_id) VALUES 
  ('$_POST[title]', 
  '$_POST[description]', 
  '$_POST[code_name]', 
  '$_POST[country]', 
  '$_POST[start_date]', 
  '$_POST[end_date]', 
  '$_POST[skill]', 
  '$_POST[mission_type_id]', 
  '$_POST[mission_status_id]')";


  foreach (mysqli_query($pdo, "SELECT * FROM country WHERE name = '$_POST[country]'") as $country) {
    foreach (mysqli_query($pdo, "SELECT * FROM contact WHERE id = '$_POST[contact_id]'") as $contact) {
      if ($country['id'] != $contact['nationality_id']) {
        header('Location: ../index.php');
        echo 'Selected country must have contact with same nationality';
      } else {
        foreach (mysqli_query($pdo, "SELECT * FROM agent_skill WHERE agent_id = '$_POST[agent_id]' OR agent_id = '$_POST[agent_id_2]'") as $agent) {
          if ($agent['skill_id'] != $_POST['skill']) {
            header('Location: ../index.php');
            echo '<p>One of the two agents must have required skill</p>';
          } else {
            if ($_POST['agent_id_2'] == $_POST['agent_id']) {
              header('Location: ../index.php');
              echo '<p></p>';
            } else if (!$_POST['agent_id_2']) {
              mysqli_query($pdo, $sql);
              foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE title = '$_POST[title]'") as $m) {
                mysqli_query($pdo, "INSERT INTO mission_agent (mission_id, agent_id) VALUES ('$m[id]', '$_POST[agent_id]')");
              }
            } else {
              mysqli_query($pdo, $sql);
              foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE title = '$_POST[title]'") as $m) {
                mysqli_query($pdo, "INSERT INTO mission_agent (mission_id, agent_id) VALUES ('$m[id]', '$_POST[agent_id]'), ('$m[id]', '$_POST[agent_id_2]')");
              }
            }
          };
          foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE title = '$_POST[title]'") as $m) {
            mysqli_query($pdo, "INSERT INTO mission_contact (mission_id, contact_id) VALUES ('$m[id]', '$_POST[contact_id]')");
          }
          header('Location: ../index.php');
        }
      }
    }
  }
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
