<!DOCTYPE html>
<html lang="fr">
<?php session_start();
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
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Hideouts</title>
</head>

<body>
  <nav class="flex flex-wra justify-around mx-auto w-full sm:w-1/2 mt-8 space-x-4">
    <a href="index.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Missions</a>
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
          <form action="./actions/hideoutAdd.php" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                    <input type="text" name="code" id="code" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <input type="text" name="type" id="type" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="country_id" class="block text-sm font-medium text-gray-700">Country</label>
                    <select required name="country_id" id="country_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM country")) as $c) {
                        echo '<option value="' . $c['id'] . '">' . $c['name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="mission_id" class=" block text-sm font-medium text-gray-700">Mission</label>
                    <select required name="mission_id" id="mission_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM mission")) as $m) {
                        echo '<option value="' . $m['id'] . '">' . $m['title'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <button type="submit" id="send" class="inline-flex justify-center mt-5 py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="block text-center py-8">
    <?php
    foreach (mysqli_query($pdo, ('SELECT * FROM hideout')) as $hideout) {
      echo '<div class="mx-auto w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
      echo $hideout['code'] . '<br>';
      echo '<p class="overline text-sm text-slate-500">';
      echo $hideout['address'];
      echo '</p>';
      echo '<p class="overline text-sm text-slate-500">';
      echo $hideout['type'];
      echo '</p>';
      echo '<div class="flex space-x-4 justify-center">';
      echo '<form action="./actions/hideoutInfo.php">';
      echo '<button type="submit" value="' . $hideout['id'] . '" name="info" class="mt-2 p-2 w-32 rounded-lg hover:bg-cyan-700 bg-cyan-600">';
      echo 'More info';
      echo '</button>';
      echo '</form>';
      if (isset($_SESSION['email'])) {
        echo '<form action="./actions/hideoutModify.php">';
        echo '<button type="submit" value="' . $hideout['id'] . '" name="modify" class="mt-2 p-2 w-32 rounded-lg hover:bg-green-700 bg-green-600">';
        echo 'Modify entity';
        echo '</button>';
        echo '</form>';
        echo '<form action="./actions/hideoutDelete.php" method="POST">';
        echo '<button type="submit" value="' . $hideout['id'] . '" name="delete" class="mt-2 p-2 w-32 rounded-lg hover:bg-red-700/80 bg-red-600">';
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