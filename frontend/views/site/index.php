<?php
$this->title = 'Wanna Fresh: Доставка продуктов с фермерских хозяйств';
/* @var $farmers \common\models\Farmer[] */
/* @var $categories \common\models\Category */
?>
<div class="eda-main">
    <div class="jumbotron">
        <div class="eda-search-online-result-wrap">
            <p>ДОСТАВКА ПРОДУКТОВ С ФЕРМЕРСКИХ ХОЗЯЙСТВ</p>
            <input class="eda-main-search-input" id="SearchInput"
                   placeholder="ВВЕДИТЕ ПРОДУКТ..."/>
            <button class="btn btn-success eda-main-search-btn">НАЙТИ</button>
            <div class="eda-search-online-result-list-wrap" id="SearchOnlineResult">
                <!--                ajax-->
            </div>
        </div>
    </div>
    <div class="eda-head-img">
        <div class="eda-head-img-caption">
<!--            <h3>Доставка продуктов с фермерских хозяйств</h3>-->
            <p class="lead">ВКУСНО и ПОЛЕЗНО</p>
            <p><a class="btn btn-success" href="/good/catalog">Перейти в каталог</a></p>
        </div>
    </div>

    <div class="eda-main-ribbon">
        <?php foreach ($categories as $category): ?>
            <div class="eda-main-ribbon-item"
                 onclick="GoTo('/good/category-companies-and-goods?category_id=<?= $category->id ?>')">
                <img src="/frontend/web/img/category_icons/<?= $category->img ?>"/>
                <span><?= mb_strtoupper($category->name) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="eda-space-line">
        <hr/>
    </div>
    <div class="eda-main-f">
        <h2>Ведущие бренды фермерских хозяйств</h2>
        <div class="eda-main-farmers">
            <?php foreach ($farmers as $farmer): ?>
                <div class="eda-main-farmers-item"
                     style="background-image: url('<?= \frontend\models\ImageOverride::getPath($farmer->poster) ?>')"
                     onclick="GoTo('/good/company?id=<?= $farmer->id ?>')"></div>
            <?php endforeach; ?>
        </div>
        <h4><a href="/good/farmer-list">Смотреть все...</a></h4>
    </div>
</div>

