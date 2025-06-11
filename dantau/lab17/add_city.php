<?php
session_start();
require_once 'db.php';
require_once 'functions.php';

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $area = $_POST['area'] ?? 0;
    $population = $_POST['population'] ?? 0;

    if ($name && $area && $population) {
        addCity($conn, $name, $area, $population);
    }
}

header('Location: index.php');
exit(); 