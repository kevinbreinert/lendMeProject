<?php
include '../Database/database.php';

$db = new Connection();
$db->connect();


include 'Templates/Homepage/header.php';
include 'Templates/Homepage/body.php';
include 'Templates/Homepage/footer.html';
?>