<?php

use yii\helpers\Html;

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Фермерские хозяйства', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ad-farmer-update">
    <input type="hidden" id="FarmerId" value="<?= $model->id ?>" />
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

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
    LoadFarmerImgList(<?= $model->id ?>);
</script>