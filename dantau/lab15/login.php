<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <meta charset="UTF-8">
</head>
<body>
    <div style='display: flex; flex-direction: column; align-items: center; gap: 15px'>
        <h2>Форма авторизации</h2>
        <?php if(isset($_SESSION['error'])): ?>
            <div style="color: red;"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <form style='display: flex; flex-direction: column; gap: 20px; width: 340px' action="action_log.php" method="POST">
            <div style='display: flex; justify-content: space-between;'>
                <label>Имя</label>
                <input type="text" name="name">
            </div>
            <div style='display: flex; justify-content: space-between;'>
                <label>Пароль:</label>
                <input type="password" name="password">
            </div>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html> 