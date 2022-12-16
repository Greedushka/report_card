<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
$link = mysqli_connect('localhost', 'root', '', 'api_db');
$id = $_GET['id'];

mysqli_query($link, "DELETE FROM `report_card` WHERE `id` = $id");

header('Location: ../report_card.php');