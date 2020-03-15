<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MeasureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Единицы измерения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить единицу измерений', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div id="MeasureList"></div>
</div>
<script>
    LoadList('Measure');
</script>