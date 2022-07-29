<!DOCTYPE html>
<html lang="fr">
<?php session_start();
$cleardb_url = parse_url("mysql://ba008afa4d9a14:48bc42f5@us-cdbr-east-06.cleardb.net/heroku_3c2b29750d62481?reconnect=true");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Missions</title>
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

  <form method="GET" action="#" class="mx-auto my-6 sm:w-2/3 md:w-1/2">
    <div class="grid grid-rows-2 grid-cols-3 sm:grid-cols-4 gap-3 md:grid-cols-5 md:gap-2 sm:grid-rows-1 justify-items-center md:justify-items-stretch">
      <div class="row-start-1 col-start-1 col-span-3 md:col-start-1 md:col-span-3 sm:col-span-2 self-center">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
        <input type="search" name="keywords" placeholder="Search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required="">
      </div>
      <div class="row-start-2 col-start-1 col-span-2 sm:row-start-1 sm:col-start-3 sm:col-span-1 md:col-start-4 md:col-span-1 justify-self-center self-center">
        In
        <select class="rounded w-5/6 border-none" name="searchOption">
          <option value="title">Title</option>
          <option value="code_name">Code Name</option>
          <option value="country">Country</option>
          <option value="start_date">Start Date</option>
          <option value="end_date">End Date</option>
          <option value="skill">Skill</option>
          <option value="mission_type">Mission Type</option>
          <option value="mission_status">Mission Status</option>
          <option value="agent">Agent</option>
          <option value="contact">Contact</option>
        </select>
      </div>
      <div class="row-start-2 col-start-2 col-span-2 sm:row-start-1 sm:col-start-4 sm:col-span-1 md:col-start-5 md:col-span-1 self-center mx-4">
        <button type="submit" name="search" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
      </div>
    </div>
  </form>

  <div class="relative text-center rounded-lg bg-slate-700 text-white w-3/4 mt-4 p-4 md:w-3/4 lg:w-1/3 mx-auto" <?php
                                                                                                                if (!isset($_SESSION['email'])) {
                                                                                                                  echo 'style="display: none;"';
                                                                                                                }
                                                                                                                ?>>
    <p class="mb-3 underline">Add entity</p>
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-1">
        <div class="mt-5 md:mt-0">
          <form action="./actions/missionAdd.php" method="POST">
            <div class="shadow overflow-hidden rounded-md">
              <div class="px-4 bg-white p-4 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="code_name" class="block text-sm font-medium text-gray-700">Code Name</label>
                    <input type="text" name="code_name" id="code_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <select required name="country" id="country" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM country")) as $c) {
                        echo '<option value="' . $c['name'] . '">' . $c['name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="datetime-local" name="start_date" id="start_date" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="datetime-local" name="end_date" id="end_date" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="skill" class=" block text-sm font-medium text-gray-700">Required Skill</label>
                    <select required name="skill" id="skill" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM skill")) as $s) {
                        echo '<option value="' . $s['id'] . '">' . $s['name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="mission_type_id" class=" block text-sm font-medium text-gray-700">Mission Type</label>
                    <select required name="mission_type_id" id="mission_type_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM mission_type")) as $mt) {
                        echo '<option value="' . $mt['id'] . '">' . $mt['type'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="mission_status_id" class=" block text-sm font-medium text-gray-700">Mission Status</label>
                    <select required name="mission_status_id" id="mission_status_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM mission_status")) as $ms) {
                        echo '<option value="' . $ms['id'] . '">' . $ms['status'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="contact_id" class=" block text-sm font-medium text-gray-700">Contact</label>
                    <select required name="contact_id" id="contact_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM contact")) as $c) {
                        foreach (mysqli_query($pdo, ("SELECT * FROM country WHERE id = $c[nationality_id]")) as $n) {
                          echo '<option value="' . $c['id'] . '">' . $c['last_name'] . ' ' . $c['first_name'] . ' - ' . $n['name'] . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="agent_id" class=" block text-sm font-medium text-gray-700">Assigned Agent</label>
                    <select required name="agent_id" id="agent_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM agent")) as $a) {
                        echo '<option value="' . $a['id'] . '">' . $a['last_name'] . ' ' . $a['first_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="agent_id_2" class=" block text-sm font-medium text-gray-700">(Optional) 2nd Agent</label>
                    <select name="agent_id_2" id="agent_id_2" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <option value="">None</option>
                      <?php
                      foreach (mysqli_query($pdo, ("SELECT * FROM agent")) as $a) {
                        echo '<option value="' . $a['id'] . '">' . $a['last_name'] . ' ' . $a['first_name'] . '</option>';
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
  </div>
  <div class="block relative text-center py-8">
    <?php
    if (isset($_GET['search']) && !empty(trim($_GET['keywords']))) {
      $words = preg_split("/[\s,]+/", $_GET['keywords']);
      switch ($_GET['searchOption']) {
        case 'title':
          $sql = "SELECT * FROM mission WHERE title LIKE '%$words[0]%'";
          break;
        case 'code_name':
          $sql = "SELECT * FROM mission WHERE code_name LIKE '%$words[0]%'";
          break;
        case 'country':
          $sql = "SELECT * FROM mission WHERE country = '$_GET[keywords]'";
          break;
        case 'start_date':
          $sql = "SELECT * FROM mission WHERE start_date LIKE '%$words[0]%'";
          break;
        case 'end_date':
          $sql = "SELECT * FROM mission WHERE end_date LIKE '%$words[0]%'";
          break;
        case 'skill':
          foreach (mysqli_query($pdo, "SELECT * FROM skill WHERE name = '$_GET[keywords]'") as $skill) {
            foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE skill_id = '$skill[id]'") as $mission) {
              $sql = "SELECT * FROM mission WHERE skill_id = '$mission[skill_id]'";
            }
          };
          break;
        case 'mission_type':
          foreach (mysqli_query($pdo, "SELECT * FROM mission_type WHERE type = '$_GET[keywords]'") as $type) {
            foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE mission_type_id = '$type[id]'") as $mission) {
              $sql = "SELECT * FROM mission WHERE mission_type_id = '$mission[mission_type_id]'";
            }
          };
          break;
        case 'mission_status':
          foreach (mysqli_query($pdo, "SELECT * FROM mission_status WHERE status = '$_GET[keywords]'") as $status) {
            foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE mission_status_id = '$status[id]'") as $mission) {
              $sql = "SELECT * FROM mission WHERE mission_status_id = '$mission[mission_status_id]'";
            }
          };
          break;
        case 'agent':
          foreach (mysqli_query($pdo, "SELECT * FROM agent WHERE last_name = '$_GET[keywords]'") as $agent) {
            foreach (mysqli_query($pdo, "SELECT * FROM mission_agent WHERE agent_id = '$agent[id]'") as $mission) {
              $sql = "SELECT * FROM mission WHERE id = '$mission[mission_id]'";
              if ("SELECT COUNT($mission[mission_id]) > 1") {
                foreach (mysqli_query($pdo, "SELECT * FROM mission_agent WHERE agent_id = '$agent[id]'") as $count) {
                  $sql .= " OR id = $count[mission_id]";
                }
              } else {
                $sql = "SELECT * FROM mission WHERE id = '$mission[mission_id]'";
              }
            }
          };
          break;
        case 'contact':
          foreach (mysqli_query($pdo, "SELECT * FROM contact WHERE last_name = '$_GET[keywords]'") as $contact) {
            foreach (mysqli_query($pdo, "SELECT * FROM mission_contact WHERE mission_id = '$contact[id]'") as $mission) {
              $sql = "SELECT * FROM mission WHERE id = '$mission[mission_id]'";
            }
          };
      }
    } else {
      $sql = "SELECT * FROM mission";
    }

    foreach (mysqli_query($pdo, ($sql)) as $mission) {
      echo '<div class="mx-auto w-3/4 md:w-1/2 rounded-lg bg-gray-100/50 p-6 m-4">';
      echo $mission['title'] . '<br>';
      echo '<p class="overline text-sm text-slate-500">';
      echo $mission['description'];
      echo '<p>' . '<br>';
      echo '<div class="flex flex-wrap space-x-4 justify-center">';
      echo '<form action="./actions/missionInfo.php" method="GET">';
      echo '<button type="submit" value="' . $mission['id'] . '" name="info" class="mt-2 p-2 w-32 rounded-lg hover:bg-cyan-700 bg-cyan-600">';
      echo 'More info';
      echo '</button>';
      echo '</form>';
      if (isset($_SESSION['email'])) {
        echo '<form action="./actions/missionModify.php" method="GET">';
        echo '<button type="submit" value="' . $mission['id'] . '" name="modify" class="mt-2 p-2 w-32 rounded-lg hover:bg-green-700 bg-green-600">';
        echo 'Modify entity';
        echo '</button>';
        echo '</form>';
        echo '<form action="./actions/missionDelete.php" method="POST">';
        echo '<button type="submit" value="' . $mission['id'] . '" name="delete" class="mt-2 p-2 w-32 rounded-lg hover:bg-red-700/80 bg-red-600">';
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