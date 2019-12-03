$(document).ready(function () {
    $('#FilterSlideBtn').click(function () {
        $('#CatalogFilter').toggleClass('eda-catalog-filters-slided'); //.css('transform', 'translateX(0px)');
    });
    $('#FilterApplyBtn').click(function () {
        Filtering();
    });
    $('#OrderModal').on('show.bs.modal', function () {
        $('#OrderModal').load('/site/load-create-order-form');
    });
    BuyCounter();
    $('.eda-main-search-btn').on('click', function () {
        Search();
    });
    $('#SearchInput').on('input', function () {
        let input = $(this).val().trim().toLowerCase();
        if (input.length > 2) {
            console.log(input);
            $('#SearchOnlineResult').load('/good/search-online?input=' + input);
        } else {
            $('#SearchOnlineResult').empty();
        }
    });
    CheckMenuMobile();
    $('#FilterHideBtn').click(function () {
        ToggleFilters();
    });
    $('#PromoModal').on('show.bs.modal', function (e) {
        console.log(e.target);
    });
});

//PROMOS
function ShowPromo(id) {
    $('#PromoModal').modal('show');
    $('#PromoModal').load('/farmer/promo?id=' + id);
}

//POSTS
function ShowPost(id) {
    $('#PostModal').modal('show');
    $('#PostModal').load('/farmer/post?id=' + id);
}

// squeeze HEADER
$(document).on('load scroll', function () {
    const top = $(window).scrollTop();
    const beginSqueeze = 0;
    const endSqueeze = 500;
    const minHeaderHeight = 50;
    const maxHeaderHeight = 80;
    if (top > endSqueeze) {
        $('header').css('height', minHeaderHeight + 'px');
    } else if (top > beginSqueeze) {
        $('header').css('height', (minHeaderHeight + (endSqueeze - top) / ((endSqueeze - beginSqueeze) / (maxHeaderHeight - minHeaderHeight))) + 'px');
    }
});

// FUNCTIONS

function GoHome() {
    location = '/';
}

function GoTo(url) {
    location = url;
}

function GoToCompanylistPage(no) {
    // alert(no);
    $('.eda-companylist-indicators > span').each(function () {
        if ($(this).text() == no) {
            $(this).addClass('active');
            // alert($(this).text());
        } else {
            $(this).removeClass('active');
        }
    });
    $('.eda-companylist-page').each(function () {
        // alert(-1 + Number.parseInt(no));
        if ($(this).attr('data-id') == (Number.parseInt(no) - 1)) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });

}

function Search() {
    let input = $('#SearchInput').val().trim().toLowerCase();
    GoTo('/good/search-result?input=' + input);
}

///
// GOOD
///
function LoadGoodModal(id) {
    $('#GoodModal').load('/good/view?id=' + id);
}
function LoadGoodModalSearch(id) {
    LoadGoodModal(id);
    $('#SearchOnlineResult').empty();
    $('#SearchInput').val('');
}

function Filtering() {
    let cIds = [];
    let fIds = [];
    $('input.eda-catalog-filters-category:checkbox:checked').each(function () {
        cIds.push($(this).val());
    });
    $('input.eda-catalog-filters-farmer:checkbox:checked').each(function () {
        fIds.push($(this).val());
    });
    $('#CatalogGoods').load('/good/full-list', {
        'f_ids': fIds,
        'c_ids': cIds
    });
}

///
// CART
///
function GoodToCart(goodId, farmerId) {
    BuyAnimation();
    AddGoodToCart(goodId, farmerId);
}

function GoodFromCart(goodId, farmerId) {
    BuyAnimation();
    SubtructGoodFromCart(goodId, farmerId);
}

// function GoodToCartSearch(goodId, farmerId) {
//     GoodToCart(goodId, farmerId);
//     $('#SearchOnlineResult').empty();
//     $('#SearchInput').val('');
// }

function BuyAnimation() {
    $('#CartBlock').addClass('eda-header-cart-anima');
    setTimeout(function () {
        $('#CartBlock').removeClass('eda-header-cart-anima')
    }, 300);
}

function BuyCounter() {
    $.ajax({
        url: '/good/cart-counter'
    }).done(function (counter) {
        $('#CartCounter').text(counter);
    });
}

function AddGoodToCart(goodId, farmerId) {
    // alert(goodId + '-' + farmerId);
    $.ajax({
        url: '/good/to-cart',
        data: {
            good_id: goodId,
            farmer_id: farmerId
        },
        method: 'POST'
    }).done(function (msg) {
        BuyCounter();
        // alert(msg);
        if (msg == 1) {
            // $('#GoodToCartBtn').addClass('eda-good-modal-cart-added');
            // $('#GoodToCartBtnInner').empty();
            // $('#GoodToCartBtnInner').append('(<span></span>) Добавлено &#10004;');
        }
        $('#GoodToCartBtnInner').text(msg);
    });
}

function SubtructGoodFromCart(goodId, farmerId) {
    $.ajax({
        url: '/good/from-cart',
        data: {
            good_id: goodId,
            farmer_id: farmerId
        },
        method: 'POST'
    }).done(function (msg) {
        BuyCounter();
        // alert(msg);
        if (msg == 1) {
            // $('#GoodToCartBtn').addClass('eda-good-modal-cart-added');
            // $('#GoodToCartBtnInner').empty();
            // $('#GoodToCartBtnInner').append('(<span></span>) Добавлено &#10004;');
        }
        $('#GoodToCartBtnInner').text(msg);
    });
}

function RemoveGoodFromCart(obj) {
    if (confirm('Действительно удалить товар ' + $(obj).attr('data-goodname') + ' из корзины?')) {
        $.ajax({
            url: '/site/remove-good-from-cart?good_id=' + $(obj).attr('data-goodid') + '&farmer_id=' + $(obj).attr('data-farmerid')
        }).done(function () {
            LoadCartInner();
            BuyCounter();
        });
    }
}

function ClearCart() {
    $.ajax({
        url: '/site/clear-cart'
    }).done(function () {
        LoadCartInner();
        BuyCounter();
    });
}

function LoadCartInner() {
    $('#CartInner').load('/site/cart-inner');
}

function CreateOrders() {
    const email = $('#CreateOrderEmail').val();
    const phone = $('#CreateOrderPhone').val();
    const name = $('#CreateOrderName').val();
    const address = $('#CreateOrderAddress').val();
    let errors = [];

    let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (name.trim() == '') {
        errors.push('Имя не может быть незаполненным');
    }
    if (phone == '') {
        errors.push('Телефон введен некорректно');
    }
    if (reg.test(email) == false) {
        errors.push('E-mail не соответствует формату');
    }
    if (errors.length > 0) {
        $('#CreateOrderErrors').empty();
        $('#CreateOrderErrors').addClass('alert alert-danger');
        for (let error of errors) {
            $('#CreateOrderErrors').append('<p> - ' + error + '</p>');
            console.log(error);
        }
    } else {

        // alert('+++Валидные данные+++');
        $.post({
            url: '/site/create-orders',
            data: {
                'order_email': email,
                'order_phone': phone,
                'order_name': name,
                'order_address': address
            }
        }).done(function (msg) {
            // GoTo('/site/order-registred');
            console.log(msg);
        });

    }
}

function CreateOrders2() {
    const email = $('#CreateOrderEmail').val();
    const phone = $('#CreateOrderPhone').val();
    const name = $('#CreateOrderName').val();
    let errors = [];

    let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (name.trim() == '') {
        errors.push('Имя не может быть незаполненным');
    }
    if (phone == '') {
        errors.push('Телефон введен некорректно');
    }
    if (reg.test(email) == false) {
        errors.push('E-mail не соответствует формату');
    }
    if (errors.length > 0) {
        $('#CreateOrderErrors').empty();
        $('#CreateOrderErrors').addClass('alert alert-danger');
        for (let error of errors) {
            $('#CreateOrderErrors').append('<p> - ' + error + '</p>');
            console.log(error);
        }
        event.preventDefault();
    } else {

        // alert('+++Валидные данные+++');
        $.post({
            url: '/site/create-orders',
            data: {
                'order_email': email,
                'order_phone': phone,
                'order_name': name
            }
        }).done(function (msg) {
            // GoTo('/site/order-registred');
            console.log(msg);
        });

    }
}

function EditCartQuantity(obj) {
    const goodId = $(obj).attr('data-goodid');
    const farmerId = $(obj).attr('data-farmerid');
    const quantity = $(obj).val();
    $.ajax({
        url: '/site/edit-cart-quantity?farmer_id=' + farmerId + '&good_id=' + goodId + '&quantity=' + quantity
    }).done(LoadCartInner());
}

// COMPANY
function FilteringCompanyGoods() {
    let cats = [];
    $('.eda-company-goods-filters-item input:checkbox:checked').each(function () {
        cats.push($(this).attr('data-id'))
    });
    $('.eda-company-goods-item').each(function () {
        // console.log($(this).attr('data-category-id'));
        // console.log(typeof $(this).attr('data-category-id'));
        // console.log($.inArray($(this).attr('data-category-id'), cats));
        if ($.inArray($(this).attr('data-category-id'), cats) >= 0) {
            $(this).removeClass('eda-hidden');
        } else {
            $(this).addClass('eda-hidden');
        }
    });

    console.log(cats);
    // console.log($.inArray('1', cats));

}

function AllChecked() {
    $('.eda-company-goods-filters-item input:checkbox').each(function () {
        $(this).prop('checked', true);
    });
    FilteringCompanyGoods();
}

function AllUnchecked() {
    $('.eda-company-goods-filters-item input:checkbox').each(function () {
        $(this).prop('checked', false);
    });
    FilteringCompanyGoods();
}

// CATALOG
function CheckMenuMobile() {
    if ($(window).width() < 1023) {
        HideFilters();
    }
}
function ShowFilters() {
    $('#FilterCollapse').addClass('in');
    $('#FilterHideBtn').removeClass('eda-catalog-filter-hidden');
}

function HideFilters() {
    $('#FilterCollapse').removeClass('in');
    $('#FilterHideBtn').addClass('eda-catalog-filter-hidden');
}

function ToggleFilters() {
    $('#FilterHideBtn').toggleClass('eda-catalog-filter-hidden');

}
// ТРЕБУЮТ РЕАЛИЗАЦИИ
function SendOrder() {
    $.ajax({
        url: '/site/send-order'
    }).done(function () {
        alert();
    });
}


