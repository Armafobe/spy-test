<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./output.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>

<body>
  <nav class="flex justify-center mt-8 space-x-4">
    <a href="home.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Home</a>
    <a href="agents.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Agents</a>
    <a href="targets.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Targets</a>
    <a href="contacts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Contacts</a>
    <a href="skills.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Skills</a>
    <a href="hideouts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Hideouts</a>
    <a href="login.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Login</a>
  </nav>

  <!--<div class="h-2/3 bg-gray-100/50 my-4 mx-8 text-center">

  </div> -->
  <div class="block text-center py-8">
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
    foreach ($pdo->query('SELECT * FROM mission') as $mission) {
      echo '<div class="mission mx-auto w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
      echo $mission['title'] . '<br>';

      echo '<p class="overline text-sm text-slate-500">';
      echo $mission['description'];
      echo '</p>' . '<br>';

      echo '<p>Agent(s)</p>';
      echo '<p class="overline text-sm text-slate-500">';
      foreach ($pdo->query("SELECT * FROM mission_agent WHERE mission_id = $mission[id]") as $mission_agent) {
        foreach ($pdo->query("SELECT * FROM agent WHERE id = $mission_agent[agent_id]") as $agent) {
          echo $agent['last_name'] . '<br>';
        }
      }
      echo '<p>' . '<br>';

      echo '<p>Target</p>';
      echo '<p class="overline text-sm text-slate-500">';
      foreach ($pdo->query("SELECT * FROM target WHERE mission_id = $mission[id]") as $target) {
        echo $target['code_name'] . ' a.k.a ' . $target['last_name'] . ' ' . $target['first_name'];
      }
      echo '<p>' . '<br>';

      echo '<p>Mission type</p>';
      echo '<p class="overline text-sm text-slate-500">';
      foreach ($pdo->query("SELECT * FROM mission WHERE id = $mission[id]") as $mission) {
        foreach ($pdo->query("SELECT * FROM mission_type WHERE id = $mission[mission_type_id]") as $mission_type) {
          echo $mission_type['type'];
        }
      }
      echo '<p>' . '<br>';

      echo '<p>Mission status</p>';
      echo '<p class="overline text-sm text-slate-500">';
      foreach ($pdo->query("SELECT * FROM mission WHERE id = $mission[id]") as $mission) {
        foreach ($pdo->query("SELECT * FROM mission_status WHERE id = $mission[mission_status_id]") as $mission_status) {
          echo $mission_status['status'];
        }
      }
      echo '<p>' . '<br>';
      echo '<button id="' . $mission['id'] . '" class="info mt-2 p-2 rounded-lg bg-green-600">';
      echo '<i class="fa-solid fa-xs fa-plus-minus" style="margin-right: .5rem;"></i>';
      echo 'More info';
      echo '</button>';
      echo '</div>';
      echo "<br>";
    } ?>
  </div>
  <script>
    let btn = document.querySelector('.info');
    let div = document.querySelector('div.mission');

    const displayInfo = () => {
      div.style.padding = '12rem';
    }

    btn.addEventListener('click', displayInfo);
  </script>
</body>

</html>