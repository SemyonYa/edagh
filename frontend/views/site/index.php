<?php
$this->title = 'ХОЧУ СВЕЖЕГО: Доставка продуктов с фермерских хозяйств';
?>
<div class="eda-main">
    <div class="eda-head-img">
        <div class="eda-head-img-caption">
            <h3>Доставка натуральных продуктов с фермерских хозяйств</h3>
            <p class="lead">ПРЯМИКОМ НА КУХОННЫЙ СТОЛ</p>
            <p><a class="btn btn-success" href="/good/catalog">Перейти в каталог</a></p>
        </div>
    </div>

    <div class="jumbotron">
        <!--        <h3>Доставка натуральных продуктов с фермерских хозяйств</h3>-->
        <!--        <p class="lead">ПРЯМИКОМ НА КУХОННЫЙ СТОЛ</p>-->
        <!--        <p><a class="btn btn-success" href="/good/catalog">Перейти в каталог</a></p>-->
        <input class="eda-main-search-input"
               placeholder="Начните вводить продукт, категорию или фермерское хозяйство..."/>
        <button class="btn btn-success eda-main-search-btn">НАЙТИ</button>
    </div>
    <div class="eda-main-ribbon">
        <?php foreach ($categories as $category): ?>
            <div class="eda-main-ribbon-item">
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
            <div class="eda-main-farmers-item" style="background-image: url('/frontend/web/img/logo_soymik.png')"
                 onclick="GoTo('/good/company?id=<?= 1 ?>')"></div>
            <div class="eda-main-farmers-item" style="background-image: url('/frontend/web/img/logo_cesar.jpg')"></div>
            <div class="eda-main-farmers-item"
                 style="background-image: url('/frontend/web/img/logo_dlyasvoih.png')"></div>
            <div class="eda-main-farmers-item" style="background-image: url('/frontend/web/img/logo_cesar.jpg')"></div>
            <div class="eda-main-farmers-item"
                 style="background-image: url('/frontend/web/img/logo_dlyasvoih.png')"></div>
            <div class="eda-main-farmers-item" style="background-image: url('/frontend/web/img/logo_soymik.png')"></div>
        </div>
        <h4><a href="/good/company-list">Смотреть все...</a></h4>
    </div>
</div>

