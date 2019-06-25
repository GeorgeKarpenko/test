<?php
if($_COOKIE['name'] == ''){
    header('Location: /login.php');
    exit;
}
$name = $_COOKIE['name'];
$passwordAdmin = $_COOKIE['password'];
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
// выполняем операции с базой данных
$query = "SELECT * FROM `user` WHERE `name` = '$name' AND `password` = '$passwordAdmin'";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
foreach ($result as $key => $value) {
    $res = $value;
}
if($res)
{
    // выполняем операции с базой данных
    $query = "SELECT * FROM `applications`";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    $query = "SELECT city FROM `applications` group by city";
    $city = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
}
else{
    header('Location: /exit.php');
    exit;
}
// закрываем подключение
mysqli_close($link);
?>

<div id="select_city">
    <select name="city" style="padding: 6px 5px;">
        <option value="Все">Все города</option>
        <?php
        foreach ($city as $value) {
        ?>
            <option value="<?php echo $value['city'] ?>"><?php echo $value['city'] ?></option>
        <?php
        }
        ?>
    </select>
</div>
<table class="table">
    <thead>
        <tr>
            <th>№</th>
            <th>ФИО</th>
            <th>Город</th>
            <th>Телефон</th>
            <th>E-mail</th>
            <th>Редактировать</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($result as $value) {
    ?>
        <tr data-city="<? echo($value['city']) ?>">
            <td><? echo($value['id']) ?></td>
            <td><a href="/applications?id=<? echo($value['id']) ?>"><? echo($value['name']) ?></a></td>
            <td><? echo($value['city']) ?></td>
            <td><? echo($value['phone']) ?></td>
            <td><? echo($value['email']) ?></td>
            <td><a href="/applications/update.php?id=<? echo($value['id']) ?>">Редактировать</a></td>
        </tr>
    <?php
}
?>
</tbody>  
</table>
<a href="/">Главная страница</a><br>
<a href="/exit.php">Выйти</a>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("select[name='city']").on("change", function() {
                var city = $(this).val();
                $('.table tr[data-city]').each(function() {
                    if ($(this).data('city') == city) {
                        $(this).show();
                    } else if (city == 'Все') {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>