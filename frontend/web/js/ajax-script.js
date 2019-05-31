$(document).ready(function () {
    $('.eda-catalog-goods-item').click(function () {
        let id = $(this).attr('data-good-id');
        $('#GoodModal').load('/good/view?id=' + id);
    });

///
//      BUY ANIMATION
///
//     $('#BuyAnimaBtn').on('click', function (e) { //
//
//     });
});
