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
    <h1 id="header">Teilerado</h1>

</header>

<body>
<div class="content_body">
    <div class="login">

        <h2 id="login_title">Email ändern</h2>

        <form class="login_formular" action="" method="post">
            <input class="login_input" type="text" placeholder="Aktuelles Passwort" name="password"></br>
            <input class="login_input" type="email" placeholder="Neue Email" name="newEmail"></br>
            <input class="login_button2" type="submit" name="changeEmail" value="Ändern">
        </form>


    </div>
</div>

<?php
if(isset($_POST['changeEmail'])){
    if(!empty($_POST['password'] && !empty($_POST['newEmail']))){

        //TODO umöndern in hash bei passwort ändern
        $username = $_SESSION['username'];
        $passwort = $_POST['password'];
        $newEmail = $_POST['newEmail'];

        $verifyPass = $db->query("SELECT * from users where username='$username' AND pass='$passwort'");

        if(mysqli_num_rows($verifyPass) > 0){
            $changeEmail = $db->query("UPDATE users SET email = '$newEmail' WHERE username = '$username' AND pass = '$passwort'");
            if($changeEmail){
                echo "email wurde geändert!";
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