<?php
$this->title = 'Wanna fresh: Фермерское хозяйство';
?>
<div class="eda-company-wrap">
    <div class="eda-company">
        <div class="eda-company-description">
            <h1>Соймик</h1>
            Соевые и растительные продукты набирают всё большую популярность, и мы прикладываем немало усилий для того,
            что бы этот процесс происходил ещё быстрее.
            Ознакомьтесь с продуктами, которые мы производим с любовью и верой в то, что они войдут в рацион каждого
            человека. Уже более трёх лет мы работаем над
            совершенствованием соевых и других растительных продуктов, делая их вкусными, разнообразными и полезными.
        </div>
        <div class="eda-company-ava">
            <img src="/frontend/web/img/logo_soymik.png"/>
        </div>
        <div class="eda-company-goods">
            <h3>Продукты компании</h3>
            <div class="eda-company-goods-item">
                <p>Посмотреть все продукты компании...</p>
            </div>
            <?php for ($i = 1; $i < 5; $i++): ?>
                <div class="eda-company-goods-item">
                    <img src="/frontend/web/img/cheese-ico.svg" />
                    <p>Пармезан</p>
                </div>
                <div class="eda-company-goods-item">
                    <img src="/frontend/web/img/cabbage-ico.svg" />
                    <p>Капуста</p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
