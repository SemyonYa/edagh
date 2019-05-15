$(document).ready(function () {
    $('#FilterSlideBtn').click(function () {
        // alert('123');
        $('#CatalogFilter').toggleClass('eda-catalog-filters-slided'); //.css('transform', 'translateX(0px)');
    });
    $('.eda-catalog-goods-item').click(function () {
        let id = $(this).attr('data-good-id');
        $('#GoodModal').load('/product/view?id=' + id);
    });
    $('#FilterApplyBtn').click(function () {
        Filtering();
    });
    $('#OrderModal').on('show.bs.modal', function (e) {
        $('#OrderModal').load('/site/create-order');
    });
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


// ТРЕБУЮТ РЕАЛИЗАЦИИ
function Filtering() {
    alert('Filtering --->>>');
}

function GoodToCart(id) {
    alert('Add good ' + id + ' to cart -->>');
}

function RemoveGoodFromCart(good) {
    if (confirm('Действительно удалить товар ' + good + ' из корзины?')) {
        alert('Удаляем! -->>');
    }
}

function CreateOrders() {
    alert('Оформляется заказ -->>');
}
