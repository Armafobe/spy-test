<!DOCTYPE html>
<html lang="fr">
<?php
$cleardb_url = parse_url("mysql://ba008afa4d9a14:48bc42f5@us-cdbr-east-06.cleardb.net/heroku_3c2b29750d62481?reconnect=true");
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../output.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/styles.css">
  <title>Mission Info</title>
</head>

<body>
  <nav class="flex flex-wrap justify-around w-full mt-8">
    <a href=" ../index.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Missions</a>
    <a href="../agents.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Agents</a>
    <a href="../targets.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Targets</a>
    <a href="../contacts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Contacts</a>
    <a href="../skills.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Skills</a>
    <a href="../hideouts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Hideouts</a>
    <?php
    if (!isset($_SESSION['email'])) {
    ?>
      <a href="login.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Login</a>
    <?php
    } else {
    ?>
      <a href="logout.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Logout</a>
    <?php
    }
    ?>
  </nav>

  <div class="flex h-full">
    <div class="block text-center rounded-lg bg-slate-400/50 w-3/4 md:w-1/2 m-auto">
      <?php
      $pdo = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
      foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[info]'") as $mission) {
        echo '<div class="mx-auto rounded-lg p-4">';
        echo '<p class="text-slate-700">Code</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $mission['title'] . '<br>' . '<br>';
        echo '<p class="text-slate-700">Description</p>';
        echo '<p class="overline text-sm  text-slate-500">';
        echo $mission['description'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Code Name</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $mission['code_name'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Country</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $mission['country'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Assigned Agent(s)</p>';
        foreach (mysqli_query($pdo, "SELECT * FROM mission_agent WHERE mission_id = '$mission[id]'") as $ma) {
          foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE id = '$ma[agent_id]'") as $agent) {
            echo '<p class="overline text-sm text-slate-500">';
            echo $agent['last_name'] . '<br>';
            echo '</p>';
          }
        }
        echo '<br>';
        foreach (mysqli_query($pdo, "SELECT * FROM mission_contact WHERE mission_id = '$mission[id]'") as $mc) {
          foreach (mysqli_query($pdo, "SELECT * FROM contact WHERE id = '$mc[contact_id]'") as $contact) {
            echo '<p class="text-slate-700">Contact</p>';
            echo '<p class="overline text-sm text-slate-500">';
            echo $contact['last_name'] . '<br>' . '<br>';
            echo '</p>';
          }
        }
        foreach (mysqli_query($pdo, "SELECT * FROM target WHERE mission_id = '$mission[id]'") as $target) {
          echo '<p class="text-slate-700">Target</p>';
          echo '<p class="overline text-sm text-slate-500">';
          echo $target['code_name'] . ' a.k.a ' . $target['last_name'] . ' ' . $target['first_name'] .  '<br>' . '<br>';
          echo '</p>';
        }
        echo '<p class="text-slate-700">Start Date</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $mission['start_date'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">End Date</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $mission['end_date'] . '<br>' . '<br>';
        echo '</p>';
        foreach (mysqli_query($pdo, "SELECT * FROM skill WHERE id = '$mission[skill_id]'") as $skill) {
          echo '<p class="text-slate-700">Required Skill</p>';
          echo '<p class="overline text-sm text-slate-500">';
          echo $skill['name'] . '<br>' . '<br>';
          echo '</p>';
        }
        foreach (mysqli_query($pdo, "SELECT * FROM mission_type WHERE id = '$mission[mission_type_id]'") as $mt) {
          echo '<p class="text-slate-700">Type</p>';
          echo '<p class="overline text-sm text-slate-500">';
          echo $mt['type'] . '<br>' . '<br>';
          echo '</p>';
        }
        foreach (mysqli_query($pdo, "SELECT * FROM mission_status WHERE id = '$mission[mission_status_id]'") as $ms) {
          echo '<p class="text-slate-700">Status</p>';
          echo '<p class="overline text-sm text-slate-500">';
          echo $ms['status'] . '<br>' . '<br>';
          echo '</p>';
        }
      }
      ?>
    </div>
  </div>
</body>

</html>