<?php
session_start();
require_once 'dbconnect.php';

$name = trim($_POST['name'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($name) || empty($password)) {
    $_SESSION['error'] = 'Не все поля формы заполнены';
    header('Location: login.php');
    exit();
}

$_SESSION['dustup'] = false;

$stmt = $dbcon->prepare("SELECT * FROM users WHERE name = ? AND pass = ?");
$stmt->bind_param("ss", $name, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['name']   = $user['name'];
    $_SESSION['login']  = $user['login'];
    $_SESSION['dustup'] = true;
    header('Location: index.php');
    exit();
} else {
    $_SESSION['error'] = 'Неправильный логин или пароль';
    header('Location: login.php');
    exit();
}
?> 