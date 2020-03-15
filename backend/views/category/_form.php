<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ordering')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'img')->textInput(['readonly' => true]) ?>

    <div class="ad-category-form-imgs">
        <?php foreach ($icon_names as $icon_name): ?>
        <div class="ad-category-form-img <?= ($model->img === $icon_name) ? 'ad-category-form-img-active' : '' ?>"
             style="background-image: url('/frontend/web/img/category_icons/<?= $icon_name ?>')" data-name="<?= $icon_name ?>"></div>
        <?php endforeach; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
