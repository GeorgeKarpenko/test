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
            <td><? echo($value['name']) ?></td>
            <td><? echo($value['city']) ?></td>
            <td><? echo($value['address']) ?></td>
            <td><? echo($value['phone']) ?></td>
            <td><? echo($value['email']) ?></td>
        </tr>
    <?php
}
?>
</tbody>  
</table>
<a href="/">Главная страница</a><br>
<a href="/applications.php">Назад</a><br>
<a href="/exit.php">Выйти</a>