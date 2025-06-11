<?php
session_start();
require_once 'db.php';
require_once 'functions.php';

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    deleteCity($conn, $id);
}

header('Location: index.php');
exit(); 