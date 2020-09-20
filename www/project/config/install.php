<?php

try {
    $conn = new PDO('mysql:host=172.19.0.2;dbname=project','igor','jkl98k17');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Создание таблиц
    $sql = "CREATE TABLE news (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   headers VARCHAR(100) NOT NULL,
   Announcement TEXT NOT NULL,
   description TEXT NOT NULL,
   img VARCHAR (100) NOT NULL,
   data_news VARCHAR (100)
   ) CHARACTER SET utf8 COLLATE utf8_general_ci";
    $conn->exec($sql);

    $sql = "CREATE TABLE administration (
   id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   login VARCHAR(100) NOT NULL,
   password VARCHAR(100) NOT NULL
   )";
    $conn->exec($sql);

    $sql = "INSERT INTO administration (login , password) VALUES ('admin' , 'admin')";
    $conn->exec($sql);
    echo "Инициализация базы данных успешна";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

// Закрыть подключение
$conn = null;