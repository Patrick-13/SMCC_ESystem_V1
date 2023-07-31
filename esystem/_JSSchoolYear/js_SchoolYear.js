$("body").on("click", ".school_year_edit", function (e) {
    e.preventDefault();
    $('#school_year_edit').modal('show');
    var id = $(this).data('id');
    getSchoolYear(id);
});

$("body").on("click", ".school_year_delete", function (e) {
    e.preventDefault();
    $('#school_year_delete').modal('show');
    var id = $(this).data('id');
    getSchoolYear(id);
});

function getSchoolYear(id) {
    $.ajax({
        type: 'POST',
        url: 'school_year_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#edit_id').val(response.id);
            $('#edit_school_year').val(response.school_year);
            $('#edit_semester').val(response.semester);

            $('#delete_id').val(response.id);
            $('#delete_school_year').val(response.school_year);
            $('#delete_semester').val(response.semester);

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
