<?php

use frontend\models\ImageOverride;

/* @var $goods \common\models\Good[] */
?>

<?php foreach ($goods as $good): ?>
    <div class="eda-catalog-goods-item" data-good-id="<?= $good->id ?>" data-toggle="modal"
         data-target="#GoodModal">
        <div class="eda-catalog-goods-item-img"
             style="background-image: url('<?= ($good->poster != '') ? (ImageOverride::getPath($good->poster)) : (ImageOverride::getPath($good->farmer->poster)) ?>')">
        </div>
        <span class="eda-catalog-goods-item-name"><?= $good->name ?></span>
    </div>
<?php endforeach; ?>