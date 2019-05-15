<!--AJAX-->
<div class="modal-dialog eda-good-modal">
    <div class="modal-content">
        <p class="eda-good-modal-closeup">
            <span data-dismiss="modal" aria-hidden="true">&times;</span>
        </p>
        <div class="eda-good-modal-img" style="background-image: url('/frontend/web/img/tomat.jpg')"></div>
        <div class="eda-good-modal-body">
            <h2>Томат</h2>
            <p>
                <span class="eda-good-modal-body-itemname">Описание #<?= $id++ ?>:</span>
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </span>
            </p>
            <p>
                <span class="eda-good-modal-body-itemname">Описание #<?= $id++ ?>:</span>
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </span>
            </p>
        </div>
        <div class="eda-good-modal-btns">
            <!--            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>-->
            <button type="button" class="btn eda-good-modal-cart" onclick="GoodToCart(<?= $id ?>)">
                В корзину
                <div></div>
            </button>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
</div>
