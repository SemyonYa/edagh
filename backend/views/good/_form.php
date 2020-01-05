<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="ad-good-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'farmer_id')->hiddenInput() ?>

    <?= $form->field($model, 'category_id')->dropdownList(
        \common\models\Category::find()->orderBy('ordering')->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Выберите категорию...']
    ); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'measure_id')->dropdownList(
        \common\models\Measure::find()->orderBy('ordering')->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Выберите единицу измерения...']
    ); ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->hiddenInput() ?>
    <img src="<?= $model->getThumb() ?>" class="img-preview" id="WannaFreshImgPreview" data-toggle="modal" data-target="#WannaFreshModal" onclick="LoadImageManager('good-img')" alt="Нужно выбрать другое изображение...">

    <?= $form->field($model, 'is_visible')->checkbox() ?>

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