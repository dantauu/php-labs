<?php
require_once('dbconnect.php');
session_start();
$name = $_POST['name'];
$area = $_POST['area'];
$population = $_POST['population'];

if (empty($name)) {
    $_SESSION['error'] = 'Поле "Название города" обязательно для заполнения';
    header('Location: index.php');
    exit();
}
if (empty($area)) {
    $_SESSION['error'] = 'Поле "Площадь" обязательно для заполнения';
    header('Location: index.php');
    exit();
}
if (empty($population)) {
    $_SESSION['error'] = 'Поле "Население" обязательно для заполнения';
    header('Location: index.php');
    exit();
}

$mysql = "INSERT INTO cities (name, area, population) VALUES ('$name', " . 
         ($area !== NULL ? "'$area'" : "NULL") . ", " . 
         ($population !== NULL ? "'$population'" : "NULL") . ")";

$result = $dbcon->query($mysql);

if (!$result) {
    die('Ошибка выполнения запроса: ' . $dbcon->error);
}

header('Location: index.php');

?>
