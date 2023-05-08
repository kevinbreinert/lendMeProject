<?php

include '../Database/database.php';

$db = new Connection();
$db->connect();

include 'Templates/Index/indexHeader.html';

include 'Templates/Index/indexBody.php';

include 'Templates/Index/indexFooter.html'

?>