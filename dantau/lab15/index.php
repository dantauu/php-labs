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
                <h2>Логотип</h2>
            </div>
            <div id="nav">
                <?php if(empty($_SESSION['dustup'])): ?>
                    <a href="login.php">Авторизация</a>
                    <a href="registration.php">Регистрация</a>
                <?php else: ?>
                    <span>Добро пожаловать, <?= htmlspecialchars($_SESSION['name']) ?></span>
                    <a href="exit.php">Выход</a>
                <?php endif; ?>
            </div>
        </header>
        <div id="content" style="flex:1; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <?php if(empty($_SESSION['dustup'])): ?>
                <h1>Добро пожаловать на наш сайт!</h1>
                <p>Для просмотра дополнительной информации авторизуйтесь</p>
                <?php else: ?>
                  <h1>Теперь вы имеете полный доступ!</h1>
                  <img src="./catman.jpg" alt="1" style="width: 500px; height: 500px; border-radius: 30%;">
            <?php endif; ?>
        </div>
    </main>
</body>
</html> 