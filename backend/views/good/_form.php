<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Good */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-good-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'farmer_id')->hiddenInput() ?>

    <?= $form->field($model, 'category_id')->dropdownList(
        \common\models\Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите категорию...']
    ); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'measure_id')->dropdownList(
        \common\models\Measure::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите единицу измерения...']
    ); ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    .field-good-farmer_id {
        display: none;
    }
</style>