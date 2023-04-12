<?php


$benachrichtigungstext = "Ihre Bestellung wurde erfolgreich aufgegeben.";

// Geben Sie den JavaScript-Code aus, um das Pop-up-Fenster anzuzeigen
echo '<script type="text/javascript">';
echo 'alert("' . $benachrichtigungstext . '");';
echo '</script>';

?>