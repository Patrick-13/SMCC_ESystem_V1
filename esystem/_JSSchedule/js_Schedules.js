

$("body").on("click", ".schedule_edit", function (e) {
    e.preventDefault();
    $('#schedule_edit').modal('show');
    var id = $(this).data('id');
    getTracksAndStrands(id);
});

$("body").on("click", ".schedule_delete", function (e) {
    e.preventDefault();
    $('#schedule_delete').modal('show');
    var id = $(this).data('id');
    getSchedule(id);
});

function getSchedule(id) {
    $.ajax({
        type: 'POST',
        url: 'track_strand_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {

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
