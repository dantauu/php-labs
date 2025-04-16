
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная №1</title>
</head>
<body>
    
//Переменные

<br>
<?php 
$a = 3;
$b = 15;
$c = 5.5;
$d = false;
$f = true;
$stroka1 = 'Hello';
$stroka2 = 'world';
$stroka3 = 'Галанский Артем';
?>

<br>
//Арифметические операторы

<br> <br>
//Разность
<?php 
echo"</br>";
echo($a - $b);
echo"</br>";
echo($b - $c);
echo"</br>";
echo($a - $c)
?>

<br> <br>
//Сумма 
<?php 
echo"</br>";
echo($a + $b);
echo"</br>";
echo($b + $c);
echo"</br>";
echo($a + $c)
?>

<br> <br>
//Произведение
<?php
echo"</br>";
echo($a * $b);
echo"</br>";
echo($b * $c);
echo"</br>";
echo($a * $c)
?>

<br> <br>
//Частное
<?php
echo"</br>";
echo($a / $b);
echo"</br>";
echo($b / $c);
echo"</br>";
echo($a / $c)
?>

<br> <br>
//Конкатенцция
<?php
echo"</br>";
echo $stroka1. ' ' .$stroka2;
?>

<br> <br>
//Date
<p>Сегодняшняя дата:</p>
<?php 
echo date('l F jS Y.');
echo"</hr>";
?>

<br> <br>
//Дата практика
<?php 
echo"</br>";
echo date('l, d M Y.');
echo"</hr>";

echo"</br>";
echo date('D d.n.Y.');
echo"</hr>";

echo"</br>";
echo date('D d/n/Y.');
echo"</hr>";

echo"</br>";
echo date('D d F Y.');
echo"</hr>";

echo"</br>";
echo date('l F dS G:i');
echo"</hr>";
?>
</body>
</html>

