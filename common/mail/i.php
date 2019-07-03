<?php
/* @var $order \common\models\Order */
?>
<h1>Заказ №<?= $order->id . '-' . date('Y') ?></h1>
<h4>Для компании <?= $order->farmer->name ?></h4>
<br>
<div class="mail-order-client">
    <h2>Информация о заказчике:</h2>
    <p><?= $order->name ?></p>
    <p><?= $order->email ?></p>
    <p><?= $order->phone ?></p>
</div>
<h2>Состав заказа:</h2>
<table class="mail-order-table">
    <thead>
    <tr>
        <td>№</td>
        <td>Наименование</td>
        <td>Количество</td>
        <td>Цена</td>
        <td>Стоимость</td>
    </tr>
    </thead>
    <tbody>
    <?php $n = 1; ?>
    <?php foreach ($order->orderGoods as $order_good): ?>
        <tr>
            <td
            <?= $n++ ?></td>
            <td><?= $order_good->good->name ?></td>
            <td><?= $order_good->quantity ?></td>
            <td><?= $order_good->good->price ?> руб.</td>
            <td><?= $order_good->good->price * $order_good->quantity ?> руб.</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="5"><?= $order->getSum() ?> руб.</td>
    </tr>
    </tfoot>
</table>
<style>
    .mail-order-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 5px;
    }

    .mail-order-table td {
        border: dotted 1px #e4e4e4;
        border-radius: 5px;
        padding: 5px;
        text-align: center;
    }

    .mail-order-table thead td, .mail-order-table tfoot td {
        background-color: #e4e4e4;
        color: #4f7b30;
        border-color: #4f7b30;
        font-weight: 600;
    }
    .mail-order-table tfoot td {
        text-align: right;
    }
</style>