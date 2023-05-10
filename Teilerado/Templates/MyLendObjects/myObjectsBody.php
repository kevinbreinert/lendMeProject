<?php
include 'Database/database.php';
$db = new Connection();
$db->connect();
include '../../funktionen.php'
?>
<!doctype html>

<html>
<body>



<?php
// ID vom benutzer aus der Session laden
$owner_id = $_SESSION['user_id'];





// Objekte vom eignen Benutzer anzeigen
$myLendObejcts = $db->query("SELECT * FROM lend_items where costumer_id={$owner_id}");

while($myLendObejct = $myLendObejcts->fetch_array()){
    $item_id = $myLendObejct['item_id'];

    $myObjects = $db->query("SELECT * FROM items where item_id={$item_id}");

    while($object = $myObjects->fetch_array()) {

        $image = base64_encode($object['item_picture']);
        $category_id = $object['fk_ctg_id'];
        $available_id = $object['fk_av_id'];
        $item_name = $object['item_name'];
        $item_plz = $object['plz'];
        $item_location = $object['location'];

        $category = $db->query("select ctg_value from categories where ctg_id='$category_id'");
        $category = $category->fetch_assoc()['ctg_value'];

        $available = $db->query("select av_message from available where av_id='$available_id'");
        $available = $available->fetch_assoc()['av_message'];


        echo '<div class="myObjects"">';
        echo '<img src="data:image/jpeg;base64,' . $image . '" class="test"/>';
        echo '<p class="item_name_myObject">' . $item_name . '</p>';
        echo '<p class="item_category">' . $category . '</p></br>';
        echo '<p class="item_category_available">' . $available . '</p></br>';
        echo '<p class="fa fa-location-arrow" style="margin-left: 10px; font-size: 15px; margin-top: 5px; color: gray;">';
        echo '<p class="item_location" style="margin-left: 5px;">'. $item_plz. " " .$item_location.' </p>';
        //echo '<p>' . ''. '</p>';
        echo '</div>';

    }

}


?>
</body>
</html>
