<?php
/* @var $good \common\models\Good */
?>
<!--AJAX-->
<div class="modal-dialog eda-good-modal">
    <div class="modal-content">
        <p class="eda-good-modal-closeup">
            <span data-dismiss="modal" aria-hidden="true">&times;</span>
        </p>
        <div class="eda-good-modal-img" style="background-image: url('<?= \frontend\models\ImageOverride::getPath($good->poster) ?>')"></div>
        <div class="eda-good-modal-body">
            <h2><?= $good->name ?></h2>
            <p>
                <span class="eda-good-modal-body-itemname"><?= $good->brief ?></span>
            </p>
            <p>
                <span><?= $good->description ?></span>
            </p>
        </div>
        <div class="eda-good-modal-btns">
            <button type="button" class="btn eda-good-modal-cart" onclick="GoodToCart(<?= $good->id ?>)">
                В корзину
            </button>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
</div>
