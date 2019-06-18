<?php

use yii\helpers\Html;

/* @var $this yii\web\View */


$this->title = 'Мои заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eda-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="eda-order-status">
        <div class="eda-order-status-item" data-status="0" id="NewOrdersBtn">Поступившие заказы</div>
        <div class="eda-order-status-item" data-status="1" id="WorkOrdersBtn">Заказы в работе</div>
        <div class="eda-order-status-item" data-status="2" id="CompletedOrdersBtn">Выполненные заказы</div>
    </div>
    <div class="eda-orders" id="EdaOrders">
<!--        ajax-->
    </div>
</div>
<script>
    LoadOrders(0);
</script>