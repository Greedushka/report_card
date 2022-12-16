<?php
session_start();
if(!$_SESSION['user']){
    header('Location: ../index.php');
}
include 'header.html';
?>
<!doctype HTML>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/header.css">
    <meta charset="UTF-8">
    <title>Ваш профиль!</title>
</head>
<body>
    <form>
        <img src="<?= $_SESSION['user']['photo'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['name']?></h2>
        <a href="#" style="margin: 10px 0;"><?= $_SESSION['user']['email'] ?><br></a>
    </form>

    <style>
        body{

            text-align: center;
            align-items: center;
        }
        a {
            text-decoration: none;
        }
    </style>
</body>
</html>
