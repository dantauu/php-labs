<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba07</title>
</head>
<body>

    <style>
        .color-box {
            width: 100px;
            height: 100px;
            margin-top: 10px;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
<div class="wrapper">

<form method="POST">
    <label for="number">Введите число (1-10):</label>
    <input type="number" name="number" id="number" required>
    <button type="submit" name='click'>Показать цвет</button>
</form>


        <?php
if (isset($_POST['click'])) {
    $number = $_POST["number"];

    
        if (is_numeric($number) && $number >= 1 && $number <= 60) {
    $color = "green";

    for ($i = 4; $i <= 60; $i += 5) {
        if ($number >= $i && $number <= $i + 1) {
            $color = "red";
            break;
        }}
        echo "<div class='color-box' style='background-color: $color;'></div>";
        echo "<p>Число $number - цвет $color</p>";
    }
}
  ?>

</div>
    
</body>
</html>