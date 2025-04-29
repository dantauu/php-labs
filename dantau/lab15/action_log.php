<?php
session_start();
require_once 'dbconnect.php';

// Получение данных из формы
$login = trim($_POST['login'] ?? '');
$password = $_POST['password'] ?? '';

// Проверка заполнения полей
if (empty($login) || empty($password)) {
    $_SESSION['error'] = 'Не все поля формы заполнены';
    header('Location: login.php');
    exit();
}

// По умолчанию доступ закрыт
$_SESSION['dustup'] = false;

// Подготовка и выполнение запроса к базе
$stmt = $dbcon->prepare("SELECT * FROM users WHERE login = ? AND pass = ?");
$stmt->bind_param("ss", $login, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    // Успешная авторизация
    $_SESSION['login'] = $login;
    $_SESSION['dustup'] = true;
    header('Location: index.php');
    exit();
} else {
    // Неверные данные
    $_SESSION['error'] = 'Неправильный логин или пароль';
    header('Location: login.php');
    exit();
}
?> 