<?php
require_once('dbconnect.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'Посмотреть') {
    $name = trim($_POST['view_name'] ?? '');

    if (empty($name)) {
        $mysql = "SELECT * FROM cities";
        $result = $dbcon->query($mysql);
        
        if (!$result) {
            $_SESSION['error'] = 'Ошибка выполнения запроса: ' . $dbcon->error;
        } else {
            $cities = [];
            while($myrow = $result->fetch_assoc()) {
                $cities[] = "Город: " . $myrow['name'] . 
                          ", Площадь: " . $myrow['area'] . 
                          ", Население: " . $myrow['population'];
            }
            
            if (!empty($cities)) {
                $_SESSION['view_result'] = implode("<br>", $cities);
            } else {
                $_SESSION['search-error'] = 'В базе нет городов';
            }
        }
    } else {
        $stmt = $dbcon->prepare("SELECT * FROM cities WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $myrow = $result->fetch_assoc();
            $_SESSION['view_result'] = "Найден город: " . $myrow['name'] . 
               ", Площадь: " . $myrow['area'] . 
               ", Население: " . $myrow['population'];
        } else {
            $_SESSION['search-error'] = 'Город не найден';
        }
    }

    header('Location: index.php');
    exit();
}
?>