<?php
session_start();
require_once 'config/connect.php';
if($_SESSION['user']){
    header('Location: profile.php');
}
?>
<head>
    <title>Вход</title>
    <meta charset="UTF-8">
</head>
<form method="post" action="vendor/signin.php" name="signup-form">
    <div class="form-element">
        <label>Логин</label>
        <input type="text" name="login_auth" pattern="[a-zA-Z0-9]+" required placeholder="Введите логин"/>
    </div>
    <div class="form-element">
        <label>Пароль</label>
        <input type="password" name="password_auth" required placeholder="Введите пароль"/>
    </div>
        <p>
            У вас нет аккаунта? <a href="reg.php">зарегистрироваться</a>
        </p>
            <?php
            if($_SESSION['message']){
                echo '<p class="msg"> '.$_SESSION['message']. '</p>';
            }
            unset($_SESSION['message']);
            ?>
    <button type="submit" name="login_but" value="login_but">войти</button>
</form>
<style>
    .msg {
        border: none;
        padding: 10px;
        text-align: center;
        color: #2dbb08;
        font-weight: bold;
    }
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body {
        height: 100vh;
        display: flex;
        align-items: center;
        margin: 50px auto;
        text-align: center;
        width: 800px;
    }
    h1 {
        font-family: Montserrat, sans-serif;
        font-size: 2rem;
        text-transform: uppercase;
    }
    label {
        padding: 2px;
        width: 150px;
        display: inline-block;
        text-align: center;
        font-size: 1.5rem;
        font-family: Montserrat, sans-serif;
    }
    input {
        border: unset;
        border-bottom: 10px solid #e3e3e3;
        font-size: 1.5rem;
        font-weight: 100;
        font-family: Montserrat, sans-serif;
        padding: 10px;
        outline: none;
    }
    p {
        margin: 10px 0;
    }
    a {
        color: #374e68;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
    }
    form {
        margin: 25px auto;
        padding: 20px;
        border: unset;
        width: 500px;
        background: #eee;
    }
    div.form-element {
        margin: 20px 0;
    }
    button {
        padding: 10px;
        font-size: 1.5rem;
        font-family: 'Lato';
        font-weight: 100;
        background: #949494;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>
