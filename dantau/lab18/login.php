<?php
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
        } else {
            $error = 'Неверный логин или пароль';
        }
    }
}
?>

<div class="form-container">
    <h2>Вход в систему</h2>
    
    <?php if (isset($error)): ?>
        <div style="color: red; margin-bottom: 15px;"><?php echo $error; ?></div>
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
    
    <p>Еще нет аккаунта? <a href="?content=register.php">Зарегистрируйтесь</a></p>
</div> 