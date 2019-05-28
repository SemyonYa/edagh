<?php
$this->title = 'Корзина - WannaFresh';
?>
<div class="eda-cart-wrap">
    <div class="eda-cart">
        <h1>Корзина</h1>
        <?php $hs = ['Соймик', 'Фермерский двор'] ?>

        <?php if (count($hs) > 1): ?>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><strong>Внимание!</strong></p>
                <p>Вы добавили в корзину товары с нескольких фермерских хозяйств. Просим обратить внимание, что будет
                    сформировано <?= count($hs) ?> заказа(ов), у каждого из которых свои срок и место доставки.</p>
            </div>
        <?php endif; ?>
        <?php foreach ($hs as $h): ?>
            <h3><?= $h ?></h3>
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
                $goods = ['Свинная рулька', 'Стейк форели', 'Филе куры', 'Яйцо', 'Фасоль стручковая', 'Индейка тушка'];
                $s = 0;
                ?>
                <?php for ($i = 1; $i < 6; $i++): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $goods[$i] ?></td>
                        <td><?= (124 * $i) ?> </td>
                        <td>
                            <input class="form-control" type="number" value="<?= ($i * $i + $i) ?>" step="1"/>
                        </td>
                        <td><?= (124 * $i * ($i * $i + $i)) ?></td>
                        <td><span class="glyphicon glyphicon-remove eda-cart-remove" title="Удалить товар из корзины"
                                  onclick="RemoveGoodFromCart(<?= $i ?>)"></span></td>
                        <?php $s += 124 * $i * ($i * $i + $i) ?>
                    </tr>
                <?php endfor; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4">ИТОГО</td>
                    <td colspan="2"><?= $s ?></td>
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
        <?php if (count($hs) > 1): ?>
            <h2>Общая сумма заказа составляет <span><?= ($s * 2) ?> &#8381;</span></h2>
        <?php endif; ?>
        <p class="eda-btn-submit"><button id="OrderSubmit" type="button" class="btn btn-submit-order" data-toggle="modal" data-target="#OrderModal">Подтвердить заказ</button></p>
    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="OrderModalLabel" aria-hidden="true">
    -----
</div>