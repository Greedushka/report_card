<?php
$column = $_POST['id'];
$column = explode( '_!_', $column);
$link = mysqli_connect('localhost', 'root', '', 'api_db');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sql = "UPDATE `report_card` SET `$column[0]` = '{$_POST['value']}' WHERE `id` = '$column[1]'";
    if (!mysqli_query($link, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}
