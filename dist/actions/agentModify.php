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
  <link rel="stylesheet" href="../../css/styles.css">
  <link href="../output.css" rel="stylesheet">
  <title>Modify Agent</title>
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
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="lg:col-span-3 sm:col-span-6">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE id = '$_GET[modify]'") as $agent) {
                                              echo 'value="' . $agent['last_name'] . '" ';
                                            }
                                            ?> name="last_name" id="last_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="lg:col-span-3 sm:col-span-6">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE id = '$_GET[modify]'") as $agent) {
                                              echo 'value="' . $agent['first_name'] . '" ';
                                            }
                                            ?> name="first_name" id="first_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="lg:col-span-3 sm:col-span-6">
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE id = '$_GET[modify]'") as $agent) {
                                              echo 'value="' . $agent['birth_date'] . '" ';
                                            }
                                            ?> name="birth_date" id="birth_date" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="lg:col-span-3 sm:col-span-6">
                <label for="code_id" class="block text-sm font-medium text-gray-700">Code ID</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE id = '$_GET[modify]'") as $agent) {
                                              echo 'value="' . $agent['code_id'] . '" ';
                                            }
                                            ?> name="code_id" id="code_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="lg:col-span-3 lg:col-start-1">
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                <select required name="nationality" id="nationality" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, ("SELECT * FROM nationality")) as $n) {
                    echo '<option value="' . $n['id'] . '">' . $n['country'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="lg:col-span-3 lg:col-start-4">
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

            <button type="submit" name="add" class="inline-flex justify-center mt-5 py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
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
    foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE id = '$_GET[modify]'") as $agent) {
      $sql = "UPDATE agent SET 
      last_name = $agent[last_name],
      first_name = $agent[first_name],
      birth_date = $agent[birth_date],
      code_id = $agent[code_id],
      nationality_id = $agent[nationality_id]
      WHERE id = '$_GET[modify]'";
    }
  } else {
    $sql = "UPDATE agent SET 
    last_name = '$_POST[last_name]', 
    first_name = '$_POST[first_name]', 
    birth_date = '$_POST[birth_date]', 
    code_id = '$_POST[code_id]', 
    nationality_id = '$_POST[nationality]' 
    WHERE id = '$_GET[modify]'";
    foreach (mysqli_query($pdo, ("SELECT * from agent WHERE last_name = '$_POST[last_name]'")) as $agent) {
      $sql2 = "UPDATE agent_skill SET skill_id = '$_POST[skill]' WHERE agent_id = '$agent[id]'";
    }
    mysqli_query($pdo, $sql);
    mysqli_query($pdo, $sql2);
  }
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;

?>