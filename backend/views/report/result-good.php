<?php
/* @var $report_goods \backend\models\ReportGood[] */
?>

<div class="ad-report-result-inner">
    <?php if (count($report_goods) > 0): ?>
        <table class="table table-hover">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Сумма</th>
            </tr>
            <?php $n = 1; ?>
            <?php foreach ($report_goods as $report_good): ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><?= $report_good->good->name ?></td>
                    <td><?= $report_good->q ?></td>
                    <td><?= $report_good->sum ?> руб.</td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>