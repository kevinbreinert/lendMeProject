<?php

include '../Database/database.php';
$db = new Connection();
$db->connect();
include 'Templates/Login/header.html';
include 'Templates/Login/body.php';
include 'Templates/Login/footer.html';