<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Measure */

$this->title = 'Новая единица измерения';
$this->params['breadcrumbs'][] = ['label' => 'Единицы измерения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', compact('model')) ?>

</div>
