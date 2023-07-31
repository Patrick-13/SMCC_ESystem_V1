
$(function () {
    $('#employee').change(function (e) {
        var id = document.getElementById('employee').value;
        getUsernameByEmployee(id);
    });
})

function getUsernameByEmployee(empno) {

    $.ajax({
        type: 'GET',
        url: 'extras/create_username.php?empno=' + empno,
        data: {
            empno: empno
        },
        dataType: 'text',
        success: function (response) {
            $('#username').val(response);
        }
    });
}

var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function () {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function () {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden"; // class "loader hidden"
});