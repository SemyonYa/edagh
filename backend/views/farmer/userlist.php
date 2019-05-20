<div class="eda-userlist">
    <h4>Список пользователей</h4>
    <?php foreach ($users as $user): ?>
        <div class="eda-userlist-item" onclick="AddFarmerUser(<?= $f_id ?>, <?= $user->id ?>)">
            <span><?= $user->username ?></span>
            <?php if (count($user->farmerUsers) > 0): ?>
                <?php if ($user->farmers[0]->id == $f_id): ?>
                    <span class="glyphicon glyphicon-ok"></span>
                <?php else: ?>
                    <span class="glyphicon glyphicon-alert" title="<?= $user->farmers[0]->name ?>"></span>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>