<?php
require_once 'config/connect.php';
var_dump('123');
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $price = 0;
    $date = date('Y-m-d');
    if(isset($_POST['work_time'])) {
        if ($_POST['stan_count'] == '1') {
            if ($_POST['shift_time'] == 'D') {
                $price = 270;
            } else {
                $price = 315;
            }
        } else {
            if ($_POST['shift_time'] == 'D') {
                $price = 270 * 2;
            } else {
                $price = 315 * 2;
            }
        }
        $link = mysqli_connect('localhost', 'root', '', 'api_db');
        $query = mysqli_insert_id($link);
        $sql = "INSERT INTO `report_card` VALUES(NULL, '{$_POST['fio']}', '{$_POST['work_time']}', '{$_POST['shift_time']}', $price, '{$_POST['calendar']}')";
        if (!mysqli_query($link, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
        mysqli_close($link);
    }
}
?>
