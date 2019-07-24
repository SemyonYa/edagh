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
            <div class="eda-good-modal-body-farmer" onclick="GoTo('/good/company?id=<?= $good->farmer_id ?>')">
                <div class="eda-good-modal-body-farmer-icon"
                     style="background-image: url('<?= ImageOverride::getPath($good->farmer->poster) ?>')"></div>
                <div class="eda-good-modal-body-farmer-name"><?= $good->farmer->name ?></div>
            </div>
            <h2><?= $good->name ?></h2>
            <p>
                <span class="eda-good-modal-body-itemname"><?= $good->brief ?></span>
            </p>
            <p>
                <span><?= $good->description ?></span>
            </p>
            <p>Масса: <b><?= $good->quantity . ' ' . $good->measure->name ?></b></p>
            <p class="eda-good-modal-body-price"><?= $good->price ?> руб.</p>
        </div>
        <div class="eda-good-modal-btns">
            <button id="GoodToCartBtn" type="button" class="btn eda-good-modal-cart <?= ($in_cart) ? 'eda-good-modal-cart-added' : '' ?>"
                    onclick="GoodToCart(<?= $good->id ?>, <?= $good->farmer_id ?>)">
                <span id="GoodToCartBtnInner">
                    <?php if ($in_cart): ?>
                        (<span><?= $in_cart ?></span>) Добавлено &#10004;
                    <?php else: ?>
                        В корзину
                    <?php endif; ?>
                </span>
            </button>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
</div>
