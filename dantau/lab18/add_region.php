<?php
require_once 'blocks/db.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $code = $_POST['code'] ?? '';
    
    if ($name && $code) {
        $stmt = $conn->prepare("INSERT INTO region (name, code) VALUES (:name, :code)");
        $stmt->execute([
            ':name' => $name,
            ':code' => $code
        ]);
    }
}

header('Location: index.php?content=pages/admin.php');
exit(); 