<?php
$this->title = 'Корзина - WannaFresh';

?>
<div class="eda-cart-wrap">
    <div class="eda-cart">
        <h1>
            <span>Корзина <span class="glyphicon glyphicon-refresh eda-cart-refresh" onclick="LoadCartInner()"
                                title="Пересчитать"></span></span><span class="btn btn-danger eda-cart-clear"
                                                                        onclick="ClearCart()">очистить корзину</span>
        </h1>
        <div id="CartInner">
            <!--AJAX-->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="OrderModalLabel"
     aria-hidden="true">
    -----
</div>

<script>
    LoadCartInner();
</script>