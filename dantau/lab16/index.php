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
                    <a href="lk.php">Личный кабинет</a>
                    <a href="exit.php">Выход</a>
                <?php endif; ?>
            </div>
        </header>
        <div id="content" style="flex:1; display:flex; flex-direction:column; align-items:center; justify-content:center;">
            <?php if(empty($_SESSION['dustup'])): ?>
                <h1>Добро пожаловать на наш сайт!</h1>
                <p>Для просмотра дополнительной информации авторизуйтесь</p>
            <?php else: ?>
                <h1>Добро пожаловать, <?= htmlspecialchars($_SESSION['name']) ?>!</h1>
                <p>Перейдите в свой <a href="lk.php">личный кабинет</a> для управления учетной записью.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html> 