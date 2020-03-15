<?php
$this->title = 'Wanna Fresh: Доставка продуктов с фермерских хозяйств';
/* @var $farmers \common\models\Farmer[] */
/* @var $categories \common\models\Category */
?>
<div class="eda-main">
    <div class="eda-head-img">
        <div class="eda-head-img-caption">
            <h3>Доставка продуктов с фермерских хозяйств</h3>
            <p class="lead">ВКУСНО и ПОЛЕЗНО</p>
        </div>
    </div>
    <div class="jumbotron">
        <div class="eda-search-online-result-wrap">
            <input class="eda-main-search-input" id="SearchInput" placeholder="ВВЕДИТЕ ПРОДУКТ..." />
            <button class="btn btn-success eda-main-search-btn">НАЙТИ</button>
            <div class="eda-search-online-result-list-wrap" id="SearchOnlineResult">
                <!-- ajax -->
            </div>
        </div>
    </div>

    <div class="eda-main-path">
        <div class="eda-main-path-first">Выберите фермерское хозяйство</div>
        <div class="eda-main-path-arrow"></div>
        <div class="eda-main-path-second">Добавьте продукты в корзину и подтвердите заказ</div>
        <div class="eda-main-path-arrow"></div>
        <div class="eda-main-path-third">Ожидайте звонка фермера для уточнения заказа</div>
    </div>
    <div class="eda-space-line">
        <hr />
    </div>
    <div class="eda-main-f">
        <h2>Ведущие фермерские хозяйства</h2>
        <div class="eda-main-farmers">
            <?php foreach ($farmers as $farmer) : ?>
                <div class="eda-main-farmers-item" style="background-image: url('<?= $farmer->getThumb() ?>')" onclick="GoTo('/good/company?id=<?= $farmer->id ?>')"></div>
            <?php endforeach; ?>
        </div>
        <h4><a href="/good/farmer-list">Смотреть все...</a></h4>
    </div>
    <div class="eda-space-line">
        <hr />
    </div>
    <h2 class="text-center">Категории продуктов</h2>
    <div class="eda-main-ribbon">
        <?php foreach ($categories as $category) : ?>
            <div class="eda-main-ribbon-item" onclick="GoTo('/good/category-companies-and-goods?category_id=<?= $category->id ?>')">
                <div class="eda-main-ribbon-item-img" style="background-image: url('/frontend/web/img/category_icons/<?= $category->img ?>')"></div>
                <span><?= mb_strtoupper($category->name) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>