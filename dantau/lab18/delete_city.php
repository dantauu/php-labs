<?php
require_once 'blocks/db.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $city_id = (int)$_GET['id'];

    $stmt = $conn->prepare("SELECT logo FROM cities WHERE id = :id");
    $stmt->execute([':id' => $city_id]);
    $city = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($city && $city['logo'] !== 'default.jpg') {
        $logoPath = 'img/cities/' . $city['logo'];
        if (file_exists($logoPath)) {
            unlink($logoPath);
        }
    }
    
    $stmt = $conn->prepare("DELETE FROM cities WHERE id = :id");
    $stmt->execute([':id' => $city_id]);
}

header('Location: index.php?content=pages/admin.php');
exit(); 