<?php
session_start();

if($_SESSION['username'] == ''){
    header('location: login.php');
}
include '../Database/database.php';

$db = new Connection();
$db->connect();
/*
// Bild aus der Datenbank auswählen
$result = $db->query("SELECT account_picture FROM users ");

if ($result) {
    // Binären Inhalt des Bildes in einer Variable speichern
    $image_data = $result->fetch_assoc()['account_picture'];

    // Content-Type Header auf das Bild setzen
    $base64 = base64_encode($image_data);

    echo '<img src="data:image/jpeg;base64,' . $base64 . '" style="height: 55px; width: 55px;" />';
} else {
    // Fehlermeldung, falls das Bild nicht gefunden wurde
    echo "Das Bild konnte nicht gefunden werden.";
}

*/
$category = $db->query("select ctg_value from categories where ctg_id=1");

   $category = $category->fetch_assoc()['ctg_value'];

echo $category;