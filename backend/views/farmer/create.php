<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Farmer */

$this->title = 'Новое фермерские хозяйства';
$this->params['breadcrumbs'][] = ['label' => 'Фермерские хозяйства', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farmer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
