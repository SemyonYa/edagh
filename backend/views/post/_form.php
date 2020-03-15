<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'img')->hiddenInput() ?>
    <img src="<?= $model->getThumb() ?>" class="img-preview" id="WannaFreshImgPreview" data-toggle="modal" data-target="#WannaFreshModal" onclick="LoadImageManager('post-img')" alt="Нужно выбрать другое изображение...">

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <?= $form->field($model, 'farmer_id')->hiddenInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .field-post-farmer_id {
        display: none;
    }
</style>