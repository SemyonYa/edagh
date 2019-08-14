<div class="eda-search-online-result">
    <?php if (count($goods) > 0): ?>
        <?php foreach ($goods as $good): ?>
            <div data-toggle="modal" data-target="#GoodModal"
                 class="eda-search-online-item eda-search-online-item-incart"
                 onclick="LoadGoodModalSearch(<?= $good->id ?>)">
                <?= $good->name ?> (<?= $good->farmer->name ?>)
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <b class="eda-search-no-results">Нет результатов!</b>
    <?php endif; ?>
</div>
