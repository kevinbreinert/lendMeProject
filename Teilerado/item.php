<?php
session_start();

if($_SESSION['username'] == ''){
    header('location: login.php');
}

include '../Database/database.php';
$db = new Connection();
$db->connect();

include 'Templates/Item/header.php';
include 'Templates/Item/body.php';
include 'Templates/Item/footer.html';

?>


