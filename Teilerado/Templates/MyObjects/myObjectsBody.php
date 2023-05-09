<?php
include 'Database/database.php';
$db = new Connection();
$db->connect();
include '../../funktionen.php'
?>
<!doctype html>

<html>
<body>

<div class="pushObject">
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" />
        <input class="login_input" type="text" placeholder="Itemname" name="item_name">
        <select name="mySelect">
            <option value="">--Bitte wählen--</option>
            <?php
            $categories = $db->query("select * from categories");

            while($category = $categories->fetch_array()){
                echo "<option value={$category['ctg_name']}>{$category['ctg_value']}</option>";
            }
            ?>
        </select>
        <input class="login_input" type="text" placeholder="PLZ" name="plz">
        <input class="login_input" type="text" placeholder="Ort" name="location">
        <input type="submit" name="submit" value="Upload" />
    </form>
</div>


<?php
// ID vom benutzer aus der Session laden
$owner_id = $_SESSION['user_id'];



// Objekt hinzufügen

if(isset($_POST['submit'])){
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $image = mysqli_real_escape_string($db->connect(), $image);
    $item_name = $_POST['item_name'];
    $select_ctg = $_POST['mySelect'];
    $plz = $_POST['plz'];
    $location = $_POST['location'];

    $select_ctg_id = $db->query("select ctg_id from categories where ctg_name='{$select_ctg}'");
    $select_ctg_id = $select_ctg_id->fetch_assoc()['ctg_id'];

    if(!empty($image) && !empty($item_name) && !empty($select_ctg) && !empty($plz) && !empty($location)){
        $pushObject = $db->query("insert into items (fk_user_id, item_name, fk_ctg_id, fk_av_id, item_picture, plz, location) values ('$owner_id', '$item_name', '$select_ctg_id', 1, '$image', '$plz', '$location')");
        if($pushObject){
            echo "erfolgreich erstellt";
        }else {
            echo "fehler";
        }
    } else {
        echo "nicht alles aufgefüllt";
    }

}



// Objekte vom eignen Benutzer anzeigen
$myObjects = $db->query("SELECT * FROM items where fk_user_id={$owner_id}");

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
?>
</body>
</html>
