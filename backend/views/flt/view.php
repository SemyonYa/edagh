<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пункты фильтра', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="flt-view">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></h1>

    <?php for ($i = 1; $i < 10; $i++): ?>
        <p class="ad-flt-product"><input type="checkbox" name="filterID" id="pro<?= $i ?>" /><label for="pro<?= $i ?>"> Продукт <?= $i ?></label> </p>
    <?php endfor; ?>

</div>
