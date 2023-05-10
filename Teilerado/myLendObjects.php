<?php
session_start();

if($_SESSION['username'] == ''){
    header('location: login.php');
}
include '../Database/database.php';

$db = new Connection();
$db->connect();


include 'Templates/MyLendObjects/myObjectsHeader.php';
include 'Templates/MyLendObjects/myObjectsBody.php';
include 'Templates/MyLendObjects/myObjectsFooter.html';
?>