<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallows</title>
    <h1>Gallows</h1>
</head>

<body>
    <?php
    $text = "";
    $count = 0;
    $word = "cloth";
    $wordLength = strlen($word);
    $answers[0] = $word[0];
    for ($i = 1; $i < $wordLength - 1; $i++) {
        $answers[$i] = "*";
    }
    $answers[$wordLength - 1] = $word[$wordLength - 1];
    $answers1 = implode("", $answers);
    if (isset($_GET['guess'])) {
        $input = $_GET["inputAnswer"];
        $count = $_GET['count'] + 1;
        for ($i=0; $i < $count; $i++) { 
            $text .= " | ";
        }
        $answers1 = $_GET["answers1"];
        for ($i = 1; $i < $wordLength - 1; $i++) {
            if ($word[$i] === $input) {
                $answers1[$i] = $input;
            }
        }
        if ($count >= 6) {
            echo "You lost.";
        }
        echo $text . " " . $answers1;
    }
    if (isset($_GET['clear'])) {
        $count = "|";
        $word = "cloth";
        header("Location:" . $_SERVER['PHP_SELF']);
        ob_end_flush();
        exit;
    }
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" name="myform" method="GET">
        <input type="text" name="inputAnswer" size="10">
        <input type="submit" name="guess" value="Guess a letter">
        <input type="hidden" name="count" value="<?= $count ?>">
        <input type="hidden" name="answers1" value="<?= $answers1 ?>">
        <input type="submit" name="clear" value="Заново">
    </form>
</body>

</html>