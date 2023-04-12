<?php
include '../Database/database.php';

$db = new Connection();
$db->connect();


include 'Templates/Homepage/homepageHeader.php';
include 'Templates/Homepage/homepageBody.php';
include 'Templates/Homepage/homepageFooter.html';
?>