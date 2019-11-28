<table class="eda-order-table">
    <thead>
    <tr>
        <td>№</td>
        <td>Дата поступления</td>
        <td>Имя заказчика</td>
        <td>Телефон</td>
        <td>Email</td>
    </tr>
    </thead>
    <tbody>
    <?php $n = 1; foreach ($orders as $order): ?>
    <tr data-toggle="modal" data-target="#OrderInfoModal" onclick="LoadOrderInfo(<?= $order->id ?>)">
        <td><?= $n++ ?></td>
        <td><?= $order->date ?></td>
        <td><?= $order->name ?></td>
        <td><?= $order->phone ?></td>
        <td><?= $order->email ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="OrderInfoModal" tabindex="-1" role="dialog" aria-labelledby="OrderInfoModalLabel">
    ajax
</div>
