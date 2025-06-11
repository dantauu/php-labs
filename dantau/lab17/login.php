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
    
    if ($login && $password) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->execute([':login' => $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['login'] = $user['login'];
            $_SESSION['photo'] = $user['avatar'];
            header('Location: index.php');
            exit();
        }
    }
    $error = "Неверный логин или пароль";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .register-link {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="content login-form">
        <h2>Вход в систему</h2>
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
                <input type="submit" value="Войти">
            </div>
        </form>
        
        <div class="register-link">
            <a href="register.php">Зарегистрироваться</a>
        </div>
    </div>
</body>
</html> 