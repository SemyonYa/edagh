<?php

use frontend\models\ImageOverride;

/* @var $goods \common\models\Good[] */
?>
<?php shuffle($goods); ?>
<?php foreach ($goods as $good): ?>
    <div data-toggle="modal" data-target="#GoodModal" class="eda-company-goods-item"
         data-category-id="<?= $good->category_id ?>"
         style="background-image: url('<?= ImageOverride::getPath($good->poster) ?>');"
         onclick="LoadGoodModal(<?= $good->id ?>)">
        <p><?= $good->name ?></p>
    </div>
<?php endforeach; ?>
<?php if (count($goods) === 0): ?>
    <div class="alert alert-warning">Нет товаров по данным критериям!</div>
<?php endif; ?>
