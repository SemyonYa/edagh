<?php

use yii\helpers\Html;

$this->title = 'Новый продукт компании';
$this->params['breadcrumbs'][] = ['label' => 'Продукты компании', 'url' => ['/company/view', 'id' => $model->company_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
