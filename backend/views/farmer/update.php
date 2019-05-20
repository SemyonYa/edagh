<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Farmer */

$this->title = 'Рудактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Фермерские хозяйства', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ркдактирвоание';
?>
<div class="farmer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
