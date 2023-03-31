<?php
include '../Database/database.php';
$db = new Connection();
$db->connect();
include 'Templates/Register/header.html';
include 'Templates/Register/body.php';
include 'Templates/Register/footer.html';