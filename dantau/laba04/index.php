<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../laba04/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Задание 1</h1>
<?php
$numbers = [];
for ($i = 0; $i < 10; $i++) {
  $numbers[] = rand(1, 10); 
}


echo "Весь массив: ";
foreach($numbers as $numberses) {
    echo $numberses . " ";
};
echo "<br>";


echo "Четные элементы: ";
foreach ($numbers as $number) {
  if ($number % 2 == 0) {
    echo $number . " ";
  }
}
echo "<br>";

//Максимальный и минимальный элемент
$max = max($numbers);
$min = min($numbers);
echo "Максимальный элемент: " . $max . "<br>";
echo "Минимальный элемент: " . $min . "<br>";

//Массив по возрастанию
sort($numbers);
echo "Отсортированный массив по возрастанию: ";
foreach ($numbers as $nambars) {
  echo $nambars . " ";
};
?>

    <h1>Задание 2</h1>

<?php
    $randomNumbers = [];
for ($i = 0; $i < 10; $i++) {
  $randomNumbers[] = rand(1, 10);
}

//Весь массив
echo "Массив: ";
foreach ($randomNumbers as $Numbars) {
  echo $Numbars . " ";
};
echo "<br>";

//Вывод элементов, которые больше предыдущих
echo "Элементы, больше предыдущих: ";
$previousNumber = null;
foreach ($randomNumbers as $number) {
  if ($previousNumber !== null && $number > $previousNumber) {
    echo $number . " ";
  }
  $previousNumber = $number;
}
echo "<br>";
?>

    <h1>Задание 3</h1>
<div class="column">
<?php 
 echo "Пирамида \n";
for ($i = 1; $i <= 15; $i++) {
  for ($j = 1; $j <= $i; $j++) {
    echo "*";
  }
  echo "\n";
}
?>
</div>

    <h1>Задание 4</h1>

<?php 

$numbers = [];
for ($i = 0; $i < 10; $i++) {
  $numbers[] = rand(1, 10);
}

$counts = array_count_values($numbers);

echo "Массив: ";
foreach ($numbers as $numbersases) {
  echo $numbersases . " ";
};
echo "<br>";

echo "Количество повторов каждого числа: ";
echo "<br>";

foreach ($counts as $number => $count) {
  if ($count > 1) {
    $color = "blue";
  } else {
    $color = "red";
  }

  echo "<span style='font-size:20px;color:$color'><b>$number</b></span> - $count <br>";
}

$uniqueNumbers = array_unique($numbers);
echo "<br>";
echo "Уникальные элементы массива: ";
foreach ($uniqueNumbers as $numbers) {
  echo $numbers . " ";
};
echo "<br>";
?>

    <h1>Задание 5</h1>

<?php 

$array1 = [];
$array2 = [];
for ($i = 0; $i < 10; $i++) {
  $array1[] = rand(1, 100);
  $array2[] = rand(1, 100);
}

echo "Массив 1: ";
foreach ($array1 as $arrays) {
  echo $arrays . " ";
};
echo "<br>";

echo "Массив 2: ";
foreach ($array2 as $arrays) {
  echo $arrays . " ";
};
echo "<br>";

$combinedArray = array_merge($array1, $array2);
$uniqueElements = array_unique($combinedArray);

echo "Уникальные элементы: ";
foreach ($uniqueElements as $elements) {
  echo $elements . " ";
};


?>

</body>
</html>