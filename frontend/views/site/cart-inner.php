<?php
/* @var $farmer_items \frontend\models\CartFarmerItem[] */
/* @var $cart_good_item \frontend\models\CartGoodItem */
?>

<?php if (count($farmer_items) > 1) : ?>
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><strong>Внимание!</strong></p>
        <p>Вы добавили в корзину товары с нескольких фермерских хозяйств. Просим обратить внимание, что
            будет
            сформировано <?= count($farmer_items) ?> заказа(ов), у каждого из которых свои срок и место доставки.</p>
    </div>
<?php endif; ?>
<?php if (count($farmer_items) > 0) : ?>
    <?php $sum = 0; ?>
    <?php $is_valid_sum = true; ?>
    <?php foreach ($farmer_items as $farmer_item) : ?>
        <h3><?= $farmer_item->farmer->name ?></h3>
        <?php if (!$farmer_item->isValidSum()) : ?>
            <div class="alert alert-danger">
                Минимальная сумма заказа - <?= $farmer_item->farmer->min_cost ?> руб.
            </div>
        <?php endif; ?>
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
                <?php foreach ($farmer_item->cart_good_items as $cart_good_item) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td data-toggle="modal" data-target="#GoodModal" class="eda-cart-table-goodname" onclick="LoadGoodModalSearch(<?= $cart_good_item->good->id ?>)"><?= $cart_good_item->good->name ?></td>
                        <td><?= $cart_good_item->good->price ?> </td>
                        <td>
                            <input min="1" class="form-control" type="number" value="<?= $cart_good_item->quantity ?>" oninput="EditCartQuantity(this)" data-farmerid="<?= $farmer_item->farmer->id ?>" data-goodid="<?= $cart_good_item->good->id ?>" />
                        </td>
                        <td><?= $cart_good_item->getSum() ?></td>
                        <td><span class="glyphicon glyphicon-remove eda-cart-remove" data-goodid="<?= $cart_good_item->good->id ?>" data-farmerid="<?= $farmer_item->farmer->id ?>" data-goodname="<?= $cart_good_item->good->name ?>" title="Удалить товар из корзины" onclick="RemoveGoodFromCart(this)"></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">ИТОГО</td>
                    <td colspan="2"><?= $farmer_item->getSum() ?></td>
                    <?php $sum += $farmer_item->getSum(); ?>
                    <?php $is_valid_sum = $is_valid_sum && $farmer_item->isValidSum(); ?>
                </tr>
            </tfoot>
        </table>
        <div class="eda-cart-delivery">
            <button type="button" class="btn btn-delivery" data-toggle="popover" title="" data-content="<?= ($farmer_item->farmer->delivery) ?: 'Нет информации' ?>">Условия доставки</button>
            <p>Дата доставки: <?= ($farmer_item->farmer->getNextDay()) ? $farmer_item->farmer->getNextDay() : '-' ?></p>
        </div>
        <!-- <p>Адрес доставки: Кутузовский проспект, д. 152, корп. 3, лит. Г</p> -->

    <?php endforeach; ?>
    <?php if (count($farmer_items) > 1) : ?>
        <h2>Общая сумма заказа составляет <span><?= $sum ?> &#8381;</span></h2>
    <?php endif; ?>
    <p class="eda-btn-submit">
        <button id="OrderSubmit" type="button" class="btn btn-submit-order" data-toggle="modal" data-target="#OrderModal" <?= ($is_valid_sum) ?: 'disabled' ?>>Подтвердить</button>
    </p>
<?php else : ?>
    <div class="alert alert-warning">
        Корзина пуста!
    </div>
<?php endif; ?>

<script>
    $(function() {
        console.log((window.innerWidth > window.innerHeight) ? 'right' : 'bottom');
        $('[data-toggle="popover"]').popover({
            trigger: 'hover',
            placement: (window.innerWidth > window.innerHeight) ? 'auto right' : 'auto top'
        })
    })
</script>