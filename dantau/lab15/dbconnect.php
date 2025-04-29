<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "vb_22";
$port = 8889;

$dbcon = new mysqli($servername, $username, $password, $dbname, $port);

if ($dbcon->connect_error) {
    die("Ошибка подключения к базе данных: " . $dbcon->connect_error);
}
?> 