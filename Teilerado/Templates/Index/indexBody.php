<?php
include '../../../Database/database.php';

$db = new Connection();
$db->connect();

function showItem($items)

{
    $db = new Connection();
    $db->connect();

    while ($item = $items->fetch_array()) {
        $image = base64_encode($item['item_picture']);
        $category_id = $item['fk_ctg_id'];
        $available_id = $item['fk_av_id'];
        $item_name = $item['item_name'];
        $item_plz = $item['plz'];
        $item_location = $item['location'];

        $category = $db->query("select ctg_value from categories where ctg_id='$category_id'");
        $category = $category->fetch_assoc()['ctg_value'];

        $available = $db->query("select av_message from available where av_id='$available_id'");
        $available = $available->fetch_assoc()['av_message'];

        echo '<a href="" class="show_items">';
        echo '<img src="data:image/jpeg;base64,' . $image . '" class="image"/>';
        echo '<p class="item_category">' . $category . '</p></br>';
        echo '<p class="item_category_available">' . $available . '</p></br>';
        echo '<p class="fa fa-location-arrow" style="margin-left: 10px; font-size: 15px; margin-top: 5px; color: gray;"></p>';
        echo '<p class="item_location" style="margin-left: 5px;">'. $item_plz. " " .$item_location.' </p></br>';
        echo '<p class="item_name">' . $item_name . '</p></br>';
        echo '</a>';
    }
}

?>
<!doctype html>
<html lang="en">

<body>
<div class="welcome">
    <p id="slogan">Denn teilen verbindet!</p>
</div>

<div class="search_box">
    <form action="" method="post">
        <input class="search_bar" type="text" name="search_item" placeholder="Ich suche...">
        <input class="search_bar" type="text" name="search_place" placeholder="Ort / PLZ">
        <input id="search_button" type="submit" name="search" value="Suchen">


    </form>
</div>


<div class="scrolling">
    <form action="index.php" method="post">
        <?php
        $select = $db->query("Select * from categories");
        while($row = $select->fetch_array()) {
            echo '<input class="category" type="submit" name="' . $row['ctg_name'] . '" value="' . $row['ctg_value'] . '">';

        }
        ?>
    </form>
</div>

<?php
$select2 = $db->query("Select * from categories");
$bool = false;
while($row = $select2->fetch_array()){

$name = $row['ctg_name'];
$value = $row['ctg_value'];

if(isset($_POST[$name])){
$clicked_ctg = $row['ctg_value'];
$bool = true;
?>

<div class="font">
    <h2 style="margin-left: 150px; font-weight: bolder; margin-top:70px; display: inline-block; padding: 20px;
    margin-bottom:0px; border-top-right-radius: 10px;border-top-left-radius: 10px; background: rgba(246, 245, 245, 0.72);"><?php echo $value;}}?></h2>
</div>

<?php

if($bool == false){
?>

<div class="font">
    <h2 style="margin-left: 150px; font-weight: bolder; margin-top:70px; display: inline-block; padding: 20px;
    margin-bottom:0px; border-top-right-radius: 10px;border-top-left-radius: 10px; background: rgba(246, 245, 245, 0.72);"><?php echo "Vorschläge";}?></h2>
</div>


<div class="color">
    <div style="margin-left: auto; margin-right: auto; margin-top:100px; align-items: center; justify-content: center; margin: 100px auto;">
        <div class="grid-container">
            <?php

            if(isset($_POST['search'])) {

                // POST items in Variablen speichern
                $searchItem = $_POST['search_item'];
                $searchPlace = $_POST['search_place'];

                if (!empty($searchItem) && empty($searchPlace)) {
                    $items = $db->query("SELECT * FROM items WHERE LOWER(item_name) LIKE '%$searchItem%'");

                    showItem($items);
                }

                if (empty($searchItem) && !empty($searchPlace)) {
                    $items = $db->query("SELECT * FROM items WHERE plz = '$searchPlace' OR LOWER(location) LIKE '%$searchPlace%';");

                    showItem($items);
                }


                elseif (empty($searchItem) && empty($searchPlace)) {
                    $items = $db->query("SELECT * FROM items ORDER BY RAND() LIMIT 15");

                    showItem($items);

                }


            }

            elseif(empty($clicked_ctg)) {
                $items = $db->query("SELECT * FROM items ORDER BY RAND() LIMIT 15");
                showItem($items);

            } else {

                $ctg_id = $db->query("select ctg_id from categories where ctg_value='$clicked_ctg'");
                $ctg_id = $ctg_id->fetch_assoc()['ctg_id'];
                $items = $db->query("SELECT * FROM items WHERE fK_ctg_id={$ctg_id}");
                showItem($items);
            }
            ?>
        </div>
    </div>
</div>
</body>