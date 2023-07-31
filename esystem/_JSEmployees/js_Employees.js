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