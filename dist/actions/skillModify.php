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
  <title>Login</title>
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
    <div class="md:grid md:grid-cols-1">
      <form action="#" method="POST">
        <div class="shadow overflow-hidden rounded sm:rounded-md">
          <div class="px-4 bg-white p-6">
            <div class="grid grid-cols-3 auto-rows-max gap-4">
              <div class="row-start-1 col-start-2">
                <label for="skill" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM skill WHERE id = '$_GET[modify]'") as $skill) {
                                              echo 'value="' . $skill['name'] . '" ';
                                            }
                                            ?> class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="skill" id="skill">
              </div>
              <div class="row-start-2 col-start-2">
                <button type="submit" id="apply" class="inline-flex justify-center mt-5 py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Apply</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <br><br>
  </form>
</body>

</html>
<?php

try {
  if (!isset($_POST['skill'])) {
    foreach (mysqli_query($pdo, "SELECT * FROM skill WHERE id = '$_GET[modify]'") as $skill) {
      $sql = "UPDATE skill SET name = $skill[name] WHERE id = '$_GET[modify]'";
    }
  } else {
    $sql = "UPDATE skill SET name = '$_POST[skill]' WHERE id = '$_GET[modify]'";
  }
  mysqli_query($pdo, $sql);
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;

?>