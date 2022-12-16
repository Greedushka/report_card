<?php
session_start();
if($_SESSION['user']){
    header('Location: profile.php');
}
?>
<html>
<head>
    <title>Регистрация</title>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post" action="vendor/signup.php" name="reg-form" enctype="multipart/form-data">
        <div class="form-element">
            <label>Логин</label>
            <input type="text" name="login" pattern="[a-zA-Z0-9]+" required placeholder="Введите логин"/>
        </div>
        <div class="form-element">
            <label>Как вас зовут?</label>
            <input type="text" name="name" required placeholder="Введите ваше имя"/>
        </div>
        <div class="form-element">
            <label>Кто ты, воин?</label>
            <input type="text" name="profession" required placeholder="Введите вашу профессию"/>
        </div>
        <div class="form-element">
            <label>Ваша почта?</label>
            <input type="text" name="email" required placeholder="Введите вашу почту"/>
        </div>
        <div class="form-element">
        <label>Пароль</label>
        <input type="password" name="password" required placeholder="Введите пароль"/>
        </div>
        <div class="form-element">
            <label>Подвердите пароль</label>
            <input type="password" name="password_confirm" required placeholder="Подтвердите пароль"/>
        </div>
        <label>Ваше фото</label>
        <input type="file" name="photo">
        <p>
            У вас есть аккаунт? <a href="index.php">авторизоваться</a>
        </p>
            <?php
            if($_SESSION['message']){
                echo '<p class="msg"> '.$_SESSION['message']. '</p>';
            }
            unset($_SESSION['message']);
            ?>
        <button type="submit" name="reg" value="reg">Зарегистрироваться</button>
    </form>
</body>
</html>
<style>
    .msg {
        border: none;
        padding: 10px;
        text-align: center;
        color: #f50b0b;
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