<?php
require_once 'blocks/db.php';

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

<div class="form-container">
    <h2>Регистрация</h2>
    
    <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="?content=register.php">
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
        <p>Уже есть аккаунт? <a href="?content=login.php">Войти</a></p>
    </div>
</div> 