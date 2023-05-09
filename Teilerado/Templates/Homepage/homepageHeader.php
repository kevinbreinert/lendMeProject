<?php
$lebensdauer = 30; // 30 Minuten in Sekunden
session_set_cookie_params($lebensdauer);
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
    <nav>
        <ul class="nav-links">
            <li class="logo">
                <a href="homepage.php" style="font-size: 25px;">Teilerado</a>
            </li>
            <li><a href="homepage.php">Startseite</a></li>
            <li><a href="myObjects.php">Meine Objekte</a></li>
            <li><a href="lendItemFrom.php">Ausgeliehene Objekte</a></li>
            <li><a href="benachrichtigung.php">Posteingang</a></li>
            <li><a href="settings.php">Einstellungen</a></li>
            <li id="logout"><a href="logout.php">Abmelden</a></li>
            <li class="showUser" style="border: 2px solid #9354f6; margin-right: 0px; border-radius: 10px; padding: 10px; box-shadow: 0 0 10px 0px rgb(147,84,246);; font-size: 13px">
                Angemeldet als: <?php echo $_SESSION['username']; ?>
            </li>
        </ul>
    </nav>
</header>

<style>

    .nav-links {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        margin: 0;
        padding: 15px;
        list-style: none;
        width: 100%;

    }
    .nav-links li {
        margin: 0 10px;
    }
    .nav-links li:first-child {
        margin-left: 0;
    }
    .nav-links li:last-child {
        margin-right: 0;
    }
    .nav-links a {
        display: inline-block;
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        font-family: Poppins;
        padding: 8px;
        border: 2px solid transparent; /* initial border color is transparent */
        border-radius: 10px;
        transition-duration: 0.6s; /* Dauer des Hover-Effekts */
    }

    .nav-links a:hover {
        color: #93bcff;
        border-color: #4992ff;
        box-shadow: 0 0 10px 0px rgb(73,146,255);
    }
    .logo {
        display: inline-block;
        margin-right: 20px;
        padding-right: 20px;
        border-right: 1px solid #ccc;
    }
    .showUser {
        color: #b996ef;
        font-family: Poppins;

    }
    #logout a:hover{
        color: #ff7272;
        box-shadow: 0 0 5px 0px rgb(243,90,90);
        border-color: #f35a5a;|; /* change border color on hover */
    }
</style>
