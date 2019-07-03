<?php

use common\models\User;

/* @var $this \yii\web\View */
$this->title = 'Формирование отчётов';
?>

<div class="ad-report">
    <h2>Формирование отчета</h2>
    <div class="alert alert-success">
        Укажиет параметры для формирования отчета.
    </div>
    <div class="ad-report-params">
        <div class="ad-report-params-item" data-radio="ReportTypePeriod">
            <h4>Период:</h4>
            <b class="text-danger text-uppercase">оба параметра являются обязательными.</b>
            <label for="ReportDateIn">С</label>
            <input type="date" class="ad-report-params-item-period" id="ReportDateIn"
                   value="<?= $defaults['date_in'] ?>"/>
            <label for="ReportDateOut">По</label>
            <input type="date" class="ad-report-params-item-period" id="ReportDateOut"
                   value="<?= $defaults['date_out'] ?>"/>
        </div>
        <div class="ad-report-params-item" data-radio="ReportTypeCat">
            <h4>
                <span>По категориям</span>
                <input type="radio" value="ReportTypeCat" class="ad-report-type" name="ReportType"/>
            </h4>
            <b class="text-danger text-uppercase">необязательный параметр. можно выбрать несколько, удерживая ctrl.</b>
            <select multiple size="5" class="ad-report-params-item-cats" id="ReportCategories">
                <?php foreach ($cats as $cat): ?>
                    <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ad-report-params-item" data-radio="ReportTypeGood">
            <h4>
                <span>По продуктам</span>
                <input type="radio" value="ReportTypeGood" class="ad-report-type" name="ReportType"/>
            </h4>
            <b class="text-danger text-uppercase">начните вводить наименование продукта, чтобы добавить его в список</b>
            <input type="text" class="ad-report-params-item-goods" id="ReportGoods"
                   oninput="SearchGoodForReport(this)"/>
            <div class="ad-report-params-item-search-result" id="ReportSearchResult"></div>
            <div class="ad-report-params-item-goodlist" id="ReportGoodlist"></div>
        </div>
        <div class="ad-report-params-item ad-report-params-item-active" data-radio="ReportTypeOrder">
            <h4>
                <span>По заказам</span>
                <input type="radio" value="ReportTypeOrder" class="ad-report-type" name="ReportType" checked/>
            </h4>
            <b class="text-danger text-uppercase">Будет сформирован отчет по заказам</b>

        </div>
        <div class="ad-report-params-item" data-radio="ReportTypeClient">
            <h4>
                <span>По клиентам</span>
                <input type="radio" value="ReportTypeClient" class="ad-report-type" name="ReportType"/>
            </h4>
            <b class="text-danger text-uppercase">Будет сформирован отчет по клиентам</b>

        </div>

        <?php $user_id = \Yii::$app->user->identity->getId(); ?>
        <?php if (User::findOne($user_id)->roles[0]->name === 'r_admin'): ?>
            <div class="ad-report-params-item">
                <h4>
                    <span>ФХ</span>
                </h4>
                <b class="text-danger text-uppercase">Выберите фермерское хозяйство</b>
                <select id="ReportFarmer" class="ad-report-params-item-farmers  ">
                    <option value="all" selected>По всем</option>
                    <?php foreach ($farmers as $farmer): ?>
                        <option value="<?= $farmer->id ?>"><?= $farmer->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php else: ?>
            <input type="hidden" value="0" id="ReportFarmer"/>
        <?php endif; ?>

    </div>
    <button class="btn btn-primary" type="button" onclick="CheckReportParams()">Сформировать</button>
    <div class="ad-report-result" id="ReportResult">
<!--        ajax-->
    </div>
</div>
<script>
    CheckRadio('ReportTypeOrder');
</script>