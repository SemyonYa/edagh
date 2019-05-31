<?php
$this->title = 'Wanna fresh: Каталог товаров';

$cats = \common\models\Category::find()->all();
$farmers = \common\models\Farmer::find()->all();
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
                                категории
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php foreach ($cats as $cat): ?>
                            <div class="eda-catalog-filters-item"><input type="checkbox" name="flt_category"
                                                                         id="f1<?= $cat->id ?>"/>
                                <label for="f1<?= $cat->id ?>"><?= $cat->name ?></label></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group" id="accordion2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                фермерские хозяйства
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php foreach ($farmers as $farmer): ?>
                                <div class="eda-catalog-filters-item"><input type="checkbox" name="flt_category" id="f2<?= $farmer->id ?>"/>
                                    <label for="f2<?= $farmer->id ?>"><?= $farmer->name ?></label></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eda-catalog-goods" id="CatalogGoods">
            <!--            AJAX-->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="GoodModal" tabindex="-1" role="dialog" aria-labelledby="GoodModalLabel" aria-hidden="true">
    <!--AJAX-->
</div>
<script>
    $('#CatalogGoods').load('/good/full-list');
</script>