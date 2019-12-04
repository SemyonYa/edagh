<?php
use frontend\models\ImageOverride;
?>
<div class="modal-dialog modal-dialog-promo" role="document">
    <div class="modal-content">
        <img src="<?=ImageOverride::getPath($promo->img_id)?>">
        <div class="eda-promo text-center">
            <h3><?= $promo->title ?></h3>
            <p><b><?= $promo->subtitle ?></b></p>
            <p><?= $promo->description ?></p>
            <p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
            </p>
        </div>
    </div>
</div>