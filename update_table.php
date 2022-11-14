<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Обновление данных</title>
    <meta charset="UTF-8">
<!--    <select name="fio1">-->
<!--        <option value="Даниил"> Даниил-->
<!--        <option value="Михаил"> Михаил-->
<!--        <option value="Алексей"> Алексей-->
<!--        <option value="Сергей"> Сергей-->
<!--    </select><br>-->
    <a href="header.html" class="button">Главная</a>
    <a href="index.php" class="button">Вернуться</a>
    <form>
<!--    <input type="submit" class="totalcost" value="Расчёт зарплаты" >-->
<!--    <input type="date">-->
    </form>
<!--    --><?php
//    $servername = "127.0.0.1";
//    $database = "api_db";
//    $username = "root";
//    $password = "";
//
//    $conn = mysqli_connect($servername, $username, $password, $database);
//
//    if (!$conn) {
//        die("Connection failed: " . mysqli_connect_error());
//    }
//    $sqlq = mysqli_query($conn, "SELECT COUNT(price) FROM report_card WHERE name = '{$_POST['fio1']}'");
//    foreach($sqlq as valuable)->mysqli_fetch_assoc(MYSQLI_ASSOC)
//    ?>
    <style>
        .totalcost{
            width: 10%;
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            margin: 4px 2px;
            border: none;
            /*border-radius: 4px;*/
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form action="update_table.php" method="post" name="form">

<!--    Ваше Фамилия Имя Отчество: <input name="fio" type="text" value=""><br><br>-->



<?php
$servername = "127.0.0.1";
$database = "api_db";
$username = "root";
$password = "";

// Устанавливаем соединение

$conn = mysqli_connect($servername, $username, $password, $database);

// Проверяем соединение

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
    <style>
        input[type=text], select {
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=text] {
            width: 8%;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding-left: 40px;
        }
        input[type=text] {
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 10%;
        }
        input[type=radio] {
            position: absolute;
            z-index: -1;
            opacity: 0;


        }
        input[type=radio]+label{
            display: inline-flex;
            align-items: center;
            user-select: none;
        }
        input[type=radio]+label::before{
            content: '';
            display: inline-block;
            width: 1em;
            height: 1em;
            flex-shrink: 0;
            flex-grow: 0;
            border: 1px solid #adb5bd;
            border-radius: 50%;
            margin-right: 0.5em;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 50% 50%;
        }
        input[type=radio]:not(:disabled):not(:checked)+label:hover::before {
            border-color: #b3d7ff;
        }
        input[type=radio]:not(:disabled):active+label::before {
            background-color: #b3d7ff;
            border-color: #b3d7ff;
        }
        input[type=radio]:focus+label::before {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        input[type=radio]:focus:not(:checked)+label::before {
            border-color: #80bdff;
        }
        input[type=radio]:checked+label::before {
            border-color: #0b76ef;
            background-color: #0b76ef;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
        }
        input[type=radio]:disabled+label::before {
            background-color: #e9ecef;
        }
        .submit {
            width: 50%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #ffffff;
            padding: 20px;
        }

    </style>

    Время работы:
    <input name="work_time" type="text" value=""><br>

    Время суток смены:
    <select name="shift_time">
        <option value="День"> День
        <option value="Ночь"> Ночь
    </select><br><br>

    Оператор

    <select name="fio">
        <option value="Даниил"> Даниил
        <option value="Михаил"> Михаил
        <option value="Алексей"> Алексей
        <option value="Сергей"> Сергей
    </select><br><br>

    Количество станков:  <br><br>
        <div>
            <input type="radio" id="contactChoice1"
                   name="stan_count" value="1">
            <label for="contactChoice1">1</label>

            <input type="radio" id="contactChoice2"
                   name="stan_count" value="2">
            <label for="contactChoice2">2</label>
        </div>

    <input type="date" name="calendar"><br>

    <!--    О себе:<br><br>-->
    <!--    <textarea cols="40" rows="10" name="about"></textarea><br><br>-->

    <button type="submit" class="submit">Отправить</button>
</form>
</body>
<?php
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
    $query = mysqli_insert_id($conn);
    $sql = "INSERT INTO `report_card` VALUES(NULL, '{$_POST['fio']}', '{$_POST['work_time']}', '{$_POST['shift_time']}', $price, '{$_POST['calendar']}')";
    if (mysqli_query($conn, $sql)) {
        echo "Новая запись создана";
    }   else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>