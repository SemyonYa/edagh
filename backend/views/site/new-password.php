<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Изменение пароля';
?>
<div class="ad-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <div class="ad-login-form">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'old_password')->passwordInput() ?>

        <?= $form->field($model, 'new_password')->passwordInput() ?>

        <?= $form->field($model, 'repeat_password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>