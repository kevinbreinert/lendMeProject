<?php

include '../Database/database.php';

$db = new Connection();
$db->connect();

include 'Templates/Index/indexHeader.html';




include 'Templates/Index/indexBody.php';

//TODO Post suchanfragen für Objekt und Ort

//TODO Kategorien aus der Datenbank lesen

//TODO Objekte anzeigen auslesen der Datenbank mit Bilder, Kategorie, Verfürbarkeit, Ort, Name

//TODO Ausgewählte Kategorie anzeigen


include 'Templates/Index/indexFooter.html'

?>