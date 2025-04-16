<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba09</title>
</head>
<body>

<h1>Задание 1</h1>
<form method="post">
        <textarea name="a"><?php
            if (isset($_POST['b'])) {
                $file = $_POST['file'];
                $f = fopen($file, "r");
                if ($f) {
                    while (!feof($f)) {
                        echo fgets($f);
                    }
                    fclose($f);
                }
            }
        ?></textarea>
        <br>
        <input type="submit" name="save" value="Сохранить">
        <?php
    if (isset($_POST['save'])) {
        $file = $_POST['file'];
        $f = fopen($file, "w");
        fwrite($f, $_POST['a']);
        fclose($f);
    }
    ?>
        <input type="submit" name="b" value="Открыть">
        <br><br>
<select name="file">
    <?php
    $dir = opendir('.');
    while (($file = readdir($dir)) !== false) {
        if ($file != "." and $file != ".."){
            echo "<option value='$file' .  >$file</option>";
            }   
           
         }
    closedir($dir);
    ?>
</select>

    </form>

<h1>Задание 2</h1>

<form method="post">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="pas" placeholder="Пароль" required>
    <br>
    <input type="submit" name="reg" value="Зарегистрироваться">
    <input type="submit" name="chek" value="Просмотреть">
</form>

<?php
$e = 0;
$i=1;
$fil = "user.txt";  

if (isset($_POST['reg'])) {
    $login = $_POST['login'];
    $pas = $_POST['pas'];

    $lp = "Логин: $login\nПароль: $pas\n";

    $file = fopen($fil, "a");
    fwrite($file, $lp);
    fclose($file);

    echo "<p>Вы успешно зарегистрированы!</p>";
}

if (isset($_POST['chek'])) { 
    $a = fopen($fil, 'r');
    echo "<h3>Файл 'user.txt' открыт:</h3>";
    
    while(!feof($a)){
  $str = fgets($a) ;
    if ($i % 2 != 0){
        echo  "<br>".$str;
        $i++;
       }

    else  if ($i % 2 == 0){
    $mass = explode (":", $str) ;
    echo "<br>". $mass[0];
    $e = strlen($mass[1]);
        while($e >= 0){
            echo "*" ;
            $e--;
}
        $i=1;
    }
}
fclose($a);
}
?>


    
</body>
</html>