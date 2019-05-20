$(document).ready(function () {
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
});

function AddFarmerUser(fId, uId) {
    $.ajax({
        url: '/admin/'
    }).done(function () {

    });
    alert(fId + ' - ' + uId);
}

function ShowEdaModal() {
    $('#EdaModalWrap').addClass('eda-modal-wrap-on');
    $('#EdaModal').addClass('eda-modal-on');
}

function CloseEdaModal() {
    $('#EdaModalWrap').removeClass('eda-modal-wrap-on');
    $('#EdaModal').removeClass('eda-modal-on');
}

function LoadList(className) {
    $('#' + className + 'List').load('/admin/' + className.toLowerCase() + '/list');
}

function GoTo(url) {
    location = url;
}

function adminHome() {
    GoTo('/admin')
}