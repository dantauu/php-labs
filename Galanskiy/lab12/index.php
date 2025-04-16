<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить город</title>
</head>
<body>

    <h1>Добавить город</h1>
   <form action="city_add.php" method="POST">
        <div>
            <label for="name">Название города:</label>
            <input type="text" id="name" placeholder='Введите город' name="name">
        </div>

        <div>
            <label for="area">Площадь:</label>
            <input type="number" id="area" placeholder='Введите площадь' name="area">
        </div>
        <div>
            <label for="population">Население:</label>
            <input type="number" id="population" placeholder='Введите население' name="population">
        </div>
        <?php
            session_start();
            if (isset($_SESSION['error'])): 
        ?>
            <div class="error-message" style="color: red;">
                <?= $_SESSION['error'] ?>
            </div>
            <?php 
            unset($_SESSION['error']); 
            endif; 
        ?>

        <input type="submit" value="Добавить">
    </form>

</body>
</html>
