<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practick1</title>
</head>
<body>

<!--Вариант 1 -->
    <!-- <div class="style">
    <div style = "width: 150px;                 
                  height: 150px;
                  border-radius: 10px;
                  background-color: red;">
    </div>
</div> -->
    
    <!--Вариант 2 -->
        <!-- <?php 
    $bgcolor = "red";
    $bradius = 10;
    $size = 150;
    for($i = 0; $i <= 4; $i++) {
?>
        <div style="background-color: <?=$bgcolor?>;
        width: <?=$size?>px; height: <?=$size?>px;
        border: 1px solid black; border-radius: <?=$bradius?>px;"></div>
        <?php
        $size -= 10; }
?> -->

    <!--Вариант 3 -->

    <?php

    $border = "16px";
    $w = 150;
    $colors = ["red", "green", "blue", "yellow", "purple"];

    shuffle($colors);

    for ($i = 0; $i < 5; $i++) {

    echo "<div style='width: ".$w."px; height: ".$w."px; background: $colors[$i]; border-radius: $border;'></div>";
    $w -= 10;
    }
?>

<style>
        .target {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 20px solid red;
            position: relative;
            margin: 50px auto;
        }

        .circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .circle:nth-child(1) {
            background-color: white;
        }

        .circle:nth-child(2) {
            background-color: black;
            width: 160px;
            height: 160px;
            top: 20px;
            left: 20px;
        }

        .circle:nth-child(3) {
            background-color: white;
            width: 120px;
            height: 120px;
            top: 40px;
            left: 40px;
        }

        .circle:nth-child(4) {
            background-color: black;
            width: 80px;
            height: 80px;
            top: 60px;
            left: 60px;
        }

        .circle:nth-child(5) {
            background-color: white;
            width: 40px;
            height: 40px;
            top: 80px;
            left: 80px;
        }
    </style>

<div class="target">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
</div>


</body>
</html>