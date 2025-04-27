<?php
session_start();
require_once 'dbconnect.php';

$name = trim($_POST['name'] ?? '');
$login = trim($_POST['login'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if (empty($name) || empty($login) || empty($password) || empty($confirm_password)) {
    $_SESSION['error'] = 'Все поля обязательны для заполнения!';
    header('Location: registration.php');
    exit();
}

if ($password !== $confirm_password) {
    $_SESSION['error'] = 'Пароли не совпадают!';
    header('Location: registration.php');
    exit();
}

if (strlen($password) < 5) {
    $_SESSION['error'] = 'Пароль должен содержать минимум 5 символов!';
    header('Location: registration.php');
    exit();
}

if (strlen($password) > 15) {
    $_SESSION['error'] = 'Пароль не должен превышать 15 символов!';
    header('Location: registration.php');
    exit();
}

try {
    $stmt = $dbcon->prepare("INSERT INTO users (name, login, pass) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $login, $password);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Вы успешно зарегистрировались!';
        header('Location: registration.php');
        exit();
    } else {
        throw new Exception("Ошибка регистрации: " . $stmt->error);
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        $_SESSION['error'] = 'Логин уже занят!';
    } else {
        $_SESSION['error'] = 'Ошибка базы данных: ' . $e->getMessage();
    }
    header('Location: registration.php');
    exit();
}