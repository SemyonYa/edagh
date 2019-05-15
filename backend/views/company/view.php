<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Компании', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('<span class="glyphicon glyphicon-edit"></span>', ['update', 'id' => $model->id], ['title' => 'Редактирование профиля компании']) ?></h1>

    <h3>Список продуктов </h3>

    <div class="ad-company-product-list">
        <!-- ajax loader-->
    </div>

</div>
<script>
    $(document).ready(function () {
        $('.ad-company-product-list').load('/admin/company-product/index?company_id=<?= $model->id ?>');
    });
</script>