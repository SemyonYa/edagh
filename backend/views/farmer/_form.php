<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="ad-farmer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'delivery')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'min_cost')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'img')->hiddenInput() ?>
    <img src="<?= $model->getThumb() ?>" class="img-preview" id="WannaFreshImgPreview" data-toggle="modal" data-target="#WannaFreshModal" onclick="LoadImageManager('farmer-img', '<?= $model->id ?>')" alt="Нужно выбрать другое изображение...">

    <?= $form->field($model, 'is_blocked')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>