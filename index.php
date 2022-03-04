<?php

session_start();

if(isset($_POST['other'])){
    $x = rand(1, 100);
    $_SESSION['x'] = $x;
}

if (isset($_SESSION['x'])) {
    $x = $_SESSION['x'];
}

//echo $x;

if($_POST['num'] == false){
    $_SESSION['false'] = 'Введите число.';
} else { 
    $num = $_POST['num'];
}

if($num < 0 || $num > 100){
    $_SESSION['error'] = 'Мы просили Вас выбрать число от 1 до 100. Попробуйте еще раз.';
} elseif($num == true && $num < $x){
    $_SESSION['small'] = 'Ой, Ваше число слишком маленькое.';
} elseif($num > $x){
    $_SESSION['big'] = 'Упсс! Ваше число слишком большое.';
} else {
    if($num == $x){
        $_SESSION['true'] = 'Поздравляем, Вы выйграли. Это число: '.$x.'. Кликните "Другое число", чтобы сыграть еще раз.';
    }
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Угадай число</title>
    </head>
    <body>
        <h1>Угадай число</h1>
        <p>Привет, мы загадали число в диапазоне от 1 до 100. Попробуй угадай)))</p>
        <form action="index.php" method="POST">
            <input type="number" name="num" placeholder="Введите число">
            <input type="submit" name="submit" value="Проверить">
            <p><input type="submit" name="other" value="Другое число"></p>
        </form>
        <hr>
            <?php
             echo $_SESSION['false']; unset($_SESSION['false']);
             echo $_SESSION['error']; unset($_SESSION['error']);
             echo $_SESSION['small']; unset($_SESSION['small']);
             echo $_SESSION['big']; unset($_SESSION['big']);
             echo $_SESSION['true']; unset($_SESSION['true']);           
            ?>
        <hr>
    </body>
</html>