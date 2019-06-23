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
    ///
    // ORDERS
    ///
    $('.eda-order-status-item').on('click', function () {
        LoadOrders($(this).attr('data-status'));
    });
    $('.ad-report-type').on('click', function () {
        CheckRadio($(this).val());
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
// ORDERS
///
function LoadOrders(status) {
    $('#EdaOrders').load('/admin/order/list?status=' + status);
    SetStatusColor(status);
}

function LoadOrderInfo(id) {
    $('#OrderInfoModal').load('/admin/order/info?id=' + id);
}

function SetStatusColor(status) {
    $('.eda-order-status-item').each(function () {
        // alert($(this).attr('data-status') + ' --- ' + status);
        if ($(this).attr('data-status') == status) {
            $(this).addClass('eda-order-status-item-active');
        } else {
            $(this).removeClass('eda-order-status-item-active');
        }
    });
}

function SetInfoStatusColor(status) {
    $('.eda-order-info-status-item').each(function () {
        if ($(this).attr('data-status') == status) {
            $(this).addClass('eda-order-info-status-item-active');
        } else {
            $(this).removeClass('eda-order-info-status-item-active');
        }
    });

}

function SetOrderStatus(obj) {
    if (confirm('Перевести заказ в статус "' + $(obj).text() + '"')) {
        const status = $(obj).attr('data-status');
        const currentStatus = $(obj).attr('data-current-status');
        const id = $(obj).attr('data-id');
        $.ajax({
            url: '/admin/order/set-status?id=' + id + '&status=' + status
        }).done(function () {
            // LoadOrders(currentStatus);
            // $('#OrderInfoModal').modal('hide');
            $('#OrderInfoModal').on('hidden.bs.modal', function () {
                LoadOrders(currentStatus);
            });
            SetInfoStatusColor(status);
        });
    }
}

///
// REPORT
///
function CheckReportParams() {
    const reportType = $('input[name=ReportType]:checked').val();
    const dateIn = $('#ReportDateIn').val();
    const dateOut = $('#ReportDateOut').val();
    const cats = $('#ReportCategories').val();
    const goods = [];
    $('#ReportGoodlist > div').each(function () {
        goods.push(1 * $(this).attr('data-goodid'));
    });
    console.log(dateIn + '  *-*   ' + dateOut);
    console.log('cats');
    console.log(cats);
    console.log('goods');
    console.log(goods);
    console.log(reportType);
    if (reportType === 'ReportTypeCat') {
        $('#ReportResult').load('/admin/report/result-cat', {
            'date_in': dateIn,
            'date_out': dateOut,
            'categories': cats
        });
    } else if (reportType === 'ReportTypeGood') {
        $('#ReportResult').load('/admin/report/result-good', {
            'date_in': dateIn,
            'date_out': dateOut,
            'goods': goods
        });
    }
    else if (reportType === 'ReportTypeOrder') {
        $('#ReportResult').load('/admin/report/result-order', {
            'date_in': dateIn,
            'date_out': dateOut
        });
    }
}

function SearchGoodForReport(obj) {
    const input = $(obj).val().trim().toLowerCase();
    if (input.length > 1) {
        $('#ReportSearchResult').load('/admin/report/search?input=' + input);
    } else {
        $('#ReportSearchResult').empty();
    }
}

function SelectGoodToReport(goodId, goodName) {
    $('input[name=ReportType]').val();
    let goodIds = [];
    $('#ReportGoodlist > div').each(function () {
        goodIds.push(1 * $(this).attr('data-goodid'));
    });
    console.log(goodIds);
    console.log(goodId);
    console.log(goodIds.indexOf(goodId));

    if (goodIds.indexOf(goodId) === -1) {
        $('#ReportSearchResult').empty();
        $('#ReportGoodlist').append('<div data-goodid="' + goodId + '" onclick="RemoveGoodFromReport(this)">' + goodName + '</div>');
    }
}

function RemoveGoodFromReport(obj) {
    $(obj).remove();
}

function CheckRadio(id) {
    $('.ad-report-params-item').each(function () {
        if ($(this).attr('data-radio') === id || ($(this).attr('data-radio') === 'ReportTypePeriod')) {
            $(this).addClass('ad-report-params-item-active')
            $(this).find('*').css('color', '');
        } else {
            $(this).removeClass('ad-report-params-item-active')
            $(this).find('*').css('color', '#555');
        }
    });
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
