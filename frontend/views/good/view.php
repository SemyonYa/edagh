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
            <p class="eda-good-modal-body-price"><?= $good->price ?> руб.</p>
        </div>
        <div class="eda-good-modal-btns">
            <?php if ($in_cart): ?>
                <button type="button" class="btn eda-good-modal-cart eda-good-modal-cart-added">
                    Добавлено &#10004;
                </button>
            <?php else: ?>
                <button type="button" class="btn eda-good-modal-cart"
                        onclick="GoodToCart(<?= $good->id ?>, <?= $good->farmer_id ?>)">
                    В корзину
                </button>
            <?php endif; ?>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
</div>
