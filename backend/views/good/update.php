<?php

use yii\helpers\Html;

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мои товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ad-good-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <input id="GoodId" value="<?= $model->id ?>" type="hidden" />
    <?= $this->render('_form', compact('model')) ?>
</div>
<!-- <style>
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
</style> -->