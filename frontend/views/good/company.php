<?php
$this->title = 'Wanna fresh: Фермерское хозяйство';

use frontend\models\ImageOverride;

/* @var $farmer \common\models\Farmer */

?>
<div class="eda-company-wrap">
    <div class="eda-company">
        <div class="eda-company-description">
            <h1><?= $farmer->name ?></h1>
            <p><?= $farmer->description ?></p>
        </div>
        <div class="eda-company-ava">
            <img src="<?= ImageOverride::getPath($farmer->poster) ?>"/>
        </div>
        <hr style="flex-basis: 100%; border-color: #1f7b1e" />
        <div class="eda-company-goods">
            <h3>Продукты компании</h3>
            <div class="eda-company-goods-filters">
                <?php foreach ($categories as $category): ?>
                <label for="f1<?= $category->id ?>">
                    <div class="eda-company-goods-filters-item"><input checked type="checkbox" name="flt_category" id="f1<?= $category->id ?>"/>
                        <?= $category->name ?>
                    </div>
                </label>
                <?php endforeach; ?>
            </div>
<!--            <div class="eda-company-goods-item eda-company-goods-item-all" onclick="GoTo('/')">-->
<!--                <p>ВСЕ ПРОДУКТЫ</p>-->
<!--            </div>-->
            <?php foreach ($farmer->goods as $good): ?>
                <div data-toggle="modal" data-target="#GoodModal" class="eda-company-goods-item" data-good-id="<?= $good->id ?>"
                     style="background-image: url('<?= ImageOverride::getPath($good->poster) ?>');">
                    <p><?= $good->name ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>