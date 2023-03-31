<?php
session_start();
include 'Database/database.php';
$db = new Connection();
$db->connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="ressources/src/css/login.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
<div class="content_body">
    <div class="login">

        <h2 id="login_title">Login</h2>

        <form class="login_formular" action="" method="post">
            <input class="login_input" type="text" placeholder="Benutzername" name="username"></br>
            <input class="login_input" type="text" placeholder="Email" name="email"></br>
            <input class="login_input" type="password" placeholder="Passwort" name="passwort"></br>
            <input class="login_input" type="password" placeholder="Passwort bestätigen" name="confirm"></br>
            <input id="login_button" type="submit" name="register" value="Einloggen">
        </form>


        <div class="kein_account_container">
            <div class="kein_account">
                Du hast bereits einen Account?
                <div class="register">
                    <a href="login.php">Hier anmelden!</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['register'])){
        if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['passwort']) && !empty($_POST['confirm']) ){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $passwort = $_POST['passwort'];
            $confirm = $_POST['confirm'];
//
            //TODO gültige abfargen
            //TODO passwort hashen und bei login abgleichen

            $registerUser = $db->query("insert into users (username, pass, email) values ('$username', '$passwort', '$email')");
            //TODO prüfen ob user und email bereits vorhanden ist
            if($registerUser){
                //TODO überprüfen auf groß- und kleinschreibung
                $_SESSION['username'] = $username;
                header('location: homepage.php');
            } else {
                echo "failed";
            }
        } else {
            echo "Fülle alle Felder aus!";
        }
    }

?>
</body>
</html>