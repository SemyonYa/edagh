<?php

/* @var $this \yii\web\View */

/* @var $content string */


use yii\helpers\Html;
use backend\assets\AppAsset;
use yii\widgets\Breadcrumbs;

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
            <img onclick="adminHome()" class="ad-logo" src="/frontend/web/img/logo.svg" />
            <div>
                <?php if (!Yii::$app->user->isGuest): ?>
<!--                    <span class="btn btn-header"><a href="/site/signup">Рег</a></span>-->
<!--                    <span class="btn btn-header"><a href="/site/login">Вход</a></span>-->
<!--                --><?php //else: ?>
<!--                    --><?php //echo Html::beginForm(['/site/logout'], 'post', ['id' => 'logoutform']) ?>
<!--                    --><?php //echo Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout ']); ?>
<!--                    --><?php //Html::endForm(); ?>
                <?php endif; ?>
            </div>
        </header>

        <div class="ad-wrap">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <? //= Alert::widget() ?>
            <?= $content ?>
        </div>

        <footer>
                &copy; Wanna Fresh: Администрирование <?= date('Y') ?>
        </footer>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
