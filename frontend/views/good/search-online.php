<div class="eda-search-online-result">
    <?php if (count($goods) > 0): ?>
        <?php foreach ($goods as $good): ?>
            <?php if (in_array($good->id, $cart_ids)): ?>
                <div class="eda-search-online-item eda-search-online-item-incart"
                     title="Уже в корзине!">
                    <?= $good->name ?> (<?= $good->farmer->name ?>) <b>&#10004;</b>
                </div>
            <?php else: ?>
                <div class="eda-search-online-item"
                     onclick="GoodToCartSearch(<?= $good->id ?>, <?= $good->farmer_id ?>)"
                     title="Добавить товар в корзину"><?= $good->name ?> (<?= $good->farmer->name ?>)
                    <div class="eda-search-online-item-ico"></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <b class="eda-search-no-results">Нет результатов!</b>
    <?php endif; ?>
</div>
