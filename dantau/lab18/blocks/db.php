<?php
session_start();
$host = 'localhost';
$dbname = 'mainBase18';
$username = 'root';
$password = 'root';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Ошибка подключения к БД: " . $e->getMessage();
    die();
}

// Создание таблицы регионов
$sql = "CREATE TABLE IF NOT EXISTS region (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    code VARCHAR(10) NOT NULL
)";
$conn->exec($sql);

// Создание таблицы пользователей
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(30) DEFAULT '0.jpg'
)";
$conn->exec($sql);

// Создание таблицы городов с новыми полями
$sql = "CREATE TABLE IF NOT EXISTS cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    area FLOAT NOT NULL,
    population INT NOT NULL,
    region_id INT,
    logo VARCHAR(30) DEFAULT 'default.jpg',
    description TEXT,
    FOREIGN KEY (region_id) REFERENCES region(id) ON DELETE CASCADE
)";
$conn->exec($sql);

// Добавляем администратора, если его нет
$sql = "SELECT COUNT(*) FROM users WHERE login = 'admin'";
$count = $conn->query($sql)->fetchColumn();

if ($count == 0) {
    $stmt = $conn->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
    $stmt->execute([
        ':login' => 'admin',
        ':password' => password_hash('admin', PASSWORD_DEFAULT)
    ]);
}

// Добавляем тестовые данные для регионов, если их нет
$sql = "SELECT COUNT(*) FROM region";
$count = $conn->query($sql)->fetchColumn();

if ($count == 0) {
    // Сначала удаляем все города (если они есть)
    $conn->exec("DELETE FROM cities");
    
    // Затем добавляем регионы
    $regions = [
        ['name' => 'Ростовская область', 'code' => '61'],
        ['name' => 'Московская область', 'code' => '50'],
        ['name' => 'Краснодарский край', 'code' => '23'],
        ['name' => 'Воронежская область', 'code' => '36'],
        ['name' => 'Ставропольский край', 'code' => '26']
    ];
    
    $stmt = $conn->prepare("INSERT INTO region (name, code) VALUES (:name, :code)");
    foreach ($regions as $region) {
        $stmt->execute($region);
    }
    
    // После добавления регионов добавляем города
    $cities = [
        ['name' => 'Ростов-на-Дону', 'area' => 348.5, 'population' => 1137704, 'region_id' => 1, 'description' => 'Город на юге России, административный центр Ростовской области'],
        ['name' => 'Таганрог', 'area' => 80.11, 'population' => 247000, 'region_id' => 1, 'description' => 'Портовый город в Ростовской области'],
        ['name' => 'Шахты', 'area' => 158.2, 'population' => 233814, 'region_id' => 1, 'description' => 'Город в Ростовской области'],
        ['name' => 'Москва', 'area' => 2561.5, 'population' => 12506468, 'region_id' => 2, 'description' => 'Столица России'],
        ['name' => 'Подольск', 'area' => 40.39, 'population' => 302831, 'region_id' => 2, 'description' => 'Город в Московской области'],
        ['name' => 'Краснодар', 'area' => 339.31, 'population' => 948827, 'region_id' => 3, 'description' => 'Город на юге России, административный центр Краснодарского края'],
        ['name' => 'Сочи', 'area' => 176.77, 'population' => 432322, 'region_id' => 3, 'description' => 'Город-курорт в Краснодарском крае'],
        ['name' => 'Воронеж', 'area' => 596.51, 'population' => 1054111, 'region_id' => 4, 'description' => 'Город в европейской части России'],
        ['name' => 'Ставрополь', 'area' => 276.91, 'population' => 454488, 'region_id' => 5, 'description' => 'Город на юге России'],
        ['name' => 'Пятигорск', 'area' => 97.0, 'population' => 145448, 'region_id' => 5, 'description' => 'Город-курорт в Ставропольском крае']
    ];
    
    $stmt = $conn->prepare("INSERT INTO cities (name, area, population, region_id, description) VALUES (:name, :area, :population, :region_id, :description)");
    foreach ($cities as $city) {
        $stmt->execute($city);
    }
}
?> 