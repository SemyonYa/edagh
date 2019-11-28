<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!--<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Anonymous+Pro" rel="stylesheet">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Kurale" rel="stylesheet"> -->
    <link rel="shortcut icon" href="/frontend/web/img/logo-ico.png" type="image/png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <img class="eda-logo" src="/frontend/web/img/logo.svg" onclick="GoHome()"/>
    <div class="eda-header-cart" id="CartBlock" onclick="GoTo('/cart')">
        <span class="eda-header-cart-caption" id="CartCounter">0</span>
    </div>
</header>

<div class="eda-wrap">
    <?= $content ?>
</div>

<footer>
    <div class="left-block">
        <div class="alert alert-success">
            Обращаем ваше внимание на то, что данный интернет-сайт носит исключительно информационный
            характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 (п.2)
            Гражданского кодекса РФ.
        </div>
        <div class="alert alert-success">
            Цены, указанные на сайте, не являются публичной офертой.
        </div>
    </div>
    <div class="right-block">
<!--        <p>О компании</p>-->
        <h3>&copy; Wanna Fresh <?= date('Y') ?></h3>
        <h4>Доставка натуральных продуктов из фермерских хозяйств на стол потребителя</h4>
        <hr>
        <p>Полезная информация</p>
        <h4><a href="#">Фермерам</a></h4>
        <h4><a href="#">Условия доставки и оплаты</a></h4>
        <h4><a href="#">Контакты</a></h4>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
