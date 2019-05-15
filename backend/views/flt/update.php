<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Flt */

$this->title = 'Изменение пункта: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пункты фильтра', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
