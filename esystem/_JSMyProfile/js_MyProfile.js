$("body").on("click", ".educational_attainment_delete", function (e) {
    e.preventDefault();
    $('#educational_attainment_delete').modal('show');
    var id = $(this).data('id');
    getEmployeeEducationalAttainment(id);

});

$("body").on("click", ".educational_attainment_edit", function (e) {
    e.preventDefault();
    $('#educational_attainment_edit').modal('show');
    var id = $(this).data('id');
    getEmployeeEducationalAttainment(id);

});

function getEmployeeEducationalAttainment(id) {
    $.ajax({
        type: 'POST',
        url: 'employee_educational_attainment_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#edit_id').val(response.id);
            $('#edit_employee_id').val(response.employee_id);
            $('#edit_level').val(response.level);
            $('#edit_school_name').val(response.school_name);
            $('#edit_sy_from').val(response.sy_from);
            $('#edit_sy_to').val(response.sy_to);
            $('#edit_attainment').val(response.attainment);
            $('#edit_honor').val(response.honor);

            $('#delete_id').val(response.id);
            $('#delete_employee_id').val(response.employee_id);
            $('#delete_level').val(response.level);
            $('#delete_school_name').val(response.school_name);
            $('#delete_sy_from').val(response.sy_from);
            $('#delete_sy_to').val(response.sy_to);
            $('#delete_attainment').val(response.attainment);
            $('#delete_honor').val(response.honor);
        }
    });
}

$(document).ready(function () {
    //Permanent Region
    $("#region").change(function () {
        var region_code = $("#region").val();
        $.ajax({
            url: 'address_data.php',
            method: 'POST',
            data: 'region_code=' + region_code
        }).done(function (province) {
            //console.log(province);
            province = JSON.parse(province);
            $('#province').empty();
            province.forEach(function (province) {
                $('#province').append('<option id=' + province.code + '  value=' + province.code + '>' + province.name + '</option>');
            });
        });
    });
    //Permanent Province
    $("#province").change(function () {
        var province_code = $("#province").val();
        $.ajax({
            url: 'address_data.php',
            method: 'POST',
            data: 'province_code=' + province_code
        }).done(function (citymun) {
            //console.log(citymun);
            citymun = JSON.parse(citymun);
            $('#municity').empty();
            citymun.forEach(function (citymun) {
                $('#municity').append('<option id=' + citymun.code + ' value=' + citymun.code + '>' + citymun.name + '</option>')
            })
        });
    });
    // Permanent City/Municipality
    $("#municity").change(function () {
        var municity_code = $('#municity').val();
        $.ajax({
            url: 'address_data.php',
            method: 'POST',
            data: 'municity_code=' + municity_code
        }).done(function (barangay) {
            //console.log(barangay);
            barangay = JSON.parse(barangay);
            $('#barangay').empty();
            barangay.forEach(function (barangay) {
                $('#barangay').append('<option id=' + barangay.code + '  value=' + barangay.code + '>' + barangay.name + '</option>')
            })
        });
    });
});

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