<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./output.css">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Login</title>
</head>

<body>
  <nav class="flex justify-center mt-8 space-x-4">
    <a href="missions.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Missions</a>
    <a href="agents.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Agents</a>
    <a href="targets.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Targets</a>
    <a href="contacts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Contacts</a>
    <a href="skills.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Skills</a>
    <a href="hideouts.php" class="font-medium px-3 py-2 text-slate-700 rounded-lg hover:text-orange-600">Hideouts</a>
  </nav>

  <div class="text-center rounded-lg bg-slate-700 text-white mt-4 p-4 sm:w-1/2 md:w-1/3 mx-auto">
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-1">
        <div class="mt-5 md:mt-0">
          <form action="./actions/verif.php" method="POST">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 bg-white sm:p-6">
                <div class="grid grid-cols-6 auto-rows-max gap-4">
                  <div class="row-start-1 col-start-1 md:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="row-start-1 col-start-4 md:col-span-3">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                </div>
                <button type="submit" class="inline-flex justify-center mt-5 py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  </form>

</body>

</html>
<?php
if (isset($_POST['erreur'])) {
  $error = $_POST['erreur'];
  if ($error == 1 || $err == 2);
  echo "<p class='decoration-red-800 bg-red-500'></p>";
}
?>