<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="OrderModalLabel">Оформление заказа</h4>
        </div>
        <div class="modal-body">
            <h1>Данные для подтверждения заказа</h1>
            <input class="form-control" id="Name" placeholder="Ваше имя" />
            <input class="form-control" id="Phone" placeholder="Телефон" />
            <input class="form-control" id="Email" placeholder="E-mail" />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
            <button type="button" class="btn btn-primary" onclick="CreateOrders()">Подтвердить</button>
        </div>
    </div>
</div>