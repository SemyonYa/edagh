<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Записи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div id="PostList"></div>
</div>

<script>
    LoadList('Post');
</script>