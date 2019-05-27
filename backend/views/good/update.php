<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Good */

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мои товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ad-good-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>
    <div class="ad-good-update-imgs">
        <?php $form2 = ActiveForm::begin(); ?>

        <?= $form2->field($image, 'id')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
            'aspectRatio' => (16/9), //set the aspect ratio
            'cropViewMode' => 1, //crop mode, option info: https://github.com/fengyuanchen/cropper/#viewmode
            'showPreview' => false, //false to hide the preview
            'showDeletePickedImageConfirm' => false, //on true show warning before detach image
        ]); ?>

        <?php ActiveForm::end(); ?>
        <div class="ad-good-update-imglist" id="GoodImgs">
            <!--            ajax-->
        </div>
    </div>
</div>
<style>
    #image-id_name {
        display: none;
    }
    .delete-selected-image {
        display: none;
    }
    .input-group-addon:last-child {
        padding: 4px;
        border-radius: 4px;
        color: white;
        transition: .5s;
    }
</style>
<script>

</script>