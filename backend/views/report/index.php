<?php
/* @var $this \yii\web\View */
$this->title = 'Формирование отчётов';
?>

<div class="ad-report">
    <h2>Формирование отчета</h2>
    <div class="alert alert-success">
        Укажиет параметры для формирования отчета.
    </div>
    <div class="ad-report-params">
        <div class="ad-report-params-item">
            <h4>Период:</h4>
            <b class="text-danger text-uppercase">оба параметра являются обязательными.</b>
            <label for="ReportDateIn">С</label>
            <input type="date" class="ad-report-params-item-period" id="ReportDateIn" value="<?= $defaults['date_in'] ?>"/>
            <label for="ReportDateOut">По</label>
            <input type="date" class="ad-report-params-item-period" id="ReportDateOut" value="<?= $defaults['date_out'] ?>" />
        </div>
        <div class="ad-report-params-item">
            <h4>Категории продуктов</h4>
            <b class="text-danger text-uppercase">необязательный параметр. можно выбрать несколько, удерживая ctrl.</b>
            <select multiple size="5" class="ad-report-params-item-cats" id="ReportCategories">
                <?php foreach ($cats as $cat): ?>
                    <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ad-report-params-item">
            <h4>Продукты</h4>
            <b class="text-danger text-uppercase">начните вводить наименование продукта, чтобы добавить его в список</b>
            <input type="text" class="ad-report-params-item-goods" id="ReportGoods" oninput="SearchGoodForReport(this)" />
            <div class="ad-report-params-item-search-result" id="ReportSearchResult"></div>
            <div class="ad-report-params-item-goodlist" id="ReportGoodlist"></div>
        </div>
        <div class="ad-report-params-item">

        </div>

    </div>
    <button class="btn btn-primary" type="button" onclick="CheckReportParams()">Проверить параметры</button>
</div>