//find track & strand
$("#track").change(function () {
    var track_id = $('#track').val();
    $.ajax({
        url: 'tracks_strands_data.php',
        method: 'POST',
        data: 'id=' + track_id
    }).done(function (response) {
        response = JSON.parse(response);
        $('#strand').empty();
        response.forEach(function (response) {
            if (response.strand_name === "") {
                $('#strand').append('<option disabled selected>-Select-</option>');
            } else {
                $('#strand').append('<option value=' + response.id + '>' + response.strand_name + '</option>')
            }
        })
    });
});

//find section
$("#grade_level, #class_schedule").change(function () {
    var class_schedule = $('#class_schedule').val();
    var grade_level = $('#grade_level').val();
    console.log(class_schedule);
    console.log(grade_level);
    $.ajax({
        url: 'section_class_schedule.php',
        method: 'POST',
        data: {
            class_schedule: class_schedule,
            grade_level: grade_level,
        },
        success: function (response) {
            console.log(response);
            response = JSON.parse(response);
            $('#section').empty();
            response.forEach(function (response) {
                if (response.grade_level === "") {
                    $('#section').append('<option disabled selected>-Select-</option>');
                } else {
                    $('#section').append('<option value=' + response.id + '>' + response.section_name + '</option>')
                }
            })
        }
    });
});

//serach button for student
$("#student_search").change(function () {
    var student_id = $('#student_search').val();
    $.ajax({
        type: 'POST',
        url: 'student_information_row.php',
        data: {
            id: student_id
        },
        dataType: 'json',
        success: function (response) {

            if (response.scholarship == 1) {
                var scholarship = "Paying";
            } else if (response.scholarship == 2) {
                var scholarship = "DepEd Voucher";
            } else if (response.scholarship == 3) {
                var scholarship = "ESC";
            } else if (response.scholarship == 4) {
                var scholarship = "Others";
            }

            $('#date_application').val(response.date_application);
            $('#student_id').val(response.student_id);
            $('#firstname').val(response.firstname.toUpperCase());
            $('#middlename').val(response.middlename.toUpperCase());
            $('#lastname').val(response.lastname.toUpperCase());
            $('#suffix').val(response.suffix.toUpperCase());
            $('#gender').val(response.gender.toUpperCase());
            $('#date_birth').val(response.date_of_birth);
            $('#home_address').val(response.region.toUpperCase() + " " + response.province.toUpperCase() + " " + response.municity.toUpperCase() + " " + response.barangay.toUpperCase() + " " + response.address.toUpperCase());
            $('#contact_number').val(response.cellphone_number);
            $('#idvoucher_number').val(response.idvoucher_number);
            $('#scholarship').val(scholarship);
            $('#scholarship_name').val(response.scholarship_name);
        }
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