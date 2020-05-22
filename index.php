<?php require 'connection.php'; ?>
<?php require "download/cli.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/ajax.js"></script>
    <style>
        table td,table th {padding: 20px;}
    </style>
</head>
<body>
<form action="client.php" id="Form1">
    <p><b>сообщения от выбранного клиента</b></p>
    <select name="client" id="">
        <?php
        foreach ($out as $client) {
            echo "<option value=".$client['surname'].">".$client['surname']."</option>";
        }
        ?>
    </select>
    <p>
        <input type="button" value="Нажми сюда" onclick="getMessages();">
        <input type="button" value="Данные с LocalStorage" onclick="getLocal1(this)">
        <input type="button" value="Очистить поле результата" onclick="$('#result1').html('');">
    </p>
</form>
<ul id="result1"></ul>

<form action="static.php">
    <p><b>общий входящий и исходящий трафик</b></p>
    <p>
        <input type="button" value="Нажми сюда" onclick="getTraffic();">
        <input type="button" value="Данные с LocalStorage" onclick="getLocal2(this)">
        <input type="button" value="Очистить поле результата" onclick="$('#result2 tbody').html('');">
    </p>
</form>
<table id="result2">
    <thead>
        <tr>
            <th>Общий входящий трафик</th>
            <th>Общий исходящий трафик</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>


<form action="balance.php">
    <p><b>вывести список клиентов с отрицательным балансом счета</b></p>
    <p>
        <input type="button" value="Выбрать" onclick="getBal();">
        <input type="button" value="Данные с LocalStorage" onclick="getLocal3(this)">
        <input type="button" value="Очистить поле результата" onclick="$('#result3 tbody').html('');">
    </p>
</form>
<table id="result3">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Пароль</th>
            <th>IP</th>
            <th>Баланс</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>



</body>
</html>