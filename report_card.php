<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
require_once 'vendor/create_string.php';
require_once 'vendor/show_data.php';
include 'header.html';
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Сайт Даниила</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>
<?php
$link = mysqli_connect('localhost', 'root', '', 'api_db');
$color_array = ['black', 'red', 'green', 'blue'];
$query = mysqli_query($link,'SELECT * FROM `report_card`');


?>
<script type="text/javascript">
</script>
<table>
    <tr>
        <th>Номер записи</th>
        <th>Оператор</th>
        <th>Время работы</th>
        <th>Время суток</th>
        <th>Ставка</th>
        <th>Дата</th>
    </tr>

<?php
foreach($query as $val){
    ?>
<tr>
    <td id="id_!_<?=$val['id']?>"><?= $val['id']?></td>
    <td id="name_!_<?=$val['id']?>"><?= $val['name']?></td>
    <td id="work_time_!_<?=$val['id']?>"><?= $val['work_time']?></td>
    <td id="shift_time_!_<?=$val['id']?>"><?= $val['shift_time']?></td>
    <td id="price_!_<?=$val['id']?>"><?= $val['price']?></td>
    <td id="date_!_<?=$val['id']?>"><?= $val['date']?></td>
    <td><a id="delete" href="vendor/delete_string.php?id=<?= $val['id'] ?>">-</a></td>
</tr>
<?php
}
?>
</table>
        <script type="text/javascript">
            function showbar(){
                $("#bar_block").slideToggle();
                if ($("#show_bar").html() == '-') {
                    $("#show_bar").html('-');
                } else {
                    $("#show_bar").html('+');
                }
            };
        </script>
        <style>
            #bar_block {display: none;}
            #show_bar { margin: auto;
                display: flex;}
        </style>

        <button id="show_bar" onclick="showbar()">+</button>

        <form action="report_card.php" method="post" name="form">
        <div id="bar_block">
            <select name="fio">
                <option value="Даниил"> Даниил
                <option value="Михаил"> Михаил
                <option value="Алексей"> Алексей
                <option value="Сергей"> Сергей
            </select>
            <input name="work_time" type="text" value="">
            <select name="shift_time">
                <option value="День"> День
                <option value="Ночь"> Ночь
            </select>
            <input type="date" name="calendar">
            <input type="radio" id="contactChoice1"
                   name="stan_count" value="1">
            <label for="contactChoice1">1</label>

            <input type="radio" id="contactChoice2"
                   name="stan_count" value="2">
            <label for="contactChoice2">2</label>
            <button type="submit" class="submit">Отправить</button>
        </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            var tds = document.querySelectorAll('td');
            for (var i = 0; i < tds.length; i++) {
                if(tds[i].id != 'doing'){
                    tds[i].addEventListener('dblclick', function func() {
                        var input = document.createElement('input');
                        input.value = this.innerHTML;
                        this.innerHTML = '';
                        this.appendChild(input);

                        var td = this;
                        input.addEventListener('blur', function() {
                            td.innerHTML = this.value;
                            td.addEventListener('dblclick', func);
                            // здесь делать передачу в php
                            $.ajax({
                                url: "vendor/update_string.php",
                                type: "POST",
                                data: ({id: td.id, value: td.innerText}),
                                success: function (data){
                                    if(data != ''){
                                        alert("Error:"+ data);
                                    }
                                },error: function(request, status, error){
                                    alert("Error: Could not delete");
                                }
                            });
                        });

                        this.removeEventListener('dblclick', func);
                    });
                }

            }

        </script>
        <style>
            table {justify-content: left font-size: 1.5em; text-decoration: none #3d3d3d
            }
            th, td {#232323;
                padding: 0.5em;}
            tr:nth-child(even) { background-color: #ffffff; }
            th, td:not([contenteditable=true]) {
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            #delete {
                padding: 0.5em;
                color: red;
                text-decoration: none;
            }
            body { display: grid; justify-content: center; align-items: center; height: 100vh; }
        </style>
    </body>
</html>

