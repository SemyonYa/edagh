<?php foreach ($goods as $good): ?>
    <div class="ad-report-params-item-search-result-item"
         onclick="SelectGoodToReport(<?= $good->id ?>)"><?= $good->name ?></div>
<?php endforeach; ?>
