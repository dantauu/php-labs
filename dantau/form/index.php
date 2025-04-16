

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../form/style.css">
    <title>Document</title>
</head>
<body>

    <form>
        <h2>Регистрация</h2>
          <div class="form-inner">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" placeholder="Имя">

            <label for="surname">Фамилия</label>
            <input type="text" name="surname" id="surname" placeholder="Фамилия">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail">

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Пароль">

            <label for="password2">Подтверждение пароля</label>
            <input type="password" name="password2" id="password2" placeholder="Подтверждение пароля">
            

            <div class="inner-wrapper">
            <label for="day">Число</label>
            <select id="day" name="day">
              <?php
                $day = range(1, 31);

    

                for ($i = 1; $i <= count($day); $i++) {
                  echo "<option value='$i'>$i</option>";
                }
              ?>
            </select>
            <label for="month">Месяц</label>
            <select name="month" id="month">
              <?php
               $month = [
                  "Январь",
                  "Февраль",
                  "Март",
                  "Апрель",
                  "Май",
                  "Июнь",
                  "Июль",
                  "Август",
                  "Сентябрь",
                  "Октябрь",
                  "Ноябрь",
                  "Декабрь"
                ];

                $index = 0;

                while ($index < count($month)) {
                  echo "<option value='$index'>$month[$index]</option>";
                  $index++;
                }

              //  foreach ($month as $month) {
              //     echo "<option value='$month'>$month</option>";
              //   }
              ?>
            </select>
            <label for="year">Год</label>
            <select id="year" name="year">
              <?php
                $year = range(1970, 2024);

                foreach ($year as $year) {
                  echo "<option value='$year'>$year</option>";
                }
              ?>
            </select>
            </div>
            <button class="button-form">Зарегестрироваться</button>
          </div>
        </form>
    
</body>
</html>