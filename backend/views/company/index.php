<?php

use yii\helpers\Html;


$this->title = 'Компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="ad-company-list">
        <?php foreach ($companies as $company): ?>
        <a href="/admin/company/view?id=<?= $company->id ?>">
            <div class="ad-company-list-item">
                <span><?= $company->name ?></span>
                <img src="<?= $company->img ?>" />
            </div>
        </a>
        <?php endforeach; ?>
    </div>

</div>
