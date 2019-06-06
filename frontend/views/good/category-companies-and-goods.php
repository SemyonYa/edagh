<?php
use frontend\models\ImageOverride;
/* @var $category \common\models\Category */
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
        <li class="active"><a href="#farmers" data-toggle="tab"><span>Фермерские хозяйства</span><span
                        class="glyphicon glyphicon-chevron-down"></span></a></li>
        <li><a href="#goods" data-toggle="tab"><span>Товары</span><span
                        class="glyphicon glyphicon-chevron-down"></span></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade active in eda-farmers-and-goods-f" id="farmers">
                <div class="eda-farmers-and-goods-f">
                    <?php foreach ($farmers as $farmer): ?>
                        <div class="eda-main-farmers-item" style="background-image: url('<?= ImageOverride::getPath($farmer->poster) ?>')"
                             onclick="GoTo('/good/company?id=<?= $farmer->id ?>')"></div>
                    <?php endforeach;  ?>
                </div>
        </div>
        <div class="tab-pane fade" id="goods">
            <div class="eda-farmers-and-goods-g">
                <?php foreach ($category->goods as $good): ?>
                    <div data-toggle="modal" data-target="#GoodModal" class="eda-company-goods-item"
                         data-category-id="<?= $good->category_id ?>"
                         style="background-image: url('<?= ImageOverride::getPath($good->poster) ?>');"
                         onclick="LoadGoodModal(<?= $good->id ?>)">
                        <p><?= $good->name ?></p>
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