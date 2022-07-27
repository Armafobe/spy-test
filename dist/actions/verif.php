<?php

session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {

  $db_username = 'root';
  $db_password = '';
  $db_name = 'spy';
  $db_host = 'localhost';
  $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('pas de connexion!');

  //mysql_real_escape_string, htmlspecialchars contrer attaque sql xss
  $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
  $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

  if ($email !== '' && $password !== '') {
    $req = "SELECT count(*) FROM admin where email = '" . $email . "' and password= '" . $password . "' ";
    $exec_requete = mysqli_query($db, $req);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    if ($count != 0) {
      $_SESSION['email'] = $email;
      header('Location: ../missions.php');
    } else {
      header('Location : ../login.php?erreur=1');
    }
  } else {
    header('Location: ../login.php?erreur=2');
  }
} else {
  header('Location: ../login.php');
}
mysqli_close($db);
