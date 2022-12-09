<?php

$link = mysqli_connect('localhost', 'root', '', 'api_db');

mysqli_query($link, "SELECT * FROM `report_card`");
