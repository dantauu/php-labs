<div class="header">
    <div class="logo">
        <a href="index.php">
            <img src="img/logo.png" alt="Логотип сайта" width="100">
        </a>
    </div>
    <div class="user-block">
        <?php if (isset($_SESSION['login'])): ?>
            <div class="profile">
                <div class="avatar">
                    <img src="img/<?php echo $_SESSION['photo'] ?? '0.jpg'; ?>" alt="Аватар">
                </div>
                <div class="user-info">
                    <p>Логин: <?php echo $_SESSION['login']; ?></p>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="uploadfile">
                        <input type="submit" value="Загрузить">
                    </form>
                    <?php if ($_SESSION['login'] === 'admin'): ?>
                        <a href="?content=pages/admin.php" class="admin-btn">Панель управления</a>
                    <?php endif; ?>
                    <a href="logout.php" class="logout-btn">Выйти</a>
                </div>
            </div>
        <?php else: ?>
            <a href="?content=login.php">Войти</a> |
            <a href="?content=register.php">Регистрация</a>
        <?php endif; ?>
    </div>
</div> 