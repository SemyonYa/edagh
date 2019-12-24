
<div class="modal-dialog modal-dialog-post" role="document">
        <div class="modal-content">
            <img src="/backend/web/images/<?= $post->getImg() ?>">
            <div class="eda-post text-center">
                <h3><?= $post->title ?>1</h3>
                <p><?= $post->description ?></p>
                <p>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                </p>
            </div>
        </div>
    </div>