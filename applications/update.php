<?php
if($_COOKIE['name'] == ''){
    header('Location: http://test.loc/login.php');
    exit;
}
$name = $_COOKIE['name'];
$passwordAdmin = $_COOKIE['password'];
require_once '../connection.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
// выполняем операции с базой данных
$query = "SELECT * FROM `user` WHERE `name` = '$name' AND `password` = '$passwordAdmin'";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
{
    // выполняем операции с базой данных
    $query = "SELECT * FROM `applications` WHERE  `id` = $id";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   
}
else{
    header('Location: http://test.loc/login.php');
    exit;
}

// закрываем подключение
mysqli_close($link);
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	<link rel="stylesheet" href="../css/style.css">

<form action="/applications/edit.php?id=<? echo $id ?>" method="POST" class="from" id="from">
<table>
    <thead>
        <tr>
            <th>№</th>
            <th>ФИО</th>
            <th>Город</th>
            <th>Адрес</th>
            <th>Телефон</th>
            <th>E-mail</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($result as $value) {
    ?>
        <tr>
            <td><? echo($value['id']) ?></td>
            <td><input type="text" name="name" value="<? echo($value['name']) ?>" data-required-form="true"></td>
            <td><input type="text" name="city" value="<? echo($value['city']) ?>" data-required-form="true"></td>
            <td><input type="text" name="address" value="<? echo($value['address']) ?>" data-required-form="true"></td>
            <td><input type="text" name="phone" value="<? echo($value['phone']) ?>" data-required-form="true"></td>
            <td><input type="text" name="email" value="<? echo($value['email']) ?>" data-required-form="true"></td>
        </tr>
    <?php
}
?>
</tbody>  
</table>
<p id="response"></p>
<button type="submit" id="btnForm">Отправить</button>
</form>
<a href="/">Главная страница</a><br>
<a href="/applications.php">Назад</a><br>
<a href="/exit.php">Выйти</a>
<script>
$(document).ready(function() {
    $("#btnForm").click(function(){
        var faults = $('input').filter(function() {
            // находим не заполненные обязательные элементы input
        return $(this).data('required-form') && $(this).val() === "";
        }).css("background-color", "red"); // выделяем это поле красным

        if(faults.length) return false; // если одно из полей не заполнено, отменяем отправку
        sendAjaxForm('from', '/applications/edit.php?id=<? echo $id ?>');
        //Console.log('result_form');
        return false; 
    });
});
function sendAjaxForm(ajax_form, url) {
    jQuery.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        //dataType: "html", //формат данных
        data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            //myPopbox.open('modal2');
			$("#response").text(response);
            console.log(response);
        },
        error: function(response) { // Данные не отправлены
            //myPopbox.open('modal3');
			$("#response").text(response);
			console.log(response);
        }
    });
}
</script>