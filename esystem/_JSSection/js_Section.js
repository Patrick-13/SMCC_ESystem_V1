
$("body").on("click", ".section_edit", function (e) {
    e.preventDefault();
    $('#section_edit').modal('show');
    var id = $(this).data('id');
    getSections(id);
});

$("body").on("click", ".section_delete", function (e) {
    e.preventDefault();
    $('#section_delete').modal('show');
    var id = $(this).data('id');
    getSections(id);
});

function getSections(id) {
    $.ajax({
        type: 'POST',
        url: 'section_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#edit_id').val(response.section_id);
            $('#edit_section_name').val(response.section_name);
            $('#edit_grade_level').val(response.grade_level);
            $('#edit_class_schedule').val(response.class_schedule);
            $('#edit_capacity').val(response.capacity);
            $('#edit_advisor').val(response.advisor);

            $('#delete_id').val(response.section_id);
            $('#delete_section_name').val(response.section_name);
            $('#delete_grade_level').val(response.grade_level);
            $('#delete_class_schedule').val(response.class_schedule);
            $('#delete_capacity').val(response.capacity);
            $('#delete_advisor').val(response.advisor);


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