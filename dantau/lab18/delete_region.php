<?php
require_once 'blocks/db.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $region_id = (int)$_GET['id'];
    
    try {
        // Сначала удаляем все города этого региона
        $stmt = $conn->prepare("SELECT logo FROM cities WHERE region_id = :region_id");
        $stmt->execute([':region_id' => $region_id]);
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Удаляем файлы логотипов
        foreach ($cities as $city) {
            if ($city['logo'] !== 'default.jpg') {
                $logoPath = 'img/cities/' . $city['logo'];
                if (file_exists($logoPath)) {
                    unlink($logoPath);
                }
            }
        }
        
        // Удаляем города
        $stmt = $conn->prepare("DELETE FROM cities WHERE region_id = :region_id");
        $stmt->execute([':region_id' => $region_id]);
        
        // Удаляем регион
        $stmt = $conn->prepare("DELETE FROM region WHERE id = :id");
        $stmt->execute([':id' => $region_id]);
    } catch (PDOException $e) {
        die('Ошибка при удалении региона: ' . $e->getMessage());
    }
}

header('Location: index.php?content=pages/admin.php');
exit(); 