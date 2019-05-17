$(document).ready(function () {
    const id = $(this).attr('data-id');
    const name = $(this).attr('data-name');
    const controller = $(this).attr('data-controller');

    $('.btn-remove').on('click', function () {
        if (confirm('Удалить ' + name + '?')) {
            $.post({
                url: '/admin/' + controller + '/delete?id=' + id
            }).done(function (msg) {
                alert(msg);
                if (msg) {
                    LoadCategoryList();
                } else {
                    alert('Невозможно удалить ' + name);
                }
            });
        }
    });
});
