<?php

session_start();

if($_SESSION['username'] == ''){
    header('location: login.php');
}

include '../Database/database.php';

$db = new Connection();
$db->connect();

include 'funktionen.php';

changeMain();
include 'Templates/Homepage/homepageHeader.php';
include 'Templates/Homepage/homepageBody.php';
include 'Templates/Homepage/homepageFooter.html';
?>