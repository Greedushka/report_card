<?php
error_reporting(0);
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'api_db';

$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$link) {
die('<p style="color:red">'.mysqli_connect_errno().' - '.mysqli_connect_error().'</p>');
$result = mysqli_query($linkl,"SELECT * FROM report_card");
}

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "</tr>";
}
