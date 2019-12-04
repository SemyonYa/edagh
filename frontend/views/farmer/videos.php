<?php

use frontend\models\ImageOverride;

$this->title = $farmer->name . ": Видео";
?>

<div class="eda-videos-wrap">
    <div class="eda-videos">
        <div class="eda-promos-farmer">
            <img src="<?=ImageOverride::getPath($farmer->poster)?>" onclick="GoTo('/good/company?id=<?= $farmer->id ?>')">
            <h1>Видео</h1>
        </div>
        <div class="eda-videos-list">
            <?php foreach ($videos as $video): ?>
            <div class="eda-videos-item">
                <h3><?= $video->title ?></h3>
                <h5><?= $video->description ?></h5>
                <?= $video->url ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
