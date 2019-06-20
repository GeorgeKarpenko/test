<?php

    require_once 'connection.php'; // подключаем скрипт

    // Создание соединения
    $conn = new mysqli($host, $user, $password, $database);
    // Проверка соединения
    if ($conn->connect_error) {
       die("Ошибка подключения: " . $conn->connect_error);
    }
    
    // Создание таблицы
    $sql = "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Таблица user создана успешно";
    } else {
        echo "Ошибка создания таблицы: " . $conn->error;
    }
    echo '<br>';
    // Создание таблицы
    $sql = "CREATE TABLE applications (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    address VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Таблица applications создана успешно";
    } else {
        echo "Ошибка создания таблицы: " . $conn->error;
    }

    echo '<br>';

    $query = "INSERT INTO `user`(`name`, `password`) VALUES ('Admin', 'Admin')";
    if(mysqli_query($conn, $query))
    {
        echo("Логин: Admin <br> Пароль: Admin");
    }
    else{
        echo("Повторите попытку");
    }   
    // Закрыть подключение
    $conn->close();