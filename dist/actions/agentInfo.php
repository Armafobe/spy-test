<!DOCTYPE html>
<html lang="fr">
<?php
$cleardb_url = parse_url(getenv("DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
$pdo = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../output.css">
  <link rel="stylesheet" href="../../css/styles.css">
  <title>Agent Info</title>
</head>

<body>
  <nav class="flex flex-wrap justify-around mx-auto w-full sm:w-1/2 mt-8 space-x-4">
    <a href="../index.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Missions</a>
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
    <div class="text-center rounded-lg text-white bg-slate-700 py-8 p-4 sm:w-1/2 md:w-1/3 m-auto">
      <?php
      foreach (mysqli_query($pdo, ("SELECT * FROM agent WHERE id = '$_GET[info]'")) as $agent) {
        echo '<div class="mx-auto w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
        echo '<p class="text-slate-700">Last Name</p>';
        echo '<p class="overline text-sm ">';
        echo $agent['last_name'] . '<br>' . '<br>';
        echo '<p class="text-slate-700">First Name</p>';
        echo '<p class="overline text-sm">';
        echo $agent['first_name'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Birth Date</p>';
        echo '<p class="overline text-sm">';
        echo $agent['birth_date'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Code ID</p>';
        echo '<p class="overline text-sm">';
        echo $agent['code_id'] . '<br>' . '<br>';
        echo '</p>';
        foreach (mysqli_query($pdo, ("SELECT * FROM nationality WHERE id = '$agent[nationality_id]'")) as $n) {
          echo '<p class="text-slate-700">Nationality</p>';
          echo '<p class="overline text-sm">';
          echo $n['country'] . '<br>' . '<br>';
          echo '</p>';
        }
        echo '<p class="text-slate-700">Skill(s)</p>';
        foreach (mysqli_query($pdo, ("SELECT * FROM agent_skill WHERE agent_id = '$agent[id]'")) as $as) {
          foreach (mysqli_query($pdo, ("SELECT * FROM skill WHERE id = '$as[skill_id]'")) as $skill) {
            echo '<p class="overline text-sm">';
            echo $skill['name'] . '<br>';
            echo '</p>';
          }
        }
      }
      ?>
    </div>
  </div>
</body>

</html>