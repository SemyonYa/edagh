<?php
$this->title = 'Заказы зарегистрированы';

use common\models\Order;

/* @var $orders Order[] */
?>
<div class="eda-order-success-wrap">
    <div class="alert alert-success">УСПЕШНО</div>
    <?php foreach ($orders as $order): ?>
        <div class="eda-order-success">
            <h2>Заказ №<?= $order->id ?></h2>
            <h4><?= $order->farmer->name ?></h4>
            <table class="table">
                <thead>
                <tr>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>№</td>
                    <td>Наименование товара</td>
                    <td>Цена, руб.</td>
                    <td>Кол-во</td>
                    <td>Сумма, &#8381;</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php $n = 1; ?>
                <?php foreach ($order->orderGoods as $order_good): ?>
                    <tr>
                        <td><?= $n++ ?></td>
                        <td><?= $order_good->good->name ?></td>
                        <td><?= $order_good->price ?> руб.</td>
                        <td><?= $order_good->quantity ?></td>
                        <td><?= $order_good->quantity * $order_good->price ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td><b><?= $order->getSum() ?></b></td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php endforeach; ?>
</div>