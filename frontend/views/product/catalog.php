<?php
$this->title = 'Wanna fresh: Каталог товаров';
?>

<div class="eda-catalog-wrap">
    <div class="eda-catalog">
        <h1>Каталог продуктов</h1>
        <div id="CatalogFilter" class="eda-catalog-filters">
            <h3>Фильтры <span id="FilterSlideBtn" class="glyphicon glyphicon-filter eda-catalog-filter-icon"></span>
            </h3>
            <button type="button" class="btn btn-success btn-flt" id="FilterApplyBtn">Применить</button>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                По категории
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php for ($f = 1; $f < 10; $f++): ?>
                                <div class="eda-catalog-filters-item"><input type="checkbox" name="flt_category"
                                                                             id="f1<?= $f ?>"/><label for="f1<?= $f ?>">
                                        Категория Категория Категория Категория <?= $f ?></label></div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                По цвету
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php for ($f = 1; $f < 10; $f++): ?>
                                <div class="eda-catalog-filters-item"><input type="checkbox" name="flt_category"
                                                                             id="f2<?= $f ?>"/><label for="f2<?= $f ?>">
                                        Цвет <?= $f ?></label></div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                По дате
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php for ($f = 1; $f < 10; $f++): ?>
                                <div class="eda-catalog-filters-item"><input type="checkbox" name="flt_category"
                                                                             id="f3<?= $f ?>"/><label for="f3<?= $f ?>">
                                        Дата <?= $f ?></label></div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eda-catalog-goods">
            <?php for ($i = 1; $i < 15; $i++): ?>
                <div class="eda-catalog-goods-item" data-good-id="<?= $i ?>" data-toggle="modal" data-target="#GoodModal">
                    <div class="eda-catalog-goods-item-img"
                         style="background-image: url('/frontend/web/img/fish4-ico.svg')"></div>
                    <span class="eda-catalog-goods-item-name">Фермерский продукт #<?= $i ?></span>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>
