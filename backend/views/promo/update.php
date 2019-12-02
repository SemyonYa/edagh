<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Promo */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Акции', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="promo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
