<?php
session_start();
    require_once '../config/connect.php';

    $login = $_POST['login'];
    $name = $_POST['name'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if($password === $password_confirm) {
        $path = 'photos/' . time() . $_FILES['photo']['name'];

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке файла';
            header('Location: reg.php');
        }
        $password = md5($password);
        if(!$_FILES['photo']) {
            $sql = "INSERT INTO `users` VALUES(NULL, '$name', '$email', '$profession', '$login', '$password', NULL)";
        }else{
            $sql = "INSERT INTO `users` VALUES(NULL, '$name', '$email', '$profession', '$login', '$password', '$path')";
        }
        if (!mysqli_query($link, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
        $_SESSION['message'] = 'Успешная регистрация!';
        header('Location: ../index.php');
        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../reg.php');
        }
?>