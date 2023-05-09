<?php
session_start();

if($_SESSION['username'] == ''){
    header('location: login.php');
}
include '../Database/database.php';

$db = new Connection();
$db->connect();


include 'Templates/MyObjects/myObjectsHeader.php';
include 'Templates/MyObjects/myObjectsBody.php';
include 'Templates/MyObjects/myObjectsFooter.html';
?>