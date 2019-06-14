<?php if (count($order_ids) == 1): ?>
    <h2>Заказ №<?= $order_ids[0] ?> оформлен</h2>
<?php else: ?>
    <?php
    $orders = '';
    foreach ($order_ids as $order_id) {
        $orders .= $order_id . ', ';
    }
    $orders = substr($orders, 0, strlen($orders) - 3);
    ?>
    <h2> Оформлены заказы №№<?= $orders ?> </h2>
<?php endif; ?>
    <h4>СОСТАВ ЗАКАЗА</h4>
<?php foreach ($order_ids as $order_id): ?>
    <?php $order = \common\models\Order::findOne($order_id); ?>
    <table>
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
        </tbody>
    </table>
<?php endforeach; ?>