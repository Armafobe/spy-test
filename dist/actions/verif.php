<?php

session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {

  $db_username = 'ba008afa4d9a14';
  $db_password = '48bc42f5';
  $db_name = 'heroku_3c2b29750d62481';
  $db_host = 'us-cdbr-east-06.cleardb.net';
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
      header('Location: ../index.php');
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
