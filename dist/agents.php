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
  <link href="./output.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Agents</title>
</head>

<body>
  <nav class="flex flex-wrap justify-around w-full mt-8">
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


  <div class="text-center rounded-lg bg-slate-700 text-white mt-4 p-4 w-3/4 md:w-2/3 lg:w-2/5 mx-auto" <?php
                                                                                                        if (!isset($_SESSION['email'])) {
                                                                                                          echo 'style="display: none;"';
                                                                                                        }
                                                                                                        ?>>
    <p class="mb-3 underline">Add entity</p>

    <div class="md:grid md:grid-cols-1">

      <form action="./actions/agentAdd.php" method="POST">
        <div class="shadow overflow-hidden rounded sm:rounded-md">
          <div class="px-4 py-5 bg-white p-6">

            <div class="grid grid-cols-3 md:grid-cols-6 gap-6">
              <div class="md:col-span-3 col-span-6">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" required name="last_name" id="last_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="md:col-span-3 col-span-6">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" required name="first_name" id="first_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="md:col-span-3 col-span-6">
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" required name="birth_date" id="birth_date" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="md:col-span-3 col-span-6">
                <label for="code_id" class="block text-sm font-medium text-gray-700">Code ID</label>
                <input type="text" required name="code_id" id="code_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="md:col-span-3 col-span-6 md:col-start-1">
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                <select required name="nationality" id="nationality" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, ("SELECT * FROM nationality")) as $n) {
                    echo '<option value="' . $n['id'] . '">' . $n['country'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="md:col-span-3 col-span-6 md:col-start-4">
                <label for="skill" class="block text-sm font-medium text-gray-700">Skill</label>
                <select required name="skill" id="skill" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, ("SELECT * FROM skill")) as $s) {
                    echo '<option value="' . $s['id'] . '">' . $s['name'] . '</option>';
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

  <div class="block text-center py-8">
    <?php
    foreach (mysqli_query($pdo, ('SELECT * FROM agent')) as $agent) {
      echo '<div class="mx-auto w-3/4 md:w-2/3 lg:w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
      echo $agent['last_name'] . '<br>';
      echo '<p class="overline text-sm text-slate-500">';
      echo $agent['code_id'];
      echo '</p>';
      echo '<div class="flex flex-wrap justify-evenly">';
      echo '<form action="./actions/agentInfo.php" method="GET">';
      echo '<button type="submit" value="' . $agent['id'] . '" name="info" class="mt-2 p-2 w-32 rounded-lg hover:bg-cyan-700 bg-cyan-600">';
      echo 'More info';
      echo '</button>';
      echo '</form>';
      if (isset($_SESSION['email'])) {
        echo '<form action="./actions/agentModify.php" method="GET">';
        echo '<button type="submit" value="' . $agent['id'] . '" name="modify" class="mt-2 p-2 w-32 rounded-lg hover:bg-green-700 bg-green-600">';
        echo 'Modify entity';
        echo '</button>';
        echo '</form>';
        echo '<form action="./actions/agentDelete.php" method="POST">';
        echo '<button type="submit" value="' . $agent['id'] . '" name="delete" class="mt-2 p-2 w-32 rounded-lg hover:bg-red-700/80 bg-red-600">';
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