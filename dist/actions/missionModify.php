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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Modify Mission</title>
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
              <p class="underline font-medium">Mission won't be modified if:</p>
              <ul>
                <li>Selected contact is not native of selected country</li>
                <li>One of the two selected agents doesn't have selected required skill</li>
              </ul>
            </div>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[modify]'") as $mission) {
                                              echo 'value="' . $mission['title'] . '" ';
                                            }
                                            ?> name="title" id="title" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea required <?php
                                    foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[modify]'") as $mission) {
                                      echo 'value="' . $mission['description'] . '" ';
                                    }
                                    ?> name="description" id="description" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="code_name" class="block text-sm font-medium text-gray-700">Code Name</label>
                <input type="text" required <?php
                                            foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[modify]'") as $mission) {
                                              echo 'value="' . $mission['code_name'] . '" ';
                                            }
                                            ?> name="code_name" id="code_name" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <select required required <?php
                                          foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[modify]'") as $mission) {
                                            echo 'value="' . $mission['country'] . '" ';
                                          }
                                          ?> name="country" id="country" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, "SELECT * FROM country") as $c) {
                    echo '<option value="' . $c['name'] . '">' . $c['name'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="datetime-local" required <?php
                                                      foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[modify]'") as $mission) {
                                                        echo 'value="' . $mission['start_date'] . '" ';
                                                      }
                                                      ?> name="start_date" id="start_date" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="datetime-local" required <?php
                                                      foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[modify]'") as $mission) {
                                                        echo 'value="' . $mission['end_date'] . '" ';
                                                      }
                                                      ?> name="end_date" id="end_date" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="skill" class=" block text-sm font-medium text-gray-700">Required Skill</label>
                <select required name="skill" id="skill" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, "SELECT * FROM skill") as $s) {
                    echo '<option value="' . $s['id'] . '">' . $s['name'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="mission_type_id" class=" block text-sm font-medium text-gray-700">Mission Type</label>
                <select required name="mission_type_id" id="mission_type_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, "SELECT * FROM mission_type") as $mt) {
                    echo '<option value="' . $mt['id'] . '">' . $mt['type'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="mission_status_id" class=" block text-sm font-medium text-gray-700">Mission Status</label>
                <select required name="mission_status_id" id="mission_status_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, "SELECT * FROM mission_status") as $ms) {
                    echo '<option value="' . $ms['id'] . '">' . $ms['status'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="contact_id" class=" block text-sm font-medium text-gray-700">Contact</label>
                <select required name="contact_id" id="contact_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, "SELECT * FROM contact") as $c) {
                    echo '<option value="' . $c['id'] . '">' . $c['last_name'] . ' ' . $c['first_name'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="agent_id" class=" block text-sm font-medium text-gray-700">Assigned Agent</label>
                <select required name="agent_id" id="agent_id" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <?php
                  foreach (mysqli_query($pdo, "SELECT * FROM agent") as $a) {
                    echo '<option value="' . $a['id'] . '">' . $a['last_name'] . ' ' . $a['first_name'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="agent_id_2" class=" block text-sm font-medium text-gray-700">(Optional) 2nd Agent</label>
                <select required name="agent_id_2" id="agent_id_2" class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  <option value="">None</option>
                  <?php
                  foreach (mysqli_query($pdo, "SELECT * FROM agent") as $a) {
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

</body>

</html>

<?php

try {
  if (!isset($_POST['add'])) {
    foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE id = '$_GET[modify]'") as $mission) {
      $sql = "UPDATE mission SET 
        title = $mission[title],
        description = $mission[description],
        code_name = $mission[code_name],
        country = $mission[country],
        end_date = $mission[end_date],
        skill_id = $mission[skill_id],
        mission_type_id = $mission[mission_type_id],
        mission_status_id = $mission[mission_status_id];
        WHERE id = '$_GET[modify]'";
    }
  } else {
    $reset = "ALTER TABLE mission auto_increment = 0;";
    $sql = "UPDATE mission SET 
  title = '$_POST[title]', 
  description = '$_POST[description]', 
  code_name = '$_POST[code_name]', 
  country = '$_POST[country]', 
  start_date = '$_POST[start_date]', 
  end_date = '$_POST[end_date]',
  skill_id = '$_POST[skill]',
  mission_type_id = '$_POST[mission_type_id]',
  mission_status_id = '$_POST[mission_status_id]'
  WHERE id = '$_GET[modify]'";
    foreach (mysqli_query($pdo, "SELECT * FROM country WHERE name = '$_POST[country]'") as $country) {
      foreach (mysqli_query($pdo, "SELECT * FROM contact WHERE id = '$_POST[contact_id]'") as $contact) {
        if ($country['id'] != $contact['nationality_id']) {
          header('Location: ../missions.php');
        } else {
          foreach (mysqli_query($pdo, "SELECT * FROM agent_skill WHERE agent_id = '$_POST[agent_id]' OR agent_id = '$_POST[agent_id_2]'") as $agent) {
            if ($agent['skill_id'] != $_POST['skill']) {
              header('Location: ../missions.php');
              echo '<p>One of the two agents must have required skill</p>';
            } else {
              mysqli_query($pdo, $reset);
              if ($_POST['agent_id_2'] == $_POST['agent_id']) {
                header('Location: ../missions.php');
                echo '<p></p>';
              } else if (!$_POST['agent_id_2']) {
                mysqli_query($pdo, $sql);
                foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE title = '$_POST[title]'") as $m) {
                  mysqli_query($pdo, "UPDATE mission_agent SET mission_id = '$m[id]', agent_id = '$_POST[agent_id]'");
                }
              } else {
                mysqli_query($pdo, $sql);
                foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE title = '$_POST[title]'") as $m) {
                  mysqli_query($pdo, "DELETE FROM mission_agent WHERE mission_id = '$m[id]'");
                  mysqli_query($pdo, "INSERT INTO mission_agent (mission_id, agent_id) VALUES ('$m[id]', '$_POST[agent_id]'), ('$m[id]', '$_POST[agent_id_2]')");;
                }
              }
            };
            foreach (mysqli_query($pdo, "SELECT * FROM mission WHERE title = '$_POST[title]'") as $m) {
              mysqli_query($pdo, "UPDATE mission_contact SET contact_id = '$_POST[contact_id]' WHERE mission_id = '$m[id]'");
            }
            header('Location: ../missions.php');
          }
        }
      }
    }
  }
} catch (PDOException $e) {
  echo $sql . '<br>' . $e->getMessage();
}

$pdo = null;
