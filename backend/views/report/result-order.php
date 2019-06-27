<?php

use common\models\Order;

/* @var $orders Order[] */
?>
<div class="ad-report-result-inner">
    <?php if (count($orders) > 0): ?>
        <?php $current_date = null; ?>
        <table class="table table-hover">
            <tr>
                <th colspan="4" class="ad-report-title">Отчёт по заказам</th>
            </tr>
            <tr>
                <th>№ заказа</th>
                <th>Данные заказчика</th>
                <th>Состав</th>
                <th>Сумма</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <?php if ($current_date != $order->date): ?>
                    <?php $current_date = $order->date ?>
                    <tr>
                        <th colspan="4">
                            <?= $current_date ?>
                        </th>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><?= $order->id ?></td>
                    <td>
                        <?= $order->name ?> <br>
                        <?= $order->phone ?> <br>
                        <?= $order->email ?>
                    </td>
                    <td></td>
                    <td><b><?= $order->getSum() ?></b></td>
                </tr>
                <?php if (count($order->orderGoods) > 0): ?>
                    <?php foreach($order->orderGoods as $order_good): ?>
                        <tr>
                            <td colspan="2"></td>
                            <td><?= $order_good->good->name ?> (<b><?= $order_good->quantity ?></b>)</td>
                            <td><?= $order_good->quantity * $order_good->price ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>