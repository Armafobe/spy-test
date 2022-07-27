<!DOCTYPE html>
<html lang="fr">
<?php session_start() ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./output.css">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Targets</title>
</head>

<body>
  <nav class="flex justify-center mt-8 space-x-4">
    <a href="missions.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Missions</a>
    <a href="agents.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Agents</a>
    <a href="targets.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Targets</a>
    <a href="contacts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Contacts</a>
    <a href="skills.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Skills</a>
    <a href="hideouts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Hideouts</a>
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



  <div class="text-center rounded-lg bg-slate-700 text-white mt-4 p-4 sm:w-1/2 md:w-1/3 mx-auto" <?php
                                                                                                  if (!isset($_SESSION['email'])) {
                                                                                                    echo 'style="display: none;"';
                                                                                                  }
                                                                                                  ?>>
    <p class="mb-3 underline">Add entity</p>
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-1">
        <div class="mt-5 md:mt-0">
          <form action="./actions/targetAdd.php" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" required name="last_name" id="last_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" required name="first_name" id="first_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                    <input type="date" required name="birth_date" id="birth_date" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="code_name" class="block text-sm font-medium text-gray-700">Code Name</label>
                    <input type="text" required name="code_name" id="code_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                    <select required name="nationality" id="nationality" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
                      foreach ($pdo->query("SELECT * FROM nationality") as $n) {
                        echo '<option value="' . $n['id'] . '" style="font-family: Inter">' . $n['country'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="mission" class="block text-sm font-medium text-gray-700">Mission</label>
                    <select required name="mission" id="mission" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
                      foreach ($pdo->query("SELECT * FROM mission") as $m) {
                        echo '<option value="' . $m['id'] . '">' . $m['title'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <button type="submit" class="inline-flex justify-center mt-5 py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="block text-center py-8">
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=spy', 'root', '');
    foreach ($pdo->query('SELECT * FROM target') as $target) {
      echo '<div class="mx-auto w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
      echo $target['last_name'] . '<br>';
      echo '<p class="overline text-sm text-slate-500">';
      echo $target['code_name'];
      echo '</p>';
      echo '<div class="flex space-x-4 justify-center">';
      echo '<form action="./actions/targetInfo.php">';
      echo '<button type="submit" value="' . $target['id'] . '" name="info" class="mt-2 p-2 w-32 rounded-lg hover:bg-cyan-700 bg-cyan-600">';
      echo 'More info';
      echo '</button>';
      echo '</form>';
      if (isset($_SESSION['email'])) {
        echo '<form action="./actions/targetModify.php" method="GET">';
        echo '<button type="submit" value="' . $target['id'] . '" name="modify" class="mt-2 p-2 w-32 rounded-lg hover:bg-green-700 bg-green-600">';
        echo 'Modify entity';
        echo '</button>';
        echo '</form>';
        echo '<form action="./actions/targetDelete.php" method="POST">';
        echo '<button type="submit" value="' . $target['id'] . '" name="delete" class="mt-2 p-2 w-32 rounded-lg hover:bg-red-700/80 bg-red-600">';
        echo 'Delete entity';
        echo '</button>';
        echo '</form>';
      }
      echo '</div>';
      echo '</div>';
      echo "<br>";
    } ?>
  </div>

</body>

</html>