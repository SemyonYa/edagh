<?php

use yii\helpers\Html;

$this->title = 'Новый пункт';
$this->params['breadcrumbs'][] = ['label' => 'Пункты фильтра', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
