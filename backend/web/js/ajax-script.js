$(document).ready(function () {
    $('.btn-modal').on('click', function () {
        ShowEdaModal();
    });
    $('.btn-modal-close').on('click', function () {
        CloseEdaModal();
    });
    // $('#EdaModalWrap').on('click', function (e) {
    //     alert($(e.target).attr('id'));
    //     // CloseEdaModal();
    // });

    $('.btn-remove').on('click', function () {
        const id = $(this).attr('data-id');
        const name = $(this).attr('data-name');
        const controller = $(this).attr('data-controller');

        if (confirm('Удалить ' + name + '?')) {
            $.post({
                url: '/admin/' + controller.toLowerCase() + '/delete?id=' + id
            }).done(function (msg) {
                // alert();
                if (msg) {
                    LoadList(controller);
                } else {
                    alert('Невозможно удалить ' + name);
                }
            });
        }
    });


    // FARMER ADMIN
    $('#LoadAdminListBtn').click(function () {
        const farmerId = $(this).attr('data-farmerId');
        $('#EdaModal').load('/admin/farmer/userlist?f_id=' + farmerId);
    });
    $('.eda-userlist-item').click(function () {
        const userId = $(this).attr('data-userid');
        alert(userId);
    });

});