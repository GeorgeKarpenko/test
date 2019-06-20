<?php
$name = $_POST['name'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

if(isset($_POST['name']))
{
    require_once 'connection.php'; // подключаем скрипт
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
    // выполняем операции с базой данных
    $query = "INSERT INTO `applications`(`name`, `city`, `address`, `phone`, `email`) VALUES ('{$name}', '{$city}', '{$address}', '{$phone}', '{$email}')";
    if(mysqli_query($link, $query))
    {
        echo("$name, данные заполнены успешно");
    }
    else{
        echo("Повторите попытку");
    }    
    // закрываем подключение
    mysqli_close($link);
    
}
?>