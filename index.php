<?php
// use a switch case
$firstNumber = 0;
$secondNumber = 0;
$calculate = null;
$ope = ['+', '-', '*', '/', '²'];
$text = '';
$result = 'rien du tout';
$error = false;

if (isset($_GET['firstNumber']) && isset($_GET['secondNumber']) && isset($_GET['calculate'])){
    $firstNumber = $_GET['firstNumber'];
    $secondNumber = $_GET['secondNumber'];
    $calculate = $_GET['calculate'];
}


if(is_numeric($firstNumber) !== null && is_numeric($secondNumber) !== null){

    switch ($calculate){
        case '+':
            $text ='additionner';
            $result = $firstNumber + $secondNumber;
            break;
        case '-':
            $text = 'soustrait';
            $result = $firstNumber - $secondNumber;
            break;
        case '*':
            $text = 'mulitplier';
            $result = $firstNumber * $secondNumber;
            break;
        case '/':
            $text = 'diviser';
            if($secondNumber !== 0){
                $result = $firstNumber / $secondNumber;
            }else{
                $result = "CE N'EST PAS POSSIBLE EN FAITE";
            }
            break;
        case '²':
            $text = 'exposer';
            if(is_int($secondNumber)){
                $result = $firstNumber ** $secondNumber;
            }else{
                $secondNumber = round($secondNumber);
                $result = $firstNumber ** $secondNumber;
            }
            break;
    }

}else{
    $error = 'Choisissez des nombres';
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <h1>Calculette</h1>
    <form action="#" method="GET">
        <div>
            <label for="firstNumber">
                Votre premier nombre:
            </label>
            <input type="text" name="firstNumber" id="firstNumber" value="0">
        </div>
        <div>
            <label for="secondNumber">
                Votre deuxième nombre:
            </label>
            <input type="text" name="secondNumber" id="secondNumber" value="0">
        </div>
        <?php foreach ($ope as $item): ?>
            <input type="submit" value="<?= $item ?>" name="calculate">
        <?php endforeach; ?>
    </form>
    <?php if(!$error){?>
        <p> <?= $firstNumber . ' ' . $text . ' par ' . $secondNumber . ' = ' . $result; ?></p>
    <?php }else{;?>
        <p><?= $error;?></p>
    <?php };?>
</body>
</html>