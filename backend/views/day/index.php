<?php
$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
?>
<h1><?= $this->title ?></h1>

<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#future" aria-controls="future" role="tab" data-toggle="tab">Запланированные</a>
        </li>
        <li role="presentation">
            <a href="#past" aria-controls="past" role="tab" data-toggle="tab">Прошедшие</a>
        </li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="future">
            <button class="btn btn-primary" onclick="LoadAddDay()" id="AddDayBtn">Добавить дату</button>
            <div id="AddDay">
<!--                ajax-->
            </div>
            <div id="AllDays" class="schedule-days">
<!--                ajax-->
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="past">...</div>
    </div>
</div>
<script>
    $(document).ready(LoadAllDays(1));
</script>