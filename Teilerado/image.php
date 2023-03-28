<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit" name="submit" value="Upload" />
</form>

</body>
</html>
<?php
include '../Database/database.php';

$db = new Connection();
$db->connect();


if(isset($_POST['submit'])) {
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $image = mysqli_real_escape_string($db->connect(), $image);

    $sql = $db->query("insert into items(fk_user_id, item_name, fk_ctg_id, fk_av_id, item_picture) values (1, 'Auto', 12,1 ,'$image')");

    if($sql) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error uploading image.";
    }
}
?>


