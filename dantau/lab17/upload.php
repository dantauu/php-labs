<?php
session_start();
require_once 'db.php';
require_once 'functions.php';

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

if (isset($_FILES['uploadfile'])) {
    $file_name = $_FILES['uploadfile']['name'];
    $file_size = $_FILES['uploadfile']['size'];
    $file_tmp = $_FILES['uploadfile']['tmp_name'];
    $file_type = $_FILES['uploadfile']['type'];
    
    // Проверяем расширение файла
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $extensions = array("jpeg", "jpg", "png");
    
    if (in_array($file_ext, $extensions)) {
        // Создаем уникальное имя файла
        $new_file_name = uniqid() . '.' . $file_ext;
        
        // Перемещаем файл в папку img
        if (!file_exists('img')) {
            mkdir('img', 0777, true);
        }
        
        if (move_uploaded_file($file_tmp, "img/" . $new_file_name)) {
            // Обновляем информацию в базе данных
            if (updateUserAvatar($conn, $_SESSION['login'], $new_file_name)) {
                $_SESSION['photo'] = $new_file_name;
                header('Location: index.php');
                exit();
            }
        }
    }
}

header('Location: index.php');
exit(); 