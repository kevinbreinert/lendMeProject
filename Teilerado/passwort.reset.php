<?php
session_start();

if($_SESSION['username'] == ''){
    header('location: login.php');
}

include '../Database/database.php';
$db = new Connection();
$db->connect();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="ressources/src/css/login.css" rel="stylesheet">
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

<body>
<div class="content_body">
    <div class="login">

        <h2 id="login_title">Passwort ändern</h2>

        <form class="login_formular" action="" method="post">
            <input class="login_input" type="text" placeholder="Aktuelles Passwort" name="oldPassword"></br>
            <input class="login_input" type="password" placeholder="Neues Passwort" name="newPassword"></br>
            <input class="login_button2" type="submit" name="changePassword" value="Ändern">
        </form>


    </div>
</div>

<?php
if(isset($_POST['changePassword'])){
    if(!empty($_POST['oldPassword'] && !empty($_POST['newPassword']))){

        //TODO umöndern in hash bei passwort ändern
        $username = $_SESSION['username'];
        $oldPasswort = $_POST['oldPassword'];
        $newPasswort = $_POST['newPassword'];

        $verifyOldPass = $db->query("SELECT * from users where username='$username' AND pass='$oldPasswort'");

        if(mysqli_num_rows($verifyOldPass) > 0){
            $changePasswort = $db->query("UPDATE users SET pass = '$newPasswort' WHERE username = '$username' AND pass = '$oldPasswort'");
            if($changePasswort){
                echo "passwort wurde geändert!";
                //header("refresh: 5; url=http://localhost/lendMeProject/Teilerado/homepage.php");
                //echo "Sie werden in 5 Sekunden zur Ziel-Seite weitergeleitet. Bitte warten Sie...";
                //echo '<meta http-equiv="refresh" content="5; url=http://localhost/lendMeProject/Teilerado/homepage.php">';
                //echo 'Sie werden in 5 Sekunden zur anderen Seite weitergeleitet. Bitte warten Sie...';
                //exit();
            } else {
                echo "passwort konnte nicht geändert werden";
            }
        } else {
            echo "failed";
        }
    }
}

?>
</body>
<footer>
    <p>
        © 2023 Kevin Breinert | Justin Wolff
        <a href="https://github.com/kevinbreinert/lendMeProject"  target="_blank"><i class="fa fa-github" style="font-size:35px; margin-left: 20px; vertical-align: middle; color: white; transition-duration: 0.4s"></i></a>
    </p>
</footer>
</html>