<?php
$this->title = 'Администрирование: ' . $farmer->name;
?>

<h1><?= $farmer->name ?></h1>
<div class="ad-list">
    <div class="ad-item"><a href="/admin/image/list">Менеджер изображений</a></div>
    <div class="ad-item"><a href="/admin/good">Мои товары</a></div>
    <div class="ad-item"><a href="/admin/order">Мои заказы</a></div>
    <div class="ad-item"><a href="/admin/day">Расписание доставки</a></div>
    <div class="ad-item"><a href="/admin/post">Записи</a></div>
    <div class="ad-item"><a href="/admin/video">Видео</a></div>
    <div class="ad-item"><a href="/admin/promo">Акции</a></div>
    <div class="ad-item"><a href="/admin/report">Отчёты</a></div>
    <div class="ad-item"><a href="/admin/farmer/self-update">Профиль</a></div>
</div>