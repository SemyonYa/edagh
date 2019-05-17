$(document).ready(function () {

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
});
