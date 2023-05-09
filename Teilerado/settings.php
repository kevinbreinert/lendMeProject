<?php
include '../Database/database.php';
$db = new Connection();
$db->connect();

include 'Templates/Settings/settingsHeader.php';
include 'Templates/Settings/settingsBody.php';
include 'Templates/Settings/settingsFooter.html';

?>