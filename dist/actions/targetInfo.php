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
  <link href="../output.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/styles.css">
  <title>Contact Info</title>
</head>

<body>
  <nav class="flex flex-wrap justify-around w-full mt-8">
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
    <div class="block text-center rounded-lg bg-slate-400/50 w-3/4 md:w-1/2 m-auto">
      <?php
      foreach (mysqli_query($pdo, "SELECT * FROM target WHERE id = '$_GET[info]'") as $target) {
        echo '<div class="mx-auto w-1/2 rounded-lg p-4">';
        echo '<p class="text-slate-700">Last Name</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $target['last_name'] . '<br>' . '<br>';
        echo '<p class="text-slate-700">First Name</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $target['first_name'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Birth Date</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $target['birth_date'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Code Name</p>';
        echo '<p class="overline text-sm text-slate-500">';
        echo $target['code_name'] . '<br>' . '<br>';
        echo '</p>';
        foreach (mysqli_query($pdo, "SELECT * FROM nationality WHERE id = '$target[nationality_id]'") as $n) {
          echo '<p class="text-slate-700">Nationality</p>';
          echo '<p class="overline text-sm text-slate-500">';
          echo $n['country'] . '<br>' . '<br>';
          echo '</p>';
        }
        foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$target[mission_id]'") as $m) {
          echo '<p class="text-slate-700">Mission</p>';
          echo '<p class="overline text-sm text-slate-500">';
          echo $m['title'] . '<br>' . '<br>';
          echo '</p>';
        }
      }
      ?>
    </div>
  </div>
</body>

</html>