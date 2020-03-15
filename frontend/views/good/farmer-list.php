<?php
$this->title = 'Список фермерских хозяйств WannaFresh';
?>
<div class="eda-companylist-wrap">
    <h1>Фермерские хозяйства</h1>
    <div class="eda-companylist">
        <div class="eda-companylist-page active">
            <?php foreach ($farmers as $farmer) : ?>
            <div class="eda-companylist-page-item-wrap">
                <div class="eda-companylist-page-item" onclick="GoTo('/good/company?id=<?= $farmer->id ?>')" style="background-image: url('<?= $farmer->getThumb() ?>')"></div>
                <div class="eda-companylist-page-item-name"><?= $farmer->name ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.eda-companylist-indicators > span').click(function() {
                GoToCompanylistPage($(this).text());
            });
        });
    </script>