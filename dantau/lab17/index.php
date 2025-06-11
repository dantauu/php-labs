<?php
session_start();
require_once 'db.php';
require_once 'functions.php';

$isAuth = isset($_SESSION['login']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <?php if ($isAuth): ?>
            <div class="profile">
                <div class="avatar">
                    <img src="img/<?php echo $_SESSION['photo'] ?? '0.jpg'; ?>" alt="Аватар">
                </div>
                <div class="user-info">
                    <p>Логин: <?php echo $_SESSION['login']; ?></p>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="uploadfile">
                        <input type="submit" value="Загрузить">
                    </form>
                    <a href="logout.php" class="logout-btn">Выйти</a>
                </div>
            </div>
        <?php else: ?>
            <a href="login.php">Войти</a>
        <?php endif; ?>
    </div>

    <div class="content">
        <h2>Список городов</h2>
        <?php
        $cities = getCities($conn);
        ?>
        <table>
            <tr>
                <th>Город</th>
                <th>Площадь</th>
                <th>Население</th>
                <?php if ($isAuth): ?>
                    <th>Действия</th>
                <?php endif; ?>
            </tr>
            <?php foreach ($cities as $city): ?>
            <tr>
                <td><?php echo htmlspecialchars($city['name']); ?></td>
                <td><?php echo htmlspecialchars($city['area']); ?></td>
                <td><?php echo htmlspecialchars($city['population']); ?></td>
                <?php if ($isAuth): ?>
                    <td>
                        <a href="delete_city.php?id=<?php echo $city['id']; ?>">Удалить</a>
                    </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </table>

        <?php if ($isAuth): ?>
            <h3>Добавить город</h3>
            <form action="add_city.php" method="POST">
                <input type="text" name="name" placeholder="Название города" required>
                <input type="number" name="area" placeholder="Площадь" required>
                <input type="number" name="population" placeholder="Население" required>
                <input type="submit" value="Добавить">
            </form>
        <?php endif; ?>
    </div>
</body>
</html> 