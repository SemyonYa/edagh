<?php foreach ($goods as $good) : ?>
    <div data-toggle="modal" data-target="#GoodModal" class="eda-company-goods-item" data-category-id="<?= $good->category_id ?>" style="background-image: url('/backend/web/images/<?= $good->getThumb() ?>');" onclick="LoadGoodModal(<?= $good->id ?>)">
        <p class="eda-company-goods-item-name">
            <?= $good->name ?>
            <span class="eda-company-goods-item-price"><?= $good->price ?> руб.</span>
        </p>
    </div>
<?php endforeach; ?>

<!-- Modal -->
<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>