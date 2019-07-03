<?php
$this->title = "Управление пользователями";

$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Управление пользователями</h2>
<a href="/admin/signup" class="btn btn-primary">Новый пользователь</a>
<table class="ad-user-table">
    <thead>
    <tr>
        <td>№</td>
        <td>Логин</td>
        <td>E-mail</td>
        <td>Роль</td>
        <td>Фермерское хозяйство</td>
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
<!--                <span class="btn-action">прикрепить к ФХ</span>-->
                <a href="/admin/site/new-password-admin?user_id=<?= $user->id ?>" class="btn-action">сбросить пароль</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

