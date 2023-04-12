<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="ressources/src/css/index.css" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
</head>
<header>
  <h1 id="header">Teilerado</h1>

    <div class="vl"></div>
    <p><a class="showPages" href="homepage.php">Startseite</a></p>
    <p style="margin-left: 110px;"><a class="showPages" href="profil.php">Mein Profil</a></p>
    <div class="showPages" style="margin-left: 510px;">
    <div class="dropdown">
        <a class="dropbtn">Seiten</a>
        <div class="dropdown-content">
            <a href="myObjects.php">Meine Objekte </a>
            <a href="lendItemFrom.php">Ausgeliehene Objekte</a>
            <a href="reminderList.php">Merkliste</a>
            <a href="benachrichtigung.php">Posteingang</a>
            <a href="settings.php">Einstellungen</a>
            <a href="logout.php">abmelden</a>
        </div>
    </div>
    </div>
    <?php
    echo '<div id="showUser"> Angemeldet als: ' . $_SESSION['username'] . '</div>';

    ?>
</header>