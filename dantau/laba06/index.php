<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../laba06/style.css">
    <title>Laba06</title>
</head>
<body>

    <h3 style= "text-align: center">Задание 1</h3>
    <form method="POST" class='change-form'>
        <input type="number" placeholder="typing..." name="number" required>
        <button style="margin-top: 30px" type="submit" name="submit">Вычислить</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

      $number = $_POST['number'];

 if (is_numeric($number)) {
        echo "<h3>Результат:</h3>";
        echo "Числа от 1 до {$number}: ";
        for ($i = 1; $i <= $number; $i++) {
          echo $i . " ";
        }
        echo "<br>";
        echo "Квадраты чисел от 1 до {$number}: ";
        $sumOfSquares = 0;
        for ($i = 1; $i <= $number; $i++) {
          $square = $i * $i;
          echo $square . " ";
          $sumOfSquares += $square;
        }
        echo "<br>";
        echo "Сумма квадратов: {$sumOfSquares}";
      } else {
        echo "<p>Введите корректное число.</p>";
      }
    }
  ?>
    
      

  <h3 style= "text-align: center">Задание 2</h3>

    <form method= "POST" class='change-form'>
      <input type="text" name="fio">
      <button style="margin-top: 30px" type='submit' name='submits'>Вычислить</button>
    </form>

    <?php
   if (isset($_POST['submits'])) {
      $mass = $_POST['fio'];

    $parts = explode(' ', $mass);

    if (count($parts) === 3) {
      $surname = $parts[0];
      $firstName = $parts[1];
      $middleName = $parts[2];

      $shortFio = $surname . " " . mb_substr($firstName, 0, 1) . ". " . mb_substr($middleName, 0, 1) . ".";
      $veryShortFio = mb_substr($surname, 0, 1) . ". " . mb_substr($firstName, 0, 1) . ". " . mb_substr($middleName, 0, 1) . ".";

      echo "<h3>Результат:</h3>";
      echo "Сокращённый вариант: $shortFio<br>";
      echo "Полностью сокращённый вариант: $veryShortFio<br>";
    }
  }
  ?>


    <h3>Задание 3</h3>
  <form method="post" action="">
    <label for="numberInput">Введите число:</label>
    <input type="text" id="numberInput" name="numberInput" required>
    <button name="submited" type="submit">Рассчитать</button>
  </form>

  <?php
  if (isset($_POST['submited'])) {

      $number = $_POST['numberInput'];

    if (!is_numeric($number)) {
      echo "<p>Некорректный ввод. Пожалуйста, введите число.</p>";
    } else {
      $sum = 0;
      $digits = str_split($number); 

      foreach ($digits as $digit) {
        $sum += intval($digit); 
      }

      echo "<p>Сумма цифр числа $number равна $sum</p>";
    }
  }
  ?>


    
</body>
</html>