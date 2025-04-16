<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить город</title>
</head>
<body>
    <?php require_once('city_view.php'); ?>
    <h1>Добавить город</h1>
   <form style='display: flex; gap: 30px; flex-direction: column; align-items: center' action="city_add.php" method="POST">
        <div style='display: flex; flex-direction: column'>
            <label for="name">Введите город</label>
            <input type="text" id="name" placeholder='...' name="name">
        </div>

        <div style='display: flex; flex-direction: column'>
            <label for="area">Введите площадь</label>
            <input type="number" id="area" placeholder='...' name="area">
        </div>
        <div style='display: flex; flex-direction: column'>
            <label for="population">Введите население</label>
            <input type="number" id="population" placeholder='...' name="population">
        </div>
        <?php
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

    <form method='POST' style='display: flex; flex-direction: column; align-items: center; padding-top: 40px;' action="city_view.php">
      <div style='display: flex; flex-direction: column'>
         <label for="view_name">Введите город для поиска</label>
         <input type="text" id="view_name" placeholder='...' name="view_name">
      </div>
      <?php
         if (isset($_SESSION['view_result'])): 
         ?>
            <div class="view-result" style="color: green; margin-top: 20px;">
               <?= $_SESSION['view_result'] ?>
            </div>
         <?php 
         unset($_SESSION['view_result']);
         endif; 
         ?>
        <?php
            if (isset($_SESSION['search-error'])): 
        ?>
            <div class="error-message" style="color: red;">
                <?= $_SESSION['search-error'] ?>
            </div>
            <?php 
            unset($_SESSION['search-error']); 
            endif; 
        ?>
      <input type="submit" name="action" value="Посмотреть">
    </form>
</body>
</html>
