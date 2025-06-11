<?php
require_once 'blocks/db.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $area = $_POST['area'] ?? 0;
    $population = $_POST['population'] ?? 0;
    $region_id = $_POST['region_id'] ?? '';
    $description = $_POST['description'] ?? '';

    $logo = 'default.jpg';
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'img/cities/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileExtension = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($fileExtension, $allowedExtensions)) {
            $logo = uniqid() . '.' . $fileExtension;
            $uploadFile = $uploadDir . $logo;
            
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadFile)) {
            } else {
                $logo = 'default.jpg';
            }
        }
    }
    
    try {
        $stmt = $conn->prepare("
            INSERT INTO cities (name, area, population, region_id, description, logo) 
            VALUES (:name, :area, :population, :region_id, :description, :logo)
        ");
        
        $stmt->execute([
            ':name' => $name,
            ':area' => $area,
            ':population' => $population,
            ':region_id' => $region_id,
            ':description' => $description,
            ':logo' => $logo
        ]);
    } catch (PDOException $e) {
        die('Ошибка при добавлении города: ' . $e->getMessage());
    }
}

header('Location: index.php?content=pages/admin.php');
exit(); 