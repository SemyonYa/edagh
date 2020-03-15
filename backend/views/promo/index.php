<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Акции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div id="PromoList"></div>
</div>
<script>
    LoadList('Promo');
</script>