<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lab03/style.css">
    <title>Document</title>
</head>
<body>

    <?php 
    $count = 0;
    $number = 101;
    $sum = 0;

    echo "Первые 10 нечетных чисел 100:\n";
        while ($count < 10) {
            if ($number % 2 !== 0) {
            echo $number . "\n";
        $count++;
            }
        $sum += $number;
    } 


echo"</br>";
    $average = $sum / 10;
        echo "\n Среднее значение: " . $average;

    // Вывод нечетных чисел в обратном порядке
        echo "\n Нечетные числа в обратном порядке:\n";
        $number = 101;
while ($count > 0) {
    if ($number % 2 != 0) {
        $count--;
        $number++;
    } else {
        $number++;
    }
}
// Вывод последнего нечетного числа
echo $number - 2 . "\n";

for ($i = 9; $i >= 0; $i--) {
    $number -= 2;
}
echo $number . "\n";
    ?>



    <br> <br>



    <?php

$evenNumbers = [];
$sumOfEvens = 0;

for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        $evenNumbers[] = $i;
        $sumOfEvens += $i;
    }
}

"<br>";
echo "Sum:" . $sumOfEvens . "<br>";

$average = $sumOfEvens / 10;
echo "AVG:" . $average . "<br>";

// Выводим четные числа с изменением размера текста
for ($i = 0; $i < 10; $i++) {
    $textSize = ($i + 1) * 5;
    echo "<span style='font-size:{$textSize}px; color: green;'>{$evenNumbers[$i]}</span><br>";
}





$svg = '<svg width="350" height="500" viewBox="200 0 500 500">';

$centerX = 250; // Центр кругов
$centerY = 25; // Центр кругов
$radius = 20;   // Начальный радиус
$offset = 0;    // Смещение по горизонтали

for ($i = 0; $i < 10; $i++) {
    $svg .= "<circle cx='$centerX' cy='$centerY' r='$radius' fill='none' stroke='red' stroke-width='2' />";
    $radius += 15; 
    $offset += $radius; 
    $centerX = 250 + $offset; 
}

$svg .= '</svg>';

echo $svg;

?>

 <style>
    table {
border-collapse: collapse;
width: 300px;
margin-top: -300px;
}

td {
width: 37.5px;
height: 37.5px;
text-align: center;
font-size: 24px;
}

.white {
background-color: #fff;
}

.black {
background-color: #000;
}
  </style>
</head>
<body>

<table>
<?php
for ($i = 0; $i < 8; $i++) {
  echo "<tr>";
  for ($j = 0; $j < 8; $j++) {
    $color = (($i + $j) % 2 == 0) ? 'white' : 'black';
    echo "<td class='$color'></td>";
  }
  echo "</tr>";
}
?>
</table>

<br> <br>

<?php

// Генерируем случайное число от 1 до 100
$random_number = rand(1, 100);

// Переводим число в двоичную систему счисления
$binary_number = decbin($random_number);

// Выводим результат
echo "Случайное число: $random_number\n";
echo "Двоичное представление: $binary_number\n";

?>




</body>
</html>