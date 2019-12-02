<table class="ad-category-table">
    <thead>
    <tr>
        <td>Наименование</td>
        <td>Краткоу описание</td>
        <td>Действия</td>
    </tr>
    </thead>
    <?php $i = 1; ?>
    <?php foreach ($posts as $item): ?>
    <?php $controller = explode('\\', $item::className())[2] ?>
        <tr>
            <td><?= $item->title ?></td>
            <td><?= $item->subtitle ?></td>
            <td>
                <span onclick="GoTo('/admin/<?= strtolower($controller) ?>/update?id=<?= $item->id ?>')" class="btn-action">Редактировать</span>
                <span data-id="<?= $item->id ?>" data-name="<?= $item->title ?>" data-controller="<?= strtolower($controller) ?>" class="btn-action btn-remove">Удалить</span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
