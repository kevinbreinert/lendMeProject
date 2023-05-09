<?php
session_start();
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
    <h1 id="header">Teilerado</h1>

</header>

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