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

        <h2 id="login_title">Zurücksetzen</h2>

        <form class="login_formular" action="" method="post">
            <input class="login_button2" type="submit" name="username" value="Nutzername">
            <input class="login_button2" type="submit" name="email" value="Email"">
            <input class="login_button2" type="submit" name="password" value="Passwort">
        </form>



    </div>
</div>

<?php
    if(isset($_POST['username'])){
        header('location: username.reset.php');
    }

    if(isset($_POST['email'])) {
        header('location: email.reset.php');
    }

    if(isset($_POST['password'])){
        header('location: passwort.reset.php');
    }

?>
</body>
</html>