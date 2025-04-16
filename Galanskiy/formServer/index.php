<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Регистрация</title>
</head>

<body>
    <div class="form-server">
    <form method="POST">
        <input type="text" name="name">
        <input type="submit" name="отправить">
    </form>
    <?php
    $name = $_POST["name"];
    echo $name;
    ?>
    <br>
    <form action="" method="POST">
        <input type="text" name="one">
        <input type="text" name="two">
        <input type="submit" name="go">
        <br>

        <?php
        if (isset($_POST["go"])) {
            $one = $_POST["one"];
            $two = $_POST["two"];

            if ($one > $two) {
                echo "Первое число больше чем второе";
            } else if ($one < $two)
                echo "Второе число больше чем первое";
            else {
                echo "Они равны";
            }
        }
        ?>
    </form>
    <br>
    <h1>Форма</h1>
    <form method="POST">
        <input type="text" name="name"><br><br>
        <input type="text" name="first_name"><br>
        <br>
        <input type="radio" name="yo" value="меньше 18"> меньше 18
        <input type="radio" name="yo" value="18 и более"> 18 и более <br>
        <br>
        <input type="checkbox" name="uval[]" value="Ваше увлечение: Веб-дизайн"> Веб-дизайн
        <input type="checkbox" name="uval[]" value="Веб-разработка"> Веб-разработка
        <input type="checkbox" name="uval[]" value="Frontend">Frontend<br>
        <br>
        <select name="gorod">
            <option value="Таганрог">Таганрог</option>
            <option value="Ростов">Ростов</option>
            <option value="Воронеж">Воронеж</option>
            <option value="Москва">Москва</option>
        </select>
        <br>
        <br>
        <input type="submit" name="this">

        <?php
        if (isset($_POST["this"])) {
            $one = $_POST["name"];
            $two = $_POST["first_name"];

            $pol1 = $_POST["yo"];

            $uval = $_POST["uval"];

            $gorod = $_POST["gorod"];
            echo "<br>";
            echo "Ваше имя: " . $one;
            echo "<br>";
            echo "Ваш возраст: " . $pol1;
            echo "<br>";
             foreach ($uval as $value) {
                echo " " . $value;
            }
            echo "<br>";
            echo "Ваш город: " . $gorod;
            echo "<br>";
        }
        ?>
        </div>
    </form>
</body>
</html>