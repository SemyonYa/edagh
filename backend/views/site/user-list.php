<h2>Управление пользователями</h2>

<table class="ad-user-table">
    <thead>
    <tr>
        <td>№</td>
        <td>Логин</td>
        <td>E-mail</td>
        <td>Роль</td>
        <td>Фермерское хозяйство </td>
<!--        <td></td>-->
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= strtoupper($user->username) ?></td>
            <td><?= $user->email ?></td>
            <td> <?= (count($user->roles) > 0) ? substr($user->roles[0]->name, 2) : 'нет ролей' ?> </td>
            <td> <?= (count($user->farmers) > 0) ? $user->farmers[0]->name : 'нет ФХ' ?> </td>
            <td>
                <span class="btn-action">назначить роль</span>
                <span class="btn-action">прикрепить к ФХ</span>
                <span class="btn-action">сбросить пароль</span>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

