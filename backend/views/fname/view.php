<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории фильтров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fname-view">

    <h1><b>ФИЛЬТР: </b><?= Html::encode($this->title) ?> <?= Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id' => $model->id], ['title' => 'Редактировать имя фильтра']) ?></h1>
    <p>
        <a href="/admin/flt/create" class="btn btn-primary">Добавить пункт</a>
    </p>
    <?php foreach ($model->flts as $f): ?>
        <p><a href="/admin/flt/view?id=<?= $f->id ?>"><span class="glyphicon glyphicon-filter"></span><?= $f->name ?></a></p>
    <?php endforeach; ?>

</div>
