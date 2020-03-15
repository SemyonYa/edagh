<?php

use yii\helpers\Html;

$this->title = 'Мои товары (' . count($goods) . ')';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-good-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-primary']) ?>
        <a href="/admin/good/blocked" class="btn btn-default">Неопубликованные товары</a>
    </p>
    <div class="ad-good-search">
        <input class="ad-good-search-input" id="AdSearchInput">
        <div class="ad-good-search-btn" id="AdSearchClearBtn">Очистить</div>
    </div>
    <table class="ad-goods-table">
        <thead>
            <tr>
                <td>ID</td>
                <td><span class="glyphicon glyphicon-picture"></span></td>
                <td>Наименование товара</td>
                <td>Краткое описание</td>
                <td>Цена</td>
                <td>Категория</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($goods as $good) : ?>
                <tr onclick="GoTo('/admin/good/update?id=<?= $good->id ?>')">
                    <td><?= $good->id ?></td>
                    <td>
                        <img src="<?= $good->getThumb() ?>" height="100" />
                    </td>
                    <td><?= $good->name ?></td>
                    <td><?= $good->brief ?></td>
                    <td><?= $good->price ?> руб.</td>
                    <td><?= $good->category->name ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>