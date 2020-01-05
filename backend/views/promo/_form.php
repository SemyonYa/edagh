<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="promo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'img')->hiddenInput() ?>
    <img src="<?= $model->getThumb() ?>" class="img-preview" id="WannaFreshImgPreview" data-toggle="modal" data-target="#WannaFreshModal" onclick="LoadImageManager('promo-img')" alt="Нужно выбрать другое изображение...">

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <?= $form->field($model, 'farmer_id')->hiddenInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<style>
    .field-promo-farmer_id {
        display: none;
    }
</style>