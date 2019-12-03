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
            <div class="eda-promos-item" onclick="ShowPromo(<?=321?>)" style="background-image: url('/frontend/web/img/tomat2.jpg');">
                <p>Купи три по цене четырех!!!</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo('<?='qwerrty'?>')" style="background-image: url('/frontend/web/img/vegets.png');">
                <p> Купи две по цене четырех...</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo(<?=321?>)" style="background-image: url('/frontend/web/img/tomat2.jpg');">
                <p>Купи три по цене четырех!!!</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo('<?='qwerrty'?>')" style="background-image: url('/frontend/web/img/vegets.png');">
                <p> Купи две по цене четырех...</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo(<?=321?>)" style="background-image: url('/frontend/web/img/tomat2.jpg');">
                <p>Купи три по цене четырех!!!</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo('<?='qwerrty'?>')" style="background-image: url('/frontend/web/img/vegets.png');">
                <p> Купи две по цене четырех...</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo(<?=321?>)" style="background-image: url('/frontend/web/img/tomat2.jpg');">
                <p>Купи три по цене четырех!!!</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo('<?='qwerrty'?>')" style="background-image: url('/frontend/web/img/vegets.png');">
                <p> Купи две по цене четырех...</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo(<?=321?>)" style="background-image: url('/frontend/web/img/tomat2.jpg');">
                <p>Купи три по цене четырех!!!</p>
            </div>
            <div class="eda-promos-item" onclick="ShowPromo('<?='qwerrty'?>')" style="background-image: url('/frontend/web/img/vegets.png');">
                <p> Купи две по цене четырех...</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="PromoModal" tabindex="-1" role="dialog" aria-labelledby="PromoModalLabel">

</div>