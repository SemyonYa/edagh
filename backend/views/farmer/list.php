<table class="ad-farmer-table">
    <thead>
    <tr>
        <td>№</td>
        <td>Наименование</td>
        <td>Действия</td>
    </tr>
    </thead>
    <?php $i = 1; ?>
    <?php foreach ($farmers as $item): ?>
    <?php $controller = explode('\\', $item::className())[2] ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $item->name ?></td>
            <td>
                <span onclick="GoTo('/admin/<?= strtolower($controller) ?>/update?id=<?= $item->id ?>')" class="btn-action">Редактировать</span>
                <span data-id="<?= $item->id ?>" data-name="<?= $item->name ?>" data-controller="<?= strtolower($controller) ?>" class="btn-action btn-remove">Удалить</span>
                <span class="btn-action btn-modal" data-farmerid="<?= $item->id ?>" id="LoadAdminListBtn" title="Назначить администратора">Admin</span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>


