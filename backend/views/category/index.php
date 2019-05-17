<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <div id="CategoryList"></div>
</div>
<script>
    LoadCategoryList();
</script>