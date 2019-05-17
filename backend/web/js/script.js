$(document).ready(function () {

});



function LoadCategoryList() {
    $('#CategoryList').load('/admin/category/list');
}

function GoTo(url) {
    location = url;
}
function adminHome() {
    GoTo('/admin')
}