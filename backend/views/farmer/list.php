<table class="ad-farmer-table">
    <!--    <thead>-->
    <!--    <tr>-->
    <!--        <td>№</td>-->
    <!--        <td>Наименование</td>-->
    <!--        <td></td>-->
    <!--        <td></td>-->
    <!--        <td>Действия</td>-->
    <!--    </tr>-->
    <!--    </thead>-->
    <?php $i = 1; ?>
    <?php foreach ($farmers as $item) : ?>
        <?php $controller = explode('\\', $item::className())[2] ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $item->name ?></td>
            <td>
                <img src="/backend/web/images/<?= $item->getImg() ?>" height="100" alt="нет изображения" />
            </td>
            <td>
                <div onclick="GoTo('/admin/<?= strtolower($controller) ?>/update?id=<?= $item->id ?>')" class="btn-action">
                    Редактировать
                </div>
                <div data-id="<?= $item->id ?>" data-name="<?= $item->name ?>" data-controller="<?= strtolower($controller) ?>" class="btn-action btn-remove">Удалить
                </div>
                <div class="btn-action btn-modal" data-farmerid="<?= $item->id ?>" id="LoadAdminListBtn" title="Назначить администратора" onclick="LoadUserList(<?= $item->id ?>)">Admin
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>