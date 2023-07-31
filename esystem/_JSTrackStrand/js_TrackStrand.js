
$("body").on("click", ".track_strand_edit", function (e) {
    e.preventDefault();
    $('#track_strand_edit').modal('show');
    var id = $(this).data('id');
    getTracksAndStrands(id);
});

$("body").on("click", ".track_strand_delete", function (e) {
    e.preventDefault();
    $('#track_strand_delete').modal('show');
    var id = $(this).data('id');
    getTracksAndStrands(id);
});

function getTracksAndStrands(id) {
    $.ajax({
        type: 'POST',
        url: 'track_strand_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#edit_id').val(response.id);
            $('#edit_track_name').val(response.track_name);
            $('#edit_strand_name').val(response.strand_name);
            $('#edit_strand_code').val(response.strand_code);

            $('#delete_id').val(response.id);
            $('#delete_track_name').val(response.track_name);
            $('#delete_strand_name').val(response.strand_name);
            $('#delete_strand_code').val(response.strand_code);
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