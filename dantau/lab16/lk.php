<?php
session_start();
require_once 'dbconnect.php';

// Проверка авторизации
if (empty($_SESSION['dustup']) || $_SESSION['dustup'] !== true) {
    header('Location: login.php');
    exit();
}

// Инициализация сообщений
$success = $_SESSION['lk_success'] ?? '';
$error   = $_SESSION['lk_error'] ?? '';
unset($_SESSION['lk_success'], $_SESSION['lk_error']);

// Обработка смены пароля
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_pass      = $_POST['old_pass'] ?? '';
    $new_pass      = $_POST['new_pass'] ?? '';
    $confirm_pass  = $_POST['confirm_pass'] ?? '';

    if (empty($old_pass)) {
        $_SESSION['lk_error'] = 'Введите текущий пароль';
    } elseif (empty($new_pass) || empty($confirm_pass)) {
        $_SESSION['lk_error'] = 'Все поля обязательны для заполнения';
    } else {
        // Проверка текущего пароля в базе
        $stmt_old = $dbcon->prepare("SELECT pass FROM users WHERE login = ?");
        $stmt_old->bind_param("s", $_SESSION['login']);
        $stmt_old->execute();
        $res_old = $stmt_old->get_result();
        $row_old = $res_old->fetch_assoc() ?: [];
        if (!isset($row_old['pass']) || $row_old['pass'] !== $old_pass) {
            $_SESSION['lk_error'] = 'Неправильный текущий пароль';
        } elseif ($new_pass !== $confirm_pass) {
            $_SESSION['lk_error'] = 'Пароли не совпадают';
        } elseif (strlen($new_pass) < 5) {
            $_SESSION['lk_error'] = 'Пароль должен содержать минимум 5 символов';
        } elseif (strlen($new_pass) > 15) {
            $_SESSION['lk_error'] = 'Пароль не должен превышать 15 символов';
        } else {
            $stmt = $dbcon->prepare("UPDATE users SET pass = ? WHERE login = ?");
            $stmt->bind_param("ss", $new_pass, $_SESSION['login']);
            if ($stmt->execute()) {
                $_SESSION['lk_success'] = 'Пароль успешно изменён';
            } else {
                $_SESSION['lk_error'] = 'Ошибка при изменении пароля';
            }
        }
    }
    header('Location: lk.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
    <meta charset="UTF-8">
</head>
<body style="margin:0; padding:0; font-family: sans-serif;">
    <main style="width:1000px; margin:20px auto;">
        <h1>Личный кабинет</h1>
        <div style="display:flex; gap:20px; align-items:center;">
            <div>
                <img src="catman.jpg" alt="Аватарка" style="width:150px; height:150px; border-radius:50%; object-fit:cover;">
            </div>
            <div>
                <p><strong>Имя:</strong> <?= htmlspecialchars($_SESSION['name']) ?></p>
                <p><strong>Логин:</strong> <?= htmlspecialchars($_SESSION['login']) ?></p>
            </div>
        </div>

        <section style="margin-top:30px; max-width:400px;">
            <h2>Сменить пароль</h2>
            <?php if ($error): ?>
                <div style="color:red; margin-bottom:10px;"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div style="color:green; margin-bottom:10px;"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>
            <form action="lk.php" method="POST" style="display:flex; flex-direction:column; gap:10px;">
                <label>Текущий пароль:</label>
                <input type="password" name="old_pass" maxlength="15">
                <label>Новый пароль:</label>
                <input type="password" name="new_pass" maxlength="15">

                <label>Повторите новый пароль:</label>
                <input type="password" name="confirm_pass" maxlength="15">

                <button type="submit" style="padding:8px 12px;">Сменить пароль</button>
            </form>
        </section>

        <p style="margin-top:20px;"><a href="index.php">← На главную</a></p>
    </main>
</body>
</html> 