<?php

use frontend\models\ImageOverride;

?>
<?php foreach ($goods as $good): ?>
    <div data-toggle="modal" data-target="#GoodModal" class="eda-company-goods-item"
         data-category-id="<?= $good->category_id ?>"
         style="background-image: url('<?= ImageOverride::getPath($good->poster) ?>');"
         onclick="LoadGoodModal(<?= $good->id ?>)">
        <p><?= $good->name ?></p>
    </div>
<?php endforeach; ?>

<!-- Modal -->
<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>