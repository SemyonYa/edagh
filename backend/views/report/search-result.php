<?php
use common\models\Good;
/* @var $goods Good[]  */
?>
<?php foreach ($goods as $good): ?>
    <div class="ad-report-params-item-search-result-item"
         onclick="SelectGoodToReport(<?= $good->id ?>, '<?= $good->name ?>')"><?= $good->name ?></div>
<?php endforeach; ?>
