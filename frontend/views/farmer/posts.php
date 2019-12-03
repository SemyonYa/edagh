<?php
use frontend\models\ImageOverride;
?>
<div class="eda-posts-wrap">
    <div class="eda-posts">
        <div class="eda-posts-farmer">
            <img src="<?=ImageOverride::getPath($farmer->poster)?>" onclick="GoTo('/good/company?id=<?=$farmer->id?>')">
            <h1>Блог</h1>
        </div>
        <div class="eda-posts-list">
            <?php foreach ($posts as $post): ?>
            <div class="eda-posts-item">
                <h3><?= $post->title ?></h3>
                <div class="eda-posts-item-subtitle">
                    <img src="<?=ImageOverride::getPath($post->img_id)?>"/>
                    <!-- <img src="/frontend/web/img/tomat2.jpg"> -->
                    <p><?= $post->subtitle ?></p>
                    <p class="eda-posts-item-link" onclick="ShowPost(<?= $post->id ?>)">Подробнее...</p>
                </div>
            </div>
            <?php endforeach;?>
          </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="PostModal" tabindex="-1" role="dialog" aria-labelledby="PostModalLabel">

</div>