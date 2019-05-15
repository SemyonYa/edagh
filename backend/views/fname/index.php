<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Фильтры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fname-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a href="/admin/fname/create" class="btn btn-primary">Добавить</a>
    </p>
    <?php foreach ($fnames as $fn): ?>
        <p><a href="/admin/fname/view?id=<?= $fn->id ?>"><?= $fn->name ?></a></p>
    <?php endforeach; ?>


</div>
