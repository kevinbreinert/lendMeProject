<?php

function changeMain(){
    changeAvailableToNotAV();
    changeAvailableToSoonAV();
    deleteLendItem();
}

// Available verify in lend_items & change
function changeAvailableToNotAV(): void {
    $dateToday = date('Y-m-d');
    global $db;
    $itemsNotAV = $db->query("SELECT * FROM lend_items where begin_date<='$dateToday'");
    while($item = $itemsNotAV->fetch_array()){
        $item_id = $item['item_id'];
        $db->query("UPDATE items SET fk_av_id = 3 WHERE item_id = '$item_id'");
    }
}

function changeAvailableToSoonAV(): void {
    $dateToday = date('Y-m-d');
    global $db;
    $itemsNotAV = $db->query("SELECT * FROM lend_items WHERE end_date <= DATE_ADD(NOW(), INTERVAL 2 DAY)");
    while($item = $itemsNotAV->fetch_array()){
        $item_id = $item['item_id'];
        $db->query("UPDATE items SET fk_av_id = 2 WHERE item_id = '$item_id'");
    }
}

function deleteLendItem(): void{
    $dateToday = date('Y-m-d');
    global $db;
    $itemsNotAV = $db->query("SELECT * FROM lend_items where end_date<='$dateToday'");
    while($item = $itemsNotAV->fetch_array()){
        $item_id = $item['item_id'];
        $db->query("DELETE FROM lend_items WHERE item_id = '$item_id'");
        $db->query("UPDATE items SET fk_av_id = 1 WHERE item_id = '$item_id'");
    }
}


?>
