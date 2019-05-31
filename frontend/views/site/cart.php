<?php
$this->title = 'Корзина - WannaFresh';
/* @var $farmer_items \frontend\models\CartFarmerItem[] */
/* @var $cart_good_item \frontend\models\CartGoodItem */
?>
<div class="eda-cart-wrap">
    <div class="eda-cart">
        <h1><span>Корзина</span><span class="btn btn-danger eda-cart-clear"
                                      ondblclick="ClearCart()">очистить корзину</span></h1>
        <?php if (count($farmer_items) > 1): ?>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><strong>Внимание!</strong></p>
                <p>Вы добавили в корзину товары с нескольких фермерских хозяйств. Просим обратить внимание, что будет
                    сформировано <?= count($hs) ?> заказа(ов), у каждого из которых свои срок и место доставки.</p>
                <!--                <pre>-->
                <!--                    --><?php
                //                    $session = Yii::$app->session;
                //                    print_r($session->get('cart'));
                //                    ?>
                <!--                </pre>-->
            </div>
        <?php endif; ?>
        <?php if (count($farmer_items) > 0): ?>
            <?php $sum = 0; ?>
            <?php foreach ($farmer_items as $farmer_item): ?>
                <h3><?= $farmer_item->farmer->name ?></h3>
                <table class="table table-hover eda-cart-table">
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
                    <?php
                    $i = 1;
                    ?>
                    <?php foreach ($farmer_item->cart_good_items as $cart_good_item): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $cart_good_item->good->name ?></td>
                            <td><?= $cart_good_item->good->price ?> </td>
                            <td>
                                <input class="form-control" type="number" value="<?= $cart_good_item->quantity ?>"
                                       step="1"/>
                            </td>
                            <td><?= $cart_good_item->getSum() ?></td>
                            <td><span class="glyphicon glyphicon-remove eda-cart-remove"
                                      title="Удалить товар из корзины"
                                      onclick="RemoveGoodFromCart(<?= $i ?>)"></span></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4">ИТОГО</td>
                        <td colspan="2"><?= $farmer_item->getSum() ?></td>
                        <?php $sum += $farmer_item->getSum(); ?>
                    </tr>
                    <tr>
                        <td colspan="5">
                            Срок доставки: 05.05.2019
                            Пункт доставки: Кутузовский проспект, д. 152, корп. 3, лит. Г
                        </td>
                    </tr>
                    </tfoot>
                </table>
            <?php endforeach; ?>
            <?php if (count($farmer_items) > 1): ?>
                <h2>Общая сумма заказа составляет <span><?= $sum ?> &#8381;</span></h2>
            <?php endif; ?>
            <p class="eda-btn-submit">
                <button id="OrderSubmit" type="button" class="btn btn-submit-order" data-toggle="modal"
                        data-target="#OrderModal">Подтвердить заказ
                </button>
            </p>
        <?php else: ?>
        <div class="alert alert-warning">
            Корзина пуста!
        </div>
        <?php endif; ?>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="OrderModalLabel"
     aria-hidden="true">
    -----
</div>