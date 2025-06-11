<?php
$host = 'localhost';
$dbname = 'mainBase';
$username = 'root';
$password = 'root';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Ошибка подключения к БД: " . $e->getMessage();
    die();
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(30) DEFAULT '0.jpg'
)";
$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    area FLOAT NOT NULL,
    population INT NOT NULL
)";
$conn->exec($sql); 