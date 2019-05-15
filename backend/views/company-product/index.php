<!--ajax-->
<a href="/admin/company-product/create?company_id=<?= $company_id ?>">
    <div class="ad-company-product-list-item"><span class="glyphicon glyphicon-plus"></span><?= $i ?></div>
</a>
<?php for ($i = 1; $i < 10; $i++): ?>
    <a href="/admin/company-product/edit?id=<?= $i ?>">
        <div class="ad-company-product-list-item">Наименование продукта №<?= $i ?></div>
    </a>
<?php endfor; ?>
