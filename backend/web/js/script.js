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
    $('#image-id').on('change', function () {
        const farmerId = $('#FarmerId').val();
        $.ajax({
            url: '/admin/farmer/add-image?farmer_id=' + farmerId + '&img_id=' + $(this).val()
        }).done(function () {
            LoadFarmerImgList(farmerId);
        });
    });
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
