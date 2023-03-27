<?php

include '../Database/database.php';

$test = new Connection();
$test->connect();

include 'Templates/Index/header.html';




include 'Templates/Index/body.php';

//TODO Post suchanfragen für Objekt und Ort

//TODO Kategorien aus der Datenbank lesen

//TODO Objekte anzeigen auslesen der Datenbank mit Bilder, Kategorie, Verfürbarkeit, Ort, Name

//TODO Ausgewählte Kategorie anzeigen



include 'Templates/Index/footer.html'

?>