<?php

use yii\helpers\Html;

$this->title = 'Профиль: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Профиль'];
?>
<div class="ad-farmer-update">
    <input type="hidden" id="FarmerId" value="<?= $model->id ?>" />
    <a href="/admin/site/new-password" class="btn btn-primary">Изменить пароль</a>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>

