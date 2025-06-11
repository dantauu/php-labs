<?php
session_start();
require_once 'db.php';

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    $error = null;
    
    if (!$login || !$password || !$confirm_password) {
        $error = "Все поля должны быть заполнены";
    } elseif ($password !== $confirm_password) {
        $error = "Пароли не совпадают";
    } else {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE login = :login");
        $stmt->execute([':login' => $login]);
        if ($stmt->fetchColumn() > 0) {
            $error = "Такой логин уже занят";
        }
    }
    
    if (!$error) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
        
        if ($stmt->execute([':login' => $login, ':password' => $hashed_password])) {
            $_SESSION['login'] = $login;
            $_SESSION['photo'] = '0.jpg';
            header('Location: index.php');
            exit();
        } else {
            $error = "Ошибка при регистрации";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .register-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .login-link {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="content register-form">
        <h2>Регистрация</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div>
                <input type="text" name="login" placeholder="Логин" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Пароль" required>
            </div>
            <div>
                <input type="password" name="confirm_password" placeholder="Подтвердите пароль" required>
            </div>
            <div>
                <input type="submit" value="Зарегистрироваться">
            </div>
        </form>
        
        <div class="login-link">
            <a href="login.php">Уже есть аккаунт? Войти</a>
        </div>
    </div>
</body>
</html> 