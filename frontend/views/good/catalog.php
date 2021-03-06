<?php
$this->title = 'Каталог товаров Wanna Fresh';

use common\models\Farmer;
use common\models\Category;

/*
 * @var $cats Category[]
 * @var $farmers Farmer[]
 */

$cats = Category::find()->all();
$farmers = Farmer::find()->all();
?>

<div class="eda-catalog-wrap">
    <div class="eda-catalog">
        <h1>Каталог продуктов</h1>
        <div id="CatalogFilter" class="eda-catalog-filters">
            <h3 data-toggle="collapse" data-target="#FilterCollapse">
                <span id="FilterHideBtn" class="glyphicon glyphicon-remove eda-catalog-filter-hide"></span>
                Фильтры
            </h3>
            <div id="FilterCollapse" class="collapse in">
                <button type="button" class="btn btn-success btn-flt" id="FilterApplyBtn">Применить</button>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    фермерские продукты
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php foreach ($cats as $cat) : ?>
                                    <div class="eda-catalog-filters-item">
                                        <input class="eda-catalog-filters-category" type="checkbox" name="flt_category" id="f1<?= $cat->id ?>" value="<?= $cat->id ?>" />
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
                                <?php foreach ($farmers as $farmer) : ?>
                                    <div class="eda-catalog-filters-item">
                                        <input class="eda-catalog-filters-farmer" type="checkbox" name="flt_farmer" id="f2<?= $farmer->id ?>" value="<?= $farmer->id ?>" />
                                        <label for="f2<?= $farmer->id ?>"><?= $farmer->name ?></label></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eda-catalog-goods" id="CatalogGoods">
            <div class="alert alert-success">Загрузка...</div>
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