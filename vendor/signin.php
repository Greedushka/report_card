<?php
session_start();
    require_once '../config/connect.php';

    $password = md5($_POST['password_auth']);
    $login = $_POST['login_auth'];
    $sql = mysqli_query($link,"SELECT * FROM users WHERE `login` = '$login' AND `password` = '$password'");
    if(mysqli_num_rows($sql) > 0){
        $user = mysqli_fetch_assoc($sql);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "photo" => $user['photo'],
            "email" => $user['email']
        ];
        header('Location: ../profile.php');
    }else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: index.php');
    }