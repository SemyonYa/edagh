<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $goods \common\models\Good[] */

$this->title = 'Мои товары (' . count($goods) . ')';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-good-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="ad-good-search">
        <input class="ad-good-search-input" id="AdSearchInput"> <div class="ad-good-search-btn">Очистить</div>
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
<!--            <td>Действия</td>-->
        </tr>
        </thead>
        <tbody>
        <?php foreach ($goods as $good): ?>
            <tr ondblclick="GoTo('/admin/good/update?id=<?= $good->id ?>')">
                <td><?= $good->id ?></td>
                <td>
                    <?php if ($good->poster): ?>
                        <img src="<?= Yii::$app->imagemanager->getImagePath($good->poster) ?>" />
                    <?php else: ?>
                        <span>нет изображения</span>
                    <?php endif; ?>
                </td>
                <td><?= $good->name ?></td>
                <td><?= $good->brief ?></td>
                <td><?= $good->price ?> руб.</td>
                <td><?= $good->category->name ?></td>
<!--                <td>-->
<!---->
<!--                </td>-->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
