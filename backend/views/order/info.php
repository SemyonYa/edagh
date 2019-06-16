<?php

use common\models\Order;

/*  @var $order Order */
?>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content eda-order-info">
        <h3>ЗАКАЗ №<?= $order->id ?> (<?= $order->date ?>)</h3>
        <h5>Состав:</h5>
        <table class="eda-order-info-table">
            <?php $n = 1; ?>
            <?php foreach ($order->orderGoods as $order_good): ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><?= $order_good->good->name ?></td>
                    <td><?= $order_good->quantity ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="eda-order-info-status">
            <div class="eda-order-info-status-item eda-order-info-status-item-active" data-status="0" data-id="<?= $order->id ?>" onclick="SetOrderStatus(this)">Новый</div>
            <div class="eda-order-info-status-item" data-status="1" data-id="<?= $order->id ?>" onclick="SetOrderStatus(this)">В работе</div>
            <div class="eda-order-info-status-item" data-status="2" data-id="<?= $order->id ?>" onclick="SetOrderStatus(this)">Выполнен</div>
        </div>
    </div>
</div>