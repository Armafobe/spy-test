<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../output.css">
  <link rel="stylesheet" href="../../css/styles.css">
  <title>Login</title>
</head>

<body>
  <nav class="flex justify-center mt-8 space-x-4">
    <a href="../missions.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Missions</a>
    <a href="../agents.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Agents</a>
    <a href="../targets.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Targets</a>
    <a href="../contacts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Contacts</a>
    <a href="../skills.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Skills</a>
    <a href="../hideouts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Hideouts</a>
    <a href="../login.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Login</a>
  </nav>


  <div class="flex h-full">
    <div class="block text-center rounded-lg text-white bg-slate-700 py-8 p-4 sm:w-1/2 md:w-1/3 m-auto">
      <?php
      $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
      foreach ($pdo->query("SELECT * FROM hideout WHERE id = '$_GET[info]'") as $hideout) {
        echo '<div class="mx-auto w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
        echo '<p class="text-slate-700">Code</p>';
        echo '<p class="overline text-sm ">';
        echo $hideout['code'] . '<br>' . '<br>';
        echo '<p class="text-slate-700">Address</p>';
        echo '<p class="overline text-sm">';
        echo $hideout['address'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Type</p>';
        echo '<p class="overline text-sm">';
        echo $hideout['type'] . '<br>' . '<br>';
        echo '</p>';
        foreach ($pdo->query("SELECT * FROM country WHERE id = '$hideout[country_id]'") as $country) {
          echo '<p class="text-slate-700">Country</p>';
          echo '<p class="overline text-sm">';
          echo $country['name'] . '<br>' . '<br>';
          echo '</p>';
        }
        foreach ($pdo->query("SELECT * FROM mission WHERE id = '$hideout[mission_id]'") as $mission) {
          echo '<p class="text-slate-700">Mission</p>';
          echo '<p class="overline text-sm">';
          echo $mission['title'] . '<br>' . '<br>';
          echo '</p>';
        }
      }
      ?>
    </div>
  </div>

</body>

</html>