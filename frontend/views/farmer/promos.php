<?php
$this->title = $farmer->name . ': Акции';
?>

<div class="eda-promos-wrap">
    <div class="eda-promos">
        <div class="eda-promos-farmer">
            <img src="/backend/web/images/<?= $farmer->getThumb() ?>">
            <h1>Акции</h1>
        </div>
        <div class="eda-promos-list">
            <?php foreach ($promos as $promo) : ?>
                <div class="eda-promos-item" onclick="ShowPromo(<?= $promo->id ?>)" style="background-image: url('/backend/web/images/<?= $promo->getImg() ?>');">
                    <p><?= $promo->title ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="PromoModal" tabindex="-1" role="dialog" aria-labelledby="PromoModalLabel">

</div>