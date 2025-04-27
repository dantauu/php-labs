<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <meta charset="UTF-8">
</head>
<body>
    <div style='display: flex; flex-direction: column; align-items: center; gap: 15px'>
    <h2>Форма регистрации</h2>
    <?php if(isset($_SESSION['success'])): ?>
        <div style="color: green;"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <div style="color: red;"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form style='display: flex; flex-direction: column; gap: 20px; width: 340px' action="action_reg.php" method="POST">
        <div style='display: flex; justify-content: space-between;'>
            <label>Имя пользователя:</label>
            <input type="text" name="name" required>
        </div>
        
        <div style='display: flex; justify-content: space-between;'>
            <label>Логин:</label>
            <input type="text" name="login" required>
        </div>
        
        <div style='display: flex; justify-content: space-between;'>
            <label>Пароль (до 15 символов):</label>
            <input type="password" name="password" maxlength="15" required>
        </div>
        
        <div style='display: flex; justify-content: space-between;'>
            <label>Подтверждение пароля:</label>
            <input type="password" name="confirm_password" maxlength="15" required>
        </div>
        
        <button type="submit">Зарегистрироваться</button>
    </form>
    </div>
</body>
</html>