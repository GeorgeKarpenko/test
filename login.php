<?php
if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $passwordAdmin = $_POST['password'];
    require_once 'connection.php'; // подключаем скрипт
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
    // выполняем операции с базой данных
    $query = "SELECT * FROM `user` WHERE `name` = '$name' AND `password` = '$passwordAdmin'";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    foreach ($result as $value) {
        setcookie("name",$value['name']);
        setcookie("password",$value['password']);
        header('Location: /applications.php');
        exit;
    };
    // закрываем подключение
    mysqli_close($link);
    
}
if(isset($_POST['name'])){
    echo ('Данные введены не верно <br>');
}
?>
Вход в админку
<form action="login.php" method="POST" class="from" id="from">
    <p><label>Имя <em>*</em></label><input type="text" name="name" data-required-form="true"></p>
    <p><label>Пароль <em>*</em></label><input type="password" name="password" data-required-form="true"></p>
    <button type="submit" id="btnForm">Отправить</button>
</form>
