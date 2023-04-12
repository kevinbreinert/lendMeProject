<?php

include '../Database/database.php';
$db = new Connection();
$db->connect();

include 'Templates/Benachrichtigung/notificationHeader.php';
include 'Templates/Benachrichtigung/notificationBody.php';
include 'Templates/Benachrichtigung/notificationFooter.html';

?>