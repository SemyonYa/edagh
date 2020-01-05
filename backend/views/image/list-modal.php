<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="WannaFreshModalLabel">Менеджер изображений</h4>
        </div>
        <div class="modal-body">
            <div class="modal-images" id="WannaFreshInputAttr" data-id="1">
                <?php foreach ($imgs as $img) : ?>
                    <div class="modal-image" style="background-image: url('/backend/web/images/<?= $farmer_id ?>/____<?= $img->name ?>')" onclick="ChooseImage('<?= $img->name ?>', '<?= $farmer_id ?>')"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>