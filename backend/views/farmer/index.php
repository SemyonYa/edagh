<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FarmerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фермерские хозяйства';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farmer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить фермерское хозяйство', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <div id="FarmerList"></div>
</div>
<script>
    LoadList('Farmer');
</script>

<div class="eda-modal-wrap" id="EdaModalWrap">
    <div class="eda-modal-close"><span class="glyphicon glyphicon-remove btn-modal-close"></span></div>
    <div class="eda-modal" id="EdaModal">
        <h2>!!!!</h2>
    </div>
</div>