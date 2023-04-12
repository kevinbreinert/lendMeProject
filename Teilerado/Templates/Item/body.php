<?php
include 'Database/database.php';
$db = new Connection();
$db->connect();

?>
<!doctype html>

<html>
<body>
<?php
$item_id = $_GET['id'];

$items = $db->query("SELECT * FROM items where item_id={$item_id}");

while ($item = $items->fetch_array()) {
$image = base64_encode($item['item_picture']);
$category_id = $item['fk_ctg_id'];
$available_id = $item['fk_av_id'];
$item_name = $item['item_name'];

$category = $db->query("select ctg_value from categories where ctg_id='$category_id'");
$category = $category->fetch_assoc()['ctg_value'];

$available = $db->query("select av_message from available where av_id='$available_id'");
$available = $available->fetch_assoc()['av_message'];


echo '<img src="data:image/jpeg;base64,' . $image . '" class="image_item"/>';
echo '<p class="item_category">' . $category . '</p></br>';
echo '<p class="item_category_available">' . $available . '</p></br>';
echo '<p class="fa fa-location-arrow" style="margin-left: 10px; font-size: 15px; margin-top: 5px; color: gray;"></p>';
echo '<p class="item_location">30419 Herrenhausen</p></br>';
echo '<p class="item_name">' . $item_name . '</p></br>';
}
?>

<form method="POST">
    <input type="date" name="start_date">
    <input type="date" name="end_date">
    <input type="submit" name="anfragen" value="anfragen">
</form>

<?php
$user_id = $_SESSION['user_id'];
echo $user_id;
if(isset($_POST['anfragen'])){

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $select_owner_id = $db->query("select fk_user_id from items where item_id=1");
        $owner_id = $select_owner_id->fetch_assoc()['fk_user_id'];
        //echo $user_id;
        echo $owner_id;

        $insert = $db->query("insert into notification (owner_id, item_id, customer_id, start_date, end_date) values ('$owner_id', '$item_id','$user_id','$start_date', '$end_date' )");
        if($insert){
            echo "Anfrage wurde verschickt";
        }
    }
?>
</body>
</html>
