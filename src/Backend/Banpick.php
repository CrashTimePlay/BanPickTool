<!DOCTYPE html>
<?php
$cookieId = $_GET["TeamA"];
if (!isset($_COOKIE["TeamA"])){
    setcookie("TeamA", $cookieId, 0);
}
?>
<?php
// Раскоментить для создания линков и БД
//include_once "../api/objects/Links.php";
$cookieId = $_GET["TeamB"];
if (!isset($_COOKIE["TeamB"])){
    setcookie("TeamB", $cookieId, 0);
}
?>
<?php
// Раскоментить для создания линков и БД
//include_once "../api/objects/Links.php";
$cookieId = $_GET["Spectators"];
if (!isset($_COOKIE["Spectators"])){
    setcookie("Spectators", $cookieId, 0);
}
?>
<html lang="ru" id="html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Frontend/banpick.css">
    <title>BanPick</title>
    <script src="../library/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../Frontend/img/logo-asgard.png" alt="logo">
    </div>
    <div class="selected-operatives" id="selected-operatives">
        <table>
            <caption>Оперативники которых запрещено брать в матче</caption>
        <tr>
        <td id="selected-first"></td>
        <td id="selected-second"></td>
        <td id="selected-third"></td>
        <td id="selected-fourth"></td>
        </tr>
        </table>
    </div>
<div class="hide-block-element" id="hide-block-A">
    <table>
        <caption>Выберите оперативника которого хотите забанить</caption>
        <tr>
            <th>Россия</th>
            <th>Польша</th>
            <th>Германия</th>
            <th>США</th>
            <th>Великобритания</th>
            <th>Франция</th>
        </tr>
        <tr><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td></tr>
        <tr><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td></tr>
        <tr><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td></tr>
        <tr><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td><td>A</td></tr>
    </table>
</div>
<div class="hide-block-element" id="hide-block-B">
    <table>
        <caption>Выберите оперативника которого хотите забанить</caption>
        <tr>
            <th>Россия</th>
            <th>Польша</th>
            <th>Германия</th>
            <th>США</th>
            <th>Великобритания</th>
            <th>Франция</th>
        </tr>
        <tr><td>B</td><td>B</td><td>B</td><td>B</td><td>B</td><td>B</td></tr>
        <tr><td>B</td><td>B</td><td>B</td><td>B</td><td>B</td><td>B</td></tr>
    </table>
</div>
<!--Здесь смотрю если есть куки - то показать элемент блока-->
<?php
if (isset($_COOKIE["TeamA"])){
    echo "<script>
    $('#hide-block-A').css('visibility', 'visible');
    $('#hide-block-B').remove();
    $('#selected-operatives').css('visibility', 'visible');
</script>";
}
?>
    <?php
    if (isset($_COOKIE["TeamB"])){
        echo "<script>
    $('#hide-block-A').remove();
    $('#hide-block-B').css('visibility', 'visible');
    $('#selected-operatives').css('visibility', 'visible');
</script>";
    }
    ?>
    <?php
    if (isset($_COOKIE["Spectators"])){
        echo "<script>
    $('#selected-operatives').css('visibility', 'visible');
    $('#hide-block-A').remove();
    $('#hide-block-B').remove();
</script>";
    }
    ?>
<!--Этот скрипт релоадит страницу 1 раз, проверяя в конце есть ли #loaded-->
<script type="text/javascript">
    $(document).ready(function(){
        if(document.URL.indexOf("#")==-1){
            url = document.URL+"#loaded";
            location = "#loaded";
            location.reload(true);
        }
    });
</script>
<!--  тестовый див   <div id="div22"></div>-->
    <script>
        $( document ).ready(function() {
                $.getJSON( "../api/actions/Read.php", function (data) { // указываем url и функцию обратного вызова
                    let out = ""; // создаем пустую строковую переменную
                    for ( key in data ) { // создаем цикл for in
                        out += ("<img src=" + (JSON.stringify(data[key][0].img)) + "alt='picture' width='200px' height='200px'>");
                    };
                    $( "#selected-first" ).html( out ); // добавляем в элемент <div> значение переменной
                })
        });
    </script>
    <script>
        $( document ).ready(function() {
                $.getJSON( "../api/actions/Read.php", function (data) { // указываем url и функцию обратного вызова
                    let out = ""; // создаем пустую строковую переменную
                    for ( key in data ) { // создаем цикл for in
                        out += ("<img src=" + (JSON.stringify(data[key][1].img)) + "alt='picture' width='200px' height='200px'>");
                    };
                    $( "#selected-second" ).html( out ); // добавляем в элемент <div> значение переменной
                })
        });
    </script>
    <script>
        $( document ).ready(function() {
            $.getJSON( "../api/actions/Read.php", function (data) { // указываем url и функцию обратного вызова
                let out = ""; // создаем пустую строковую переменную
                for ( key in data ) { // создаем цикл for in
                    out += ("<img src=" + (JSON.stringify(data[key][2].img)) + "alt='picture' width='200px' height='200px'>");
                };
                $( "#selected-third" ).html( out ); // добавляем в элемент <div> значение переменной
            })
        });
    </script>
    <script>
        $( document ).ready(function() {
            $.getJSON( "../api/actions/Read.php", function (data) { // указываем url и функцию обратного вызова
                let out = ""; // создаем пустую строковую переменную
                for ( key in data ) { // создаем цикл for in
                    out += ("<img src=" + (JSON.stringify(data[key][3].img)) + "alt='picture' width='200px' height='200px'>");
                };
                $( "#selected-fourth" ).html( out ); // добавляем в элемент <div> значение переменной
            })
        });
    </script>
</div>
</body>
</html>