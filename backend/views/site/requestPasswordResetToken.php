<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запрос на восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Введите адрес электронной почты, на который зарегистрирована компания, чтобы направить ссылку для восстановления
        пароля.</p>

    <div class="ad-login-form">
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить запрос', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
