<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <meta charset="UTF-8">
</head>
<body style="margin:0; padding:0;">
    <main style="width:1000px; height:100vh; margin:0 auto; display:flex; flex-direction:column;">
        <header style="height:150px; display:flex; justify-content:space-between; align-items:center; padding:0 20px;">
            <div id="logo">
                <img src="./catman.jpg" alt="Логотип" style="height:100px;">
            </div>
            <div id="nav">
                <?php if(empty($_SESSION['dustup'])): ?>
                    <a href="login.php" style="margin-right: 20px;">Авторизация</a>
                    <a href="registration.php">Регистрация</a>
                <?php else: ?>
                    <span>Добро пожаловать, <?= htmlspecialchars($_SESSION['login']) ?></span>
                    <a href="exit.php" style="margin-left: 20px;">Выход</a>
                <?php endif; ?>
            </div>
        </header>
        <div id="content" style="flex:1; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <?php if(empty($_SESSION['dustup'])): ?>
                <h1>Вы обязаны зарегистрироваться</h1>
                <p>Для просмотра дополнительной информации авторизуйтесь</p>
            <?php else: ?>
                <h1>Теперь вы имеете полный доступ!</h1>
            <?php endif; ?>
        </div>
    </main>
</body>
</html> 