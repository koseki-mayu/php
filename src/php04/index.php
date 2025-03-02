<?php

    require_once('config/al_numbers.php');

    $random_als = array_rand($al_numbers,4);

    foreach ($random_als as $index) {
        $options[] = $al_numbers[$index];
    }
    $question =$options[mt_rand(0,3)];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アルバムナンバーを覚えよう</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
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
        <div class="match__content">
            <div class="a">
                <p class="a__text">ジャケット写真から、何枚目のアルバムなのか答えましょう！</p>
                <img  class="a__text-img" src="img/<?php echo $question['img']?>" alt="アルバム">
            </div>
            <form class="match-form" action="result.php" method="post">
                <input type="hidden" name="answer_number" value="<?php echo $question['number']?>">
                <div class="match-form__item">
                    <?php foreach ($options as $option):?>
                    <div class="match-form__group"> 
                        <input class="match-form__radio" id="<?php echo $option['number']?>" type="radio" name="option" value="<?php echo $option['number']?>">
                        <label class="match-form__label" for="<?php echo $option['number']?>"><?php echo $option['number']?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="match-form__button">
                    <button class="match-form__button-submit" type="submit">回答</button>
                </div>
            </form>
        </div>

    </main>
</body>
</html>