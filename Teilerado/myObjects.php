<?php
include '../Database/database.php';

$db = new Connection();
$db->connect();


include 'Templates/MyObjects/myObjectsHeader.php';
include 'Templates/MyObjects/myObjectsBody.php';
include 'Templates/MyObjects/myObjectsFooter.html';
?>