<?php
/* @var $category \common\models\Category */

/* @var $this \yii\web\View */

$this->title = 'Категория ' . mb_strtoupper($category->name);
?>

<div class="eda-farmers-and-goods">
    <div class="eda-farmers-and-goods-title">
        <!--        <h1>--><? //= $category->name ?><!--</h1>-->
        <!--        <div class="eda-farmers-and-goods-poster-wrap">-->
        <div class="eda-farmers-and-goods-poster"
             style="background-image: url('/frontend/web/img/category_icons/<?= $category->img ?>')"></div>
        <!--        </div>-->
    </div>
    <ul class="nav nav-pills">
        <li><a href="#farmers" data-toggle="tab"><span>Фермерские хозяйства</span><span
                        class="glyphicon glyphicon-chevron-down"></span></a></li>
        <li class="active"><a href="#goods" data-toggle="tab"><span>Товары</span><span
                        class="glyphicon glyphicon-chevron-down"></span></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade eda-farmers-and-goods-f" id="farmers">
            <div class="eda-farmers-and-goods-f">
                <?php foreach ($farmers as $farmer): ?>
                    <div class="eda-main-farmers-item"
                         style="background-image: url('<?= $farmer->getThumb() ?>')"
                         onclick="GoTo('/good/company?id=<?= $farmer->id ?>')"></div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="tab-pane fade active in" id="goods">
            <div class="eda-farmers-and-goods-g">
                <?php foreach ($category_goods as $good): ?>
                    <div data-toggle="modal" data-target="#GoodModal" class="eda-company-goods-item"
                         data-category-id="<?= $good->category_id ?>"
                         style="background-image: url('<?= $good->getThumb() ?>');"
                         onclick="LoadGoodModal(<?= $good->id ?>)">
                        <p class="eda-company-goods-item-name">
                            <?= $good->name ?>
                            <span class="eda-company-goods-item-price"><?= $good->price ?> руб.</span>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>