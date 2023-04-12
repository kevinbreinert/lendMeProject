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
            <input class="login_input" type="text" placeholder="Benutzername oder Email" name="username"></br>
            <input class="login_input" type="password" placeholder="Passwort" name="passwort"></br>
            <input id="login_button" type="submit" name="login" value="Einloggen">
        </form>


        <div class="kein_account_container">
            <div class="kein_account">
                Noch keinen Account ?
                <div class="register">
                    <a href="register.php">Hier registrieren</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['login'])){
        if(!empty($_POST['username']) && !empty($_POST['passwort'])){
            $username = $_POST['username'];
            $passwort = $_POST['passwort'];
            $loginUser = $db->query("SELECT * from users where username='$username' AND pass='$passwort'");

            if(mysqli_num_rows($loginUser) > 0){
                //TODO überprüfen auf groß- und kleinschreibung
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $loginUser->fetch_assoc()['user_id'];
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