<?php
$this->title = 'Wanna Fresh: ' . $farmer->name;

use frontend\models\ImageOverride;

?>
<div class="eda-company-wrap">
    <div class="eda-company">
        <div class="eda-company-description">
            <h1><?=$farmer->name?></h1>
            <p><?=$farmer->description?></p>
            <hr>
            <p>Минимальная стоимость заказа: <b><?=$farmer->min_cost?> руб.</b></p>
            <p>
                <button type="button" class="btn btn-delivery" data-toggle="popover" title="" data-content="<?= $farmer->delivery ?>">Информация о доставке</button>
            </p>
            <hr>
            <div class="eda-company-links">
                <div class="eda-company-about-link" onclick="GoTo('/farmer/promos?farmer_id=<?=$farmer->id?>')">
                    <span class="glyphicon glyphicon-gift"></span>
                    <span> Акции</span>
                </div>
                <div class="eda-company-about-link" onclick="GoTo('/farmer/videos?farmer_id=<?=$farmer->id?>')">
                    <span class="glyphicon glyphicon-play"></span>
                    <span> Видео </span>
                </div>
                <div class="eda-company-about-link" onclick="GoTo('/farmer/posts?farmer_id=<?=$farmer->id?>')">
                    <span class="glyphicon glyphicon-pencil"></span>
                    <span> Блог </span>
                </div>
            </div>
        </div>
        <div class="eda-company-ava">
            <img src="<?=ImageOverride::getPath($farmer->poster)?>"/>
        </div>
        <hr style="flex-basis: 100%; border-color: #1f7b1e"/>
        <div class="eda-company-goods">
            <h3 onclick="FilteringCompanyGoods()">Продукты компании</h3>
            <div class="eda-company-goods-filters">
                <div class="eda-company-goods-filters-all-checked" title="выбрать все" onclick="AllChecked()"></div>
                <div class="eda-company-goods-filters-items">
                    <?php foreach ($categories as $category): ?>
                        <label class="eda-company-goods-filters-item" for="f1<?=$category->id?>">
                            <input data-id="<?=$category->id?>" checked type="checkbox" name="flt_category"
                                   id="f1<?=$category->id?>" onchange="FilteringCompanyGoods()"/>
                            <?=$category->name?>
                        </label>
                    <?php endforeach;?>
                </div>
                <div class="eda-company-goods-filters-all-unchecked" title="отменить выбор всех" onclick="AllUnchecked()"></div>
            </div>

            <div id="CompanyGoodList" class="eda-company-good-list">
                <!--                ajax-->
            </div>
        </div>
    </div>
</div>

<script>
    $('#CompanyGoodList').load('/good/farmer-good-list?farmer_id=<?=$farmer->id?>');
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>