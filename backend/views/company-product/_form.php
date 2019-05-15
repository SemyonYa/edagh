<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Measure;
use common\models\Category;
use common\models\Product;

?>

<div class="company-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <input type="hidden" name="company_id" value="<?= $model->company_id ?>">

    <?= $form->field($model, 'product_id')->dropdownList(
        Product::find()->select(['name', 'id'])->orderBy('name ASC')->indexBy('id')->column(),
        ['prompt'=>'Выберите продукт...']
    ); ?>

<!--    --><?//= $form->field($model, 'company_id')->hiddenInput() ?>

    <?= $form->field($model, 'measure_id')->dropdownList(
        Measure::find()->select(['name', 'id'])->orderBy('name ASC')->indexBy('id')->column(),
        ['prompt'=>'Выберите единицу измерения...']
    ); ?>

    <?= $form->field($model, 'category_id')->dropdownList(
        Category::find()->select(['name', 'id'])->orderBy('name ASC')->indexBy('id')->column(),
        ['prompt'=>'Выберите категорию...']
    ); ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number', 'step' => 0.01]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
