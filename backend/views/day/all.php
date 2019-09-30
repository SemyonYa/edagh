<?php
use common\models\Day;

/**
 *  @var Day $days
 */
?>
<?php foreach ($days as $day): ?>
    <div class="schedule-day"><?= date('d.m.Y', strtotime($day->date)) ?>, <?= $day->time ?>
        <?= ($day->place) ? '<br>' . $day->place : '' ?>
    </div>
<?php endforeach; ?>