<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Good */

$this->title = 'Новый товар';
$this->params['breadcrumbs'][] = ['label' => 'Мои товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
