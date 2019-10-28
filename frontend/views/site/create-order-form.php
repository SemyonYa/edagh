<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="OrderModalLabel">Оформление заказа</h4>
        </div>
        <div class="modal-body">
            <h1>Данные для подтверждения заказа</h1>
            <div id="CreateOrderErrors" class=""></div>
            <input class="form-control" id="CreateOrderName" placeholder="Ваше имя" />
            <input class="form-control" id="CreateOrderPhone" placeholder="Телефон" />
            <input type="email" class="form-control" id="CreateOrderEmail" placeholder="E-mail" />
            <textarea class="form-control" id="CreateOrderAddress" placeholder="Адрес"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
            <button type="button" class="btn btn-primary" onclick="CreateOrders()">Подтвердить</button>
<!--            <a class="btn btn-primary" href="/site/create-orders" onclick="CreateOrders2(event)">qwe</a>-->
        </div>
    </div>
</div>

<script>
    $('#CreateOrderPhone').mask('+7 (999) 999-99-99');
</script>