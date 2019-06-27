<?php
/* @var $report_categories \backend\models\ReportCategory[] */
?>

<div class="ad-report-result-inner">
    <?php if (count($report_categories) > 0): ?>
        <table class="table table-hover">
            <tr>
                <th colspan="4" class="ad-report-title">Отчёт по категориям</th>
            </tr>
            <?php $n = 1; ?>
            <?php foreach ($report_categories as $report_category): ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><?= $report_category->category->name ?></td>
                    <td><?= count($report_category->order_goods) ?></td>
                    <td><?= $report_category->getSum() ?> руб.</td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>