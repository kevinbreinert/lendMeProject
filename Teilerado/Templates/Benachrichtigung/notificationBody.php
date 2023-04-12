<?php
include 'Database/database.php';
$db = new Connection();
$db->connect();

?>
<!doctype html>

<html>
<body>

<?php

$owner_id = $_SESSION['user_id'];

$notifactions = $db->query("SELECT * FROM notification where owner_id={$owner_id}");

while($notifaction = $notifactions->fetch_array()) {

    $not_id = $notifaction['notification_id'];
    $item_id = $notifaction['item_id'];
    $customer_id = $notifaction['customer_id'];
    $start_date = $notifaction['start_date'];
    $end_date = $notifaction['end_date'];

    $item_name = $db->query("select item_name from items where item_id='$item_id'");
    $item_name = $item_name->fetch_assoc()['item_name'];

    $customer = $db->query("select username from users where user_id='$customer_id'");
    $customer = $customer->fetch_assoc()['username'];

    echo '<div class="notification">';
    echo '<p style="padding-right: 20px;">Benutzer: ' . $customer . '</p>';
    echo '<p style="padding-right: 20px;">Objekt: ' . $item_name . '</p>';
    echo '<p style="padding-right: 20px;">Start: ' . $start_date . '</p>';
    echo '<p style="padding-right: 20px;">Ende: ' . $end_date . '</p>';
    echo '<form  method="post">';
    echo '<input type="submit" name="bestätigen' . $not_id . '" value="bestästigen">';
    echo '<input type="submit" name="ablehnen' . $not_id . '" value="ablehnen">';
    echo '</form>';
    echo '</div>';


        if(isset($_POST['bestätigen'. $not_id])) {
            $accept = $db->query("insert into lend_items (item_id, owner_id, costumer_id, begin_date, end_date) values('$item_id', '$owner_id', '$customer_id', '$start_date', '$end_date')");
            if ($accept) {
                $denied = $db->query("delete from notification where notification_id={$not_id}");
                if ($denied) {
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit();
                }
            }
        }

        if(isset($_POST['ablehnen' . $not_id])) {
        $denied = $db->query("delete from notification where notification_id={$not_id}");
        if ($denied) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }

    }

}?>
</body>
</html>
