<?php
$this->title = 'Корзина Wanna Fresh';

?>
<div class="eda-cart-wrap">
<!--    <button onclick="SendOrder()">Send Order</button>-->
    <div class="eda-cart">
        <h1>
            <span>Корзина
<!--                <span class="glyphicon glyphicon-refresh eda-cart-refresh" onclick="LoadCartInner()" title="Пересчитать"></span>-->
            </span>
            <span class="btn btn-danger eda-cart-clear" onclick="ClearCart()">очистить корзину</span>
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

<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>

<script>
    LoadCartInner();
</script>