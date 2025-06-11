<?php
require_once 'blocks/db.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $city_id = (int)$_GET['id'];
    
    // Получаем информацию о городе для удаления файла логотипа
    $stmt = $conn->prepare("SELECT logo FROM cities WHERE id = :id");
    $stmt->execute([':id' => $city_id]);
    $city = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Удаляем файл логотипа, если он существует и не является дефолтным
    if ($city && $city['logo'] !== 'default.jpg') {
        $logoPath = 'img/cities/' . $city['logo'];
        if (file_exists($logoPath)) {
            unlink($logoPath);
        }
    }
    
    // Удаляем город из базы данных
    $stmt = $conn->prepare("DELETE FROM cities WHERE id = :id");
    $stmt->execute([':id' => $city_id]);
}

header('Location: index.php?content=pages/admin.php');
exit(); 