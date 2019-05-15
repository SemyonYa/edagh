<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'measure_id') ?>

    <?= $form->field($model, 'category_id') ?>

<!--    --><?//= $form->field($model, 'quantity') ?>
<!---->
<!--    --><?//= $form->field($model, 'price') ?>
<!---->
<!--    --><?//= $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
