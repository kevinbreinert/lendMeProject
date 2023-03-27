<?php
include 'Database/database.php';

$db = new Connection();
$db->connect();
?>
<!doctype html>
<html lang="en">

<body>
<div class="welcome">
    <p id="slogan">Denn teilen verbindet!</p>
</div>

<div class="search_box">
    <form>
        <input class="search_bar" type="text" name="search_item" placeholder="Ich suche...">
        <input class="search_bar" type="text" name="search_place" placeholder="Ort / PLZ">
        <input id="search_button" type="submit" name="suchen" value="Suchen">
    </form>
</div>


<div class="scrolling">
    <form action="index.php" method="post">
        <?php
        $select = $db->query("Select * from categories");
        while($row = $select->fetch_array()){
            echo '<input class="category" type="submit" name="'. $row['ctg_name'].'" value="'.$row['ctg_value'].'">';
        }
        ?>
    </form>
</div>


<div class="font">
    <h2 style="margin-left: 150px; font-weight: bolder; margin-top:70px; display: inline-block; padding: 20px; margin-bottom:0px; border-top-right-radius: 10px;
  border-top-left-radius: 10px; background: rgba(246, 245, 245, 0.72);">Vorschläge</h2>
</div>


<div class="color">
    <div style="margin-left: auto; margin-right: auto; margin-top:100px; align-items: center; justify-content: center; margin: 100px auto;">
        <div class="grid-container">
            <a href="" class="show_items">
                <img src="ressources/Images/test.jpg" alt="Italian Trulli" class="image"></br>
                <p class="item_category">Wekzeuge</p></br>
                <p class="item_category_available">Verfügbar</p></br>
                <p class="fa fa-location-arrow" style="margin-left: 10px; font-size: 15px; margin-top: 5px; color: gray;"></p>
                <p class="item_location">30419 Herrenhausen</p>
                <p class="item_name">Bohrmaschine</p></br>
            </a>

            <a href="" class="show_items">
                <img src="ressources/Images/test.jpg" alt="Italian Trulli" class="image"></br>
                <p class="item_category">Wekzeuge</p></br>
                <p class="item_category_available">Verfügbar</p></br>
                <p class="fa fa-location-arrow" style="margin-left: 10px; font-size: 15px; margin-top: 5px; color: gray;"></p>
                <p class="item_location">30419 Herrenhausen</p>
                <p class="item_name">Bohrmaschine</p></br>
            </a>
            <a href="" class="show_items">
                <img src="ressources/Images/test.jpg" alt="Italian Trulli" class="image"></br>
                <p class="item_category">Wekzeuge</p></br>
                <p class="item_category_available">Verfügbar</p></br>
                <p class="fa fa-location-arrow" style="margin-left: 10px; font-size: 15px; margin-top: 5px; color: gray;"></p>
                <p class="item_location">30419 Herrenhausen</p>
                <p class="item_name">Bohrmaschine</p></br>
            </a>

            <a href="" class="show_items">
                <img src="ressources/Images/test.jpg" alt="Italian Trulli" class="image"></br>
                <p class="item_category">Wekzeuge</p></br>
                <p class="item_category_available">Verfügbar</p></br>
                <p class="fa fa-location-arrow" style="margin-left: 10px; font-size: 15px; margin-top: 5px; color: gray;"></p>
                <p class="item_location">30419 Herrenhausen</p>
                <p class="item_name">Bohrmaschine</p></br>
            </a>

        </div>
    </div>
</div>
</body>