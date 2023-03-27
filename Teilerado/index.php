<?php

include '../Database/database.php';

$test = new Connection();
$test->connect();

include 'Templates/Index/header.html';

include 'Templates/Index/body.php';

include 'Templates/Index/footer.html'

?>