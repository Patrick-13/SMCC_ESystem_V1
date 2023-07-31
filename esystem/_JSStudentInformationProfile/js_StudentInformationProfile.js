
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
    }).done(function (response) {
        //console.log(barangay);
        response = JSON.parse(response);
        $('#barangay').empty();
        response.forEach(function (response) {
            $('#barangay').append('<option id=' + response.code + '  value=' + response.code + '>' + response.name + '</option>')
        })
    });
});

// Tracks & Strands
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



