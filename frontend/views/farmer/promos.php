<?php

use frontend\models\ImageOverride;

$this->title = $farmer->name . ': Акции';
?>

<div class="eda-promos-wrap">
    <div class="eda-promos">
        <div class="eda-promos-farmer">
            <img src="<?=ImageOverride::getPath($farmer->poster)?>">
            <h1>Акции</h1>
        </div>
        <div class="eda-promos-list">
            <?php foreach ($promos as $promo): ?>
            <div class="eda-promos-item" onclick="ShowPromo(<?= $promo->id ?>)" style="background-image: url('<?=ImageOverride::getPath($promo->img_id)?>');">
                <p>Купи три по цене четырех!!!</p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="PromoModal" tabindex="-1" role="dialog" aria-labelledby="PromoModalLabel">

</div>