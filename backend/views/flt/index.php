<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Пункты фильтра';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'fname_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
