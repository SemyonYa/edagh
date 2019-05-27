<?php foreach ($f_imgs as $f_img): ?>
    <div class="ad-farmer-update-img"
         style="background-image: url('<?= Yii::$app->imagemanager->getImagePath($f_img->img_id) ?>')">
        <span class="glyphicon glyphicon-remove" onclick="RemoveFarmerImg(<?= $f_img->img_id ?>)"
              title="Удалить изображение"></span>
        <span class="glyphicon glyphicon-ok" onclick="MainFarmerImg(<?= $f_img->img_id ?>)"
              style="color: <?= ($f_img->is_main == 1) ? '#4f7b30' : 'rgba(255,255,255,.6)' ?>"
              title="Сделать изображение основным"></span>
    </div>
<?php endforeach; ?>
