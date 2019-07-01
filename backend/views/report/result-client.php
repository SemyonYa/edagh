<?php

use common\models\Order;

/* @var $orders Order[] */
?>
<div class="ad-report-result-inner">
    <table class="table table-hover">
        <tr>
            <td colspan="4" class="ad-report-title">Отчёт по заказам</td>
        </tr>
        <tr>
            <th>ID заказа</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>E-mail</th>
        </tr>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $client->id ?></td>
                <td><?= $client->name ?></td>
                <td><?= $client->phone ?></td>
                <td><?= $client->email ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>