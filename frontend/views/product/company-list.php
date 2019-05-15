<?php
$this->title = 'Список фермерских хозяйств - WannaFresh';
?>
<div class="eda-companylist-wrap">
    <h1>Фермерские хозяйства</h1>
    <div class="eda-companylist">
        <div class="eda-companylist-indicators">
            <?php for ($y = 0; $y < 3; $y++): ?>
                <span class="<?= ($y === 0) ? 'active' : ''; ?>"><?= ($y + 1) ?></span>
            <?php endfor; ?>
        </div>
        <?php for ($i = 0; $i * 9 < 27; $i++): ?>
            <div data-id="<?= $i ?>" class="eda-companylist-page <?= ($i === 0) ? 'active' : '' ?> ">
                <?php for ($j = 1; $j <= 9; $j++): ?>
                    <div class="eda-companylist-page-item">
                        <?= ($i * 9 + $j) ?>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
        <div class="eda-companylist-indicators">
            <?php for ($y = 0; $y < 3; $y++): ?>
                <span class="<?= ($y === 0) ? 'active' : ''; ?>"><?= ($y + 1) ?></span>
            <?php endfor; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.eda-companylist-indicators > span').click(function () {
            GoToCompanylistPage($(this).text());
        });
    });
</script>