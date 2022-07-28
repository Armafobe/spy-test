<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../output.css">
  <link rel="stylesheet" href="../../css/styles.css">
  <title>Mission Info</title>
</head>

<body>
  <nav class="flex justify-center mt-8 space-x-4">
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
    <div class="block text-center rounded-lg bg-slate-700 py-8 p-4 sm:w-1/2 md:w-1/3 m-auto">
      <?php
      $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
      foreach ($pdo->query("SELECT * FROM mission WHERE id = '$_GET[info]'") as $mission) {
        echo '<div class="mx-auto w-3/4 rounded-lg text-white bg-gray-100/50 p-6 m-4">';
        echo '<p class="text-slate-700">Code</p>';
        echo '<p class="overline text-sm ">';
        echo $mission['title'] . '<br>' . '<br>';
        echo '<p class="text-slate-700">Address</p>';
        echo '<p class="overline text-sm">';
        echo $mission['description'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Code Name</p>';
        echo '<p class="overline text-sm">';
        echo $mission['code_name'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Country</p>';
        echo '<p class="overline text-sm">';
        echo $mission['country'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Assigned Agent(s)</p>';
        foreach ($pdo->query("SELECT * FROM mission_agent WHERE mission_id = '$mission[id]'") as $ma) {
          foreach ($pdo->query("SELECT * FROM agent WHERE id = '$ma[agent_id]'") as $agent) {
            echo '<p class="overline text-sm">';
            echo $agent['last_name'] . '<br>';
            echo '</p>';
          }
        }
        echo '<br>';
        foreach ($pdo->query("SELECT * FROM mission_contact WHERE mission_id = '$mission[id]'") as $mc) {
          foreach ($pdo->query("SELECT * FROM contact WHERE id = '$mc[contact_id]'") as $contact) {
            echo '<p class="text-slate-700">Contact</p>';
            echo '<p class="overline text-sm">';
            echo $contact['last_name'] . '<br>' . '<br>';
            echo '</p>';
          }
        }
        foreach ($pdo->query("SELECT * FROM target WHERE mission_id = '$mission[id]'") as $target) {
          echo '<p class="text-slate-700">Target</p>';
          echo '<p class="overline text-sm">';
          echo $target['code_name'] . ' a.k.a ' . $target['last_name'] . ' ' . $target['first_name'] .  '<br>' . '<br>';
          echo '</p>';
        }
        echo '<p class="text-slate-700">Start Date</p>';
        echo '<p class="overline text-sm">';
        echo $mission['start_date'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">End Date</p>';
        echo '<p class="overline text-sm">';
        echo $mission['end_date'] . '<br>' . '<br>';
        echo '</p>';
        foreach ($pdo->query("SELECT * FROM skill WHERE id = '$mission[skill_id]'") as $skill) {
          echo '<p class="text-slate-700">Required Skill</p>';
          echo '<p class="overline text-sm">';
          echo $skill['name'] . '<br>' . '<br>';
          echo '</p>';
        }
        foreach ($pdo->query("SELECT * FROM mission_type WHERE id = '$mission[mission_type_id]'") as $mt) {
          echo '<p class="text-slate-700">Type</p>';
          echo '<p class="overline text-sm">';
          echo $mt['type'] . '<br>' . '<br>';
          echo '</p>';
        }
        foreach ($pdo->query("SELECT * FROM mission_status WHERE id = '$mission[mission_status_id]'") as $ms) {
          echo '<p class="text-slate-700">Status</p>';
          echo '<p class="overline text-sm">';
          echo $ms['status'] . '<br>' . '<br>';
          echo '</p>';
        }
      }
      ?>
    </div>
  </div>
</body>

</html>