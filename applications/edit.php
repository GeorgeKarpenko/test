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
    $id = $_GET['id'];

    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        // выполняем операции с базой данных
        $query = $link->query("UPDATE applications SET name='{$name}', city='{$city}', address='{$address}', phone='{$phone}', email='{$email}' WHERE id=$id");

        if($query)
        {
            echo('Данные отредактированы');
        }
        else{
            echo('Ошибка');
        }    
        
    }
}
mysqli_close($link);