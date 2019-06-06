$(document).ready(function () {
    $('#FilterSlideBtn').click(function () {
        // alert('123');
        $('#CatalogFilter').toggleClass('eda-catalog-filters-slided'); //.css('transform', 'translateX(0px)');
    });
    $('#FilterApplyBtn').click(function () {
        Filtering();
    });
    $('#OrderModal').on('show.bs.modal', function (e) {
        $('#OrderModal').load('/site/create-order');
    });
    // $('.eda-company-goods-item').click(function () {
    //     let id = $(this).attr('data-good-id');
    //     LoadGoodModal(id);
    // });
    BuyCounter();
});


// squeeze HEADER
$(document).on('load scroll', function () {
    const top = $(window).scrollTop();
    const beginSqueeze = 0;
    const endSqueeze = 500;
    const minHeaderHeight = 50;
    if (top > endSqueeze) {
        $('header').css('height', minHeaderHeight + 'px');
    } else if (top > beginSqueeze) {
        $('header').css('height', (minHeaderHeight + (endSqueeze - top) / ((endSqueeze - beginSqueeze) / (100 - minHeaderHeight))) + 'px');
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
///
// GOOD
///
function LoadGoodModal(id) {
    $('#GoodModal').load('/good/view?id=' + id);
}
///
// CART
///
function GoodToCart(goodId, farmerId) {
    BuyAnimation();
    AddGoodToCart(goodId, farmerId);
}
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
    }).done(function () {
        BuyCounter();
    });
}

function ClearCart() {
    $.ajax({
        url: '/good/clear-cart'
    }).done(alert('clear'));
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
// ТРЕБУЮТ РЕАЛИЗАЦИИ
function Filtering() {
    alert('Filtering --->>>');
}

function RemoveGoodFromCart(good) {
    if (confirm('Действительно удалить товар ' + good + ' из корзины?')) {
        alert('Удаляем! -->>');
    }
}

function CreateOrders() {
    alert('Оформляется заказ -->>');
}
