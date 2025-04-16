<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba08</title>
</head>
<body>

<?php
//Массив случайных чисел
$numbers = [];
for ($index = 1; $index <= 10; $index++) {
    $randomValue = rand(100, 200);
    echo "Элемент $index: " . $randomValue . "<br>";
    $numbers[$index] = $randomValue;
}

//Подсчета среднего значения-функция
function calculateMean($values) {
    $totalSum = array_sum($values);
    $totalCount = count($values);
    return $totalSum / $totalCount;
}

$meanValue = calculateMean($numbers);
echo "<br>Среднее значение массива: " . $meanValue;
?>

<hr>

<?php
$dataArray = range(1, 10);

//Добавления случайных элементов-функция
function appendRandomElements(&$array) {
     for ($counter = 0; $counter < 6; $counter++) {
        $newElement = rand(30, 80);
        $array[] = $newElement;
    }
}
appendRandomElements($dataArray);


echo '<pre>';
foreach($dataArray as $upArr) {
    echo $upArr . ' ';
};
echo '</pre>';
?>

<hr>

<!-- Форма -->
<form method="post">
    <label for="rowInput">Число строк:</label>
    <input type="number" id="rowInput" name="rows" value="<?php echo htmlspecialchars($_POST["rows"] ?? ''); ?>">   
    <br>
    <label for="colInput">Число столбцов:</label>
    <input type="number" id="colInput" name="columns" value="<?php echo htmlspecialchars($_POST["columns"] ?? ''); ?>">  
    <br>
    <input type="submit" name="submit" value="Сгенерировать таблицу">
</form>

<br>

<!-- Таблица -->
<table border="2" style="border-collapse: collapse;">
<?php 
function createTable($rows, $columns) {
    for ($row = 0; $row < $rows; $row++) {
        echo "<tr>";
        for ($col = 0; $col < $columns; $col++) {
            echo "<td><input type='text' readonly></td>";
        }
        echo "</tr>";
    }
}

if (isset($_POST["submit"])) {
    $rowCount = intval($_POST["rows"] ?? 0);
    $colCount = intval($_POST["columns"] ?? 0);

    createTable($rowCount, $colCount);
}
?>

</table>

</body>
</html>