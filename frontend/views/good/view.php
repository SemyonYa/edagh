<?php

use frontend\models\ImageOverride;

/* @var $good \common\models\Good */
?>
<!--AJAX-->
<div class="modal-dialog eda-good-modal">
    <div class="modal-content">
        <p class="eda-good-modal-closeup">
            <span data-dismiss="modal" aria-hidden="true">&times;</span>
        </p>
        <div class="eda-good-modal-img"
             style="background-image: url('<?= ImageOverride::getPath($good->poster) ?>')"></div>
        <div class="eda-good-modal-body">
            <div class="eda-good-modal-body-farmer">
                <div class="eda-good-modal-body-farmer-icon" onclick="GoTo('/good/company?id=<?= $good->farmer_id ?>')"
                     style="background-image: url('<?= ImageOverride::getPath($good->farmer->poster) ?>')"></div>
                <div class="eda-good-modal-body-farmer-day">Ближайшая доставка:
                    <?php if($good->farmer->nextDay): ?>
                        <b><?= date('d.m.Y', strtotime($good->farmer->nextDay->date)) ?></b>
                        (<b><?= ($good->farmer->nextDay->place) ? $good->farmer->nextDay->place : 'домой' ?></b>)
                    <?php else: ?>
                        <b>нет данных</b>
                    <?php endif; ?>
                </div>
            </div>
            <h2><?= $good->name ?></h2>
            <?php if ($good->brief): ?>
                <p>
                    <span class="eda-good-modal-body-itemname"><?= $good->brief ?></span>
                </p>
            <?php endif; ?>
            <p><b><?= $good->quantity . ' ' . $good->measure->name ?></b></p>
            <div class="eda-good-modal-body-price">
                <span><?= $good->price ?> руб.</span>
                <div class="eda-good-modal-body-price-cart">
                    <span class="btn-plus-minus" onclick="GoodFromCart(<?= $good->id ?>, <?= $good->farmer_id ?>)">-</span>
                    <span id="GoodToCartBtnInner" class="eda-good-modal-body-price-ico"><?= $in_cart ?></span>
                    <span class="btn-plus-minus" onclick="GoodToCart(<?= $good->id ?>, <?= $good->farmer_id ?>)">+</span>
                </div>
            </div>
        </div>

        <?php if ($good->description): ?>
            <div class="eda-good-modal-body-description">
                <span><?= $good->description ?></span>
            </div>
        <?php endif; ?>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
</div>
