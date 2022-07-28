<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../output.css">
  <link rel="stylesheet" href="../../css/styles.css">
  <title>Contact Info</title>
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
    <div class="text-center rounded-lg text-white bg-slate-700 py-8 p-4 sm:w-1/2 md:w-1/3 m-auto">
      <?php
      $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
      foreach ($pdo->query("SELECT * FROM contact WHERE id = '$_GET[info]'") as $contact) {
        echo '<div class="mx-auto w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
        echo '<p class="text-slate-700">Last Name</p>';
        echo '<p class="overline text-sm ">';
        echo $contact['last_name'] . '<br>' . '<br>';
        echo '<p class="text-slate-700">First Name</p>';
        echo '<p class="overline text-sm">';
        echo $contact['first_name'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Birth Date</p>';
        echo '<p class="overline text-sm">';
        echo $contact['birth_date'] . '<br>' . '<br>';
        echo '</p>';
        echo '<p class="text-slate-700">Code Name</p>';
        echo '<p class="overline text-sm">';
        echo $contact['code_name'] . '<br>' . '<br>';
        echo '</p>';
        foreach ($pdo->query("SELECT * FROM nationality WHERE id = '$contact[nationality_id]'") as $n) {
          echo '<p class="text-slate-700">Nationality</p>';
          echo '<p class="overline text-sm">';
          echo $n['country'] . '<br>' . '<br>';
          echo '</p>';
        }
      }
      ?>
    </div>
  </div>
</body>

</html>