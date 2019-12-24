
<?php shuffle($goods); ?>
<?php foreach ($goods as $good): ?>
    <div data-toggle="modal" data-target="#GoodModal" class="eda-company-goods-item"
         data-category-id="<?= $good->category_id ?>"
         style="background-image: url('/backend/web/images/old_im.svg');"
         onclick="LoadGoodModal(<?= $good->id ?>)">
        <p class="eda-company-goods-item-name">
            <?= $good->name ?>741
            <span class="eda-company-goods-item-price"><?= $good->price ?> руб.</span>
        </p>
    </div>
<?php endforeach; ?>
<?php if (count($goods) === 0): ?>
    <div class="alert alert-warning">Нет товаров по данным критериям!</div>
<?php endif; ?>
