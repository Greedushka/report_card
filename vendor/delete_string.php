<?php
$link = mysqli_connect('localhost', 'root', '', 'api_db');
$id = $_GET['id'];

mysqli_query($link, "DELETE FROM `report_card` WHERE `id` = $id");
