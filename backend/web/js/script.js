$(document).ready(function () {

});



function LoadList(className) {
    $('#' + className + 'List').load('/admin/' + className.toLowerCase() + '/list');
}

function GoTo(url) {
    location = url;
}
function adminHome() {
    GoTo('/admin')
}