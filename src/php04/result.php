<?php

    require_once('config/al_numbers.php');

    $answer_number = htmlspecialchars($_POST['answer_number'],ENT_QUOTES);
    $option = htmlspecialchars($_POST['option'],ENT_QUOTES);

    if (!$option) {
        header('Location: index.php');
    }

    foreach ($al_numbers as $al_number) {
        if ($al_number['number'] === $answer_number) {
            $number = $al_number['number'];
            $name = $al_number['name'];
        }
    }

    $result = $option === $number;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アルバムナンバーを覚えよう</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/result.css">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/php04">
                AL Number Match
            </a>
        </div>
    </header>

<main>
    <div class="result__content">
        <div class="result">
            <?php if ($result):?>
            <h2 class="result__text--a">正解</h2>
            <?php else:?>
            <h2 class="result__text--b">不正解</h2>
            <?php endif;?>
        </div>
        <div class="answer-table">
        <table class="answer-table__inner">
            <tr class="answer-table__row">
                <th class="answer-table__header">枚数目</th>
                <td class="answer-table__text">
                <?php echo $number ?>
                </td>
            </tr>
            <tr class="answer-table__row">
                <th class="answer-table__header">アルバム名</th>
                <td class="answer-table__text">
                <?php echo $name ?>
                </td>
            </tr>
        </table>
        </div>
    </div>
</main>
</body>
</html>