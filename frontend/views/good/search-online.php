<div class="eda-search-online-result">
    <?php if (count($goods) > 0): ?>
        <?php foreach ($goods as $good): ?>
            <div class="eda-search-online-item" onclick="GoodToCart(<?= $good->id ?>, <?= $good->farmer_id ?>)"><?= $good->name ?> <b>(<?= $good->farmer->name ?>)</b></div>
        <?php endforeach; ?>
    <?php else: ?>
        <b class="eda-search-no-results">Нет результатов!</b>
    <?php endif; ?>
</div>
