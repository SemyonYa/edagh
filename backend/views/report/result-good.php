<?php
/* @var $report_goods \backend\models\ReportGood[] */
?>
<div class="ad-report-result-inner">
    <table class="table table-hover">
        <tr>
            <th colspan="4" class="ad-report-title">Отчёт по товарам</th>
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
</div>