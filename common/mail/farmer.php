<?php
/* @var $order \common\models\Order */
?>
<h1>Заказ №<?= $order->id . '-' . date('Y') ?> от <?= $order->date ?></h1>
<!--<h4>Исполнитель заказа: </h4>-->
<table style="width: 100%;border-collapse: separate;border-spacing: 5px;">
    <tr>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;font-weight: bold">Исполнитель заказа:</td>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order->farmer->name ?></td>
    </tr>
    <tr>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;">Дата доставки</td>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order->farmer->getNextDay() ?></td>
    </tr>
    <tr>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;">Адрес доставки</td>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order->address ?></td>
    </tr>
</table>

<table>
    <tr>
        <td>
            <a href="http://wanna-fresh.ru/admin/order" style="text-decoration: none">
                <div class="permit-order"
                     style="padding:4px;font-size:26px;border-radius:4px;background-color:#1f7b1e;color:#fefefe;text-decoration:none;">
                    Подтвердить заказ
                </div>
            </a>
        </td>
        <td>
            <a href="http://wanna-fresh.ru/admin/order" style="text-decoration: none">
                <div style="padding:4px;font-size:26px;border-radius:4px;background-color:darkred;color:#fefefe;margin-left:20px;text-decoration:none;">Отклонить заказ</div>
            </a>
        </td>
    </tr>
</table>

<h2>Информация о заказчике:</h2>
<table style="width: 100%;border-collapse: separate;border-spacing: 5px;">
    <tr>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order->name ?></td>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order->email ?></td>
        <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order->phone ?></td>
    </tr>
</table>
<h2>Состав заказа:</h2>
<table style="width: 100%;border-collapse: separate;border-spacing: 5px;">
    <thead>
    <tr>
        <td style="border: dotted 1px #4f7b30;border-radius: 5px;padding: 5px;text-align: center;background-color: #e4e4e4;color: #4f7b30;font-weight: 600;">№</td>
        <td style="border: dotted 1px #4f7b30;border-radius: 5px;padding: 5px;text-align: center;background-color: #e4e4e4;color: #4f7b30;font-weight: 600;">Наименование</td>
        <td style="border: dotted 1px #4f7b30;border-radius: 5px;padding: 5px;text-align: center;background-color: #e4e4e4;color: #4f7b30;font-weight: 600;">Количество</td>
        <td style="border: dotted 1px #4f7b30;border-radius: 5px;padding: 5px;text-align: center;background-color: #e4e4e4;color: #4f7b30;font-weight: 600;">Цена</td>
        <td style="border: dotted 1px #4f7b30;border-radius: 5px;padding: 5px;text-align: center;background-color: #e4e4e4;color: #4f7b30;font-weight: 600;">Стоимость</td>
    </tr>
    </thead>
    <tbody>
    <?php $n = 1; ?>
    <?php foreach ($order->orderGoods as $order_good): ?>
        <tr>
            <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $n++ ?></td>
            <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order_good->good->name ?></td>
            <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order_good->quantity ?></td>
            <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order_good->good->price ?> руб.</td>
            <td style="border: dotted 1px #e4e4e4;border-radius: 5px;padding: 5px;text-align: center;"><?= $order_good->good->price * $order_good->quantity ?> руб.</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="5" style="border: dotted 1px #4f7b30;border-radius: 5px;padding: 5px;text-align: right;background-color: #e4e4e4;color: #4f7b30;font-weight: 600;"><?= $order->getSum() ?> руб.</td>
    </tr>
    </tfoot>
</table>
<style>
    /*.mail-order-table {*/
    /*    width: 100%;*/
    /*    border-collapse: separate;*/
    /*    border-spacing: 5px;*/
    /*}*/

    /*.mail-order-table td {*/
    /*    border: dotted 1px #e4e4e4;*/
    /*    border-radius: 5px;*/
    /*    padding: 5px;*/
    /*    text-align: center;*/
    /*}*/

    /*.mail-order-table thead td, .mail-order-table tfoot td {*/
    /*    background-color: #e4e4e4;color: #4f7b30;border-color: #4f7b30;font-weight: 600;*/
    /*}*/

    /*.mail-order-table tfoot td {*/
    /*    text-align: right;*/
    /*}*/
    /*.permit-order {*/
    /*    padding: 15px;*/
    /*    font-size: 26px;*/
    /*    border-radius: 4px;*/
    /*    background-color: #1f7b1e;*/
    /*    color: #fefefe;*/
    /*}*/
    /*.deny-order {*/
    /*    padding: 15px;font-size: 26px;border-radius: 4px;background-color: darkred;color: #fefefe;*/
    /*}*/
</style>