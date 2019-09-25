<?php
/**
 * @var \common\models\Good[] $goods
 */
?>

<h1>csv</h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>farmer_id</td>
        <td>category_id</td>
        <td>price</td>
        <td>quantity</td>
        <td>measure_id</td>
        <td>brief</td>
        <td>description</td>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    <?php foreach ($goods as $good): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $good->name ?></td>
            <td><?= $good->farmer_id ?></td>
            <td><?= $good->category_id ?></td>
            <td><?= $good->price ?></td>
            <td><?= $good->price ?></td>
            <td><?= $good->measure_id ?></td>
            <td><?= $good->brief ?></td>
            <td><?= $good->description ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
