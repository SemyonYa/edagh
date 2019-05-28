<?php foreach ($g_imgs as $g_img): ?>
    <div class="ad-farmer-update-img"
         style="background-image: url('<?= Yii::$app->imagemanager->getImagePath($g_img->img_id) ?>')">
        <span class="glyphicon glyphicon-remove" onclick="RemoveGoodImg(<?= $g_img->img_id ?>)"
              title="Удалить изображение"></span>
        <span class="glyphicon glyphicon-ok" onclick="MainGoodImg(<?= $g_img->img_id ?>)"
              style="color: <?= ($g_img->is_main == 1) ? '#4f7b30' : 'rgba(255,255,255,.6)' ?>"
              title="Сделать изображение основным"></span>
    </div>
<?php endforeach; ?>
