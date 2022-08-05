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
  <title>Modify Hideout</title>
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


  <div class="relative text-center rounded-lg bg-slate-700 text-white w-3/4 mt-4 p-4 lg:w-2/5 mx-auto">
    <p class="mb-3 underline">Modify entity</p>

    <div class="md:grid md:grid-cols-1">

      <form action="#" method="POST">
        <div class="shadow overflow-hidden rounded sm:rounded-md">
          <div class="rounded pt-0 bg-white p-6">
            <div class="text-gray-700 my-4 p-2">
              <p class="underline font-medium">Hideout won't be modified if:</p>
              <ul>
                <li>Selected mission doesn't take place in selected country</li>
              </ul>
            </div>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM hideout WHERE id = '$_GET[modify]'") as $hideout) {
                                              echo 'value="' . $hideout['code'] . '" ';
                                            }
                                            ?> name="code" id="code" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM hideout WHERE id = '$_GET[modify]'") as $hideout) {
                                              echo 'value="' . $hideout['address'] . '" ';
                                            }
                                            ?> name="address" id="address" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM hideout WHERE id = '$_GET[modify]'") as $hideout) {
                                              echo 'value="' . $hideout['type'] . '" ';
                                            }
                                            ?> name="type" id="type" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
                <label for="mission_id" class="block text-sm font-medium text-gray-700">Mission</label>
                <select required name="mission_id" id="mission_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, ("SELECT * FROM mission")) as $m) {
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

</body>

</html>

<?php

try {
  if (!isset($_POST['add'])) {
    foreach (mysqli_query($pdo, "SELECT * FROM hideout WHERE id = '$_GET[modify]'") as $hideout) {
      $sql = "UPDATE hideout SET 
        code = $hideout[code],
        address = $hideout[address],
        type = $hideout[type],
        country_id = $hideout[country_id],
        mission_id = $hideout[mission_id]
        WHERE id = '$_GET[modify]'";
    }
  } else {
    $sql = "UPDATE hideout SET 
    code = '$_POST[code]', 
    address = '$_POST[address]', 
    type = '$_POST[type]', 
    country_id = '$_POST[country_id]', 
    mission_id = '$_POST[mission_id]' 
    WHERE id = '$_GET[modify]'";
    foreach (mysqli_query($pdo, "SELECT name FROM country WHERE id = '$_POST[country_id]'") as $c) {
      foreach (mysqli_query($pdo, "SELECT country FROM mission WHERE id = '$_POST[mission_id]'") as $m) {
        if (($c['name'] != $m['country'])) {
          header('Location: ../hideouts.php');
        } else {
          mysqli_query($pdo, $sql);
          header('Location: ../hideouts.php');
        }
      }
    }
  }
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;

?>