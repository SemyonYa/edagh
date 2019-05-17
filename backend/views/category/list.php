<table class="ad-category-table">
    <thead>
    <tr>
        <td>Сортировка</td>
        <td>Наименование</td>
        <td>Действия</td>
    </tr>
    </thead>
    <?php $i = 1; ?>
    <?php foreach ($cats as $item): ?>
    <?php $controller = strtolower(explode('\\', $item::className())[2]) ?>
        <tr>
            <td><?= $item->ordering ?></td>
            <td><?= $item->name ?></td>
            <td>
                <span onclick="GoTo('/admin/<?= $controller ?>/update?id=<?= $item->id ?>')" class="btn-action">Редактировать</span>
                <span data-id="<?= $item->id ?>" data-name="<?= $item->name ?>" data-controller="<?= $controller ?>" class="btn-action btn-remove">Удалить </span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
