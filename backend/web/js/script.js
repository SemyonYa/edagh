$(document).ready(function () {
    ///
    // MODAL
    ///
    $('.btn-modal').on('click', function () {
        ShowEdaModal();
    });
    $('.btn-modal-close').on('click', function () {
        CloseEdaModal();
    });
    $('#EdaModalWrap').on('click', function (e) {
        const qwe = $(e.target).find('#EdaModal').attr('id');
        // alert(qwe);
        if (qwe === 'EdaModal') {
            CloseEdaModal();
        }
    });

    ///
    // CATEGORY
    ///
    $('.ad-category-form-img').on('click', function () {
        CategoryImgActivate(this);
    });

    ///
    // FARMER
    ///
    $('.ad-farmer-update #image-id').on('change', function () {
        const farmerId = $('#FarmerId').val();
        $.ajax({
            url: '/admin/farmer/add-image?farmer_id=' + farmerId + '&img_id=' + $(this).val()
        }).done(function () {
            LoadFarmerImgList(farmerId);
        });
    });
    $('.ad-good-update #image-id').on('change', function () {
        const goodId = $('#GoodId').val();
        $.ajax({
            url: '/admin/good/add-image?good_id=' + goodId + '&img_id=' + $(this).val()
        }).done(function () {
            LoadGoodImgList(goodId);
        });
    });
    ///
    // GOODS
    ///
    $('#AdSearchInput').on('input', function () {
        AdGoodSearching($(this).val());
    });
    $('#AdSearchClearBtn').on('click', function () {
        $('#AdSearchInput').val('');
        $('.ad-goods-table tbody tr').removeClass('ad-goods-table-tr-hidden');
    })
});

//////------------//////////////////--------------------/////////////////////-----------------------///////////////////
//////------------//////////////////--------------------/////////////////////-----------------------///////////////////
//////------------//////////////////--------------------/////////////////////-----------------------///////////////////


///
// FARMER
///
function LoadUserList(farmerId) {
    $('#EdaModal').load('/admin/farmer/userlist?f_id=' + farmerId);
}

function AddFarmerUser(fId, uId) {
    $.get({
        url: '/admin/farmer/add-user?f_id=' + fId + '&u_id=' + uId
    }).done(function (msg) {
        if (msg) {
            CloseEdaModal();
        } else {
            alert('Невозможно выбрать данного пользователя как администратора текущего фермерского хозяйства');
        }
    });
}

function LoadFarmerImgList(farmerId) {
    $('#FarmerImgs').load('/admin/farmer/image-list?farmer_id=' + farmerId);
}

function RemoveFarmerImg(imgId) {
    if (confirm('Удалить изображение?')) {
        const farmerId = $('#FarmerId').val();
        $.ajax({
            url: '/admin/farmer/remove-image?farmer_id=' + farmerId + '&img_id=' + imgId
        }).done(function () {
            LoadFarmerImgList(farmerId);
        });
    }
}

function MainFarmerImg(imgId) {
    const farmerId = $('#FarmerId').val();
    $.ajax({
        url: '/admin/farmer/main-image?farmer_id=' + farmerId + '&img_id=' + imgId
    }).done(function () {
        LoadFarmerImgList(farmerId);
    });
}

///
// CATEGORY
///
function CategoryImgActivate(obj) {
    $('.ad-category-form-img').each(function () {
        $(this).removeClass('ad-category-form-img-active');
    });
    $(obj).addClass('ad-category-form-img-active');
    $('#category-img').val($(obj).attr('data-name'));
}

///
// GOODS
///
function LoadGoodImgList(goodId) {
    $('#GoodImgs').load('/admin/good/image-list?good_id=' + goodId);
}

function RemoveGoodImg(imgId) {
    if (confirm('Удалить изображение?')) {
        const goodId = $('#GoodId').val();
        $.ajax({
            url: '/admin/good/remove-image?good_id=' + goodId + '&img_id=' + imgId
        }).done(function () {
            LoadGoodImgList(goodId);
        });
    }
}

function MainGoodImg(imgId) {
    const goodId = $('#GoodId').val();
    $.ajax({
        url: '/admin/good/main-image?good_id=' + goodId + '&img_id=' + imgId
    }).done(function () {
        LoadGoodImgList(goodId);
    });
}

function AdGoodSearching(str) {
    if (str.length > 1) {
        $('.ad-goods-table tbody tr').each(function () {
            if ($(this).text().toLowerCase().indexOf(str.toLowerCase()) == -1) {
                $(this).addClass('ad-goods-table-tr-hidden');
            } else {
                $(this).removeClass('ad-goods-table-tr-hidden');
            }
        });
    } else {
        $('.ad-goods-table tbody tr').removeClass('ad-goods-table-tr-hidden');
    }
}


///
// MODAL
///
function ShowEdaModal() {
    $('#EdaModalWrap').addClass('eda-modal-wrap-on');
    $('#EdaModal').addClass('eda-modal-on');
}

function CloseEdaModal() {
    $('#EdaModalWrap').removeClass('eda-modal-wrap-on');
    $('#EdaModal').removeClass('eda-modal-on');
}

///
// CRUD OF SIMPLE OBJECTS
///
function LoadList(className) {
    $('#' + className + 'List').load('/admin/' + className.toLowerCase() + '/list');
}


///
// COMMON FUNCTIONS
///
function GoTo(url) {
    location = url;
}

function Logout() {
    $.post({
        url: '/admin/site/logout'
    }).done(function () {
        alert('log out');
    });
}
