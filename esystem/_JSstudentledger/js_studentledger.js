$("#_ledgerstudentid").on("change", function (e) {
    e.preventDefault();
    var studentid = $("#_ledgerstudentid").val();
    //alert(studentid);
    $.ajax({
        url: 'sy_ledger_data_getstudentid.php',
        method: 'POST',
        data: 'studentid=' + studentid
    }).done(function (studentidledgername) {
        //console.log(studentidledgername);
        studentidledgername = JSON.parse(studentidledgername);
        $('#_ledgerstrand').empty();
       studentidledgername.forEach(function (studentidledgername) {
          $('#_ledgerstrand').val(studentidledgername.strand_code);

        });
    });
});

//tuitionfee
$("#_ledgerpayment").on("change", function (e) {
    e.preventDefault();
    var tuition = $("#_ledgerpayment").val();
    $.ajax({
        url: 'sy_ledger_data_vouchertype.php',
        method: 'POST',
        data: 'tuition=' + tuition
    }).done(function (vouchertype) {
        //console.log(ledgername);
        vouchertype = JSON.parse(vouchertype);
        $('#_ledgertuitionfee').empty();
        vouchertype.forEach(function (vouchertype) {
            $('#_ledgertuitionfee').val(vouchertype.v_tuition_fee);
        });
    });
});

//edit tuitionfee
$("#edit_ledgerpayment").on("change", function (e) {
    e.preventDefault();
    var tuition = $("#edit_ledgerpayment").val();
    $.ajax({
        url: 'sy_ledger_data.php',
        method: 'POST',
        data: 'schoolyear=' + schoolyear
    }).done(function (ledgername) {
        //console.log(ledgername);
        ledgername = JSON.parse(ledgername);
        $('#_ledgerstudentid').empty();
        ledgername.forEach(function (ledgername) {
            $('#_ledgerstrand').val(studentidledgername.strand_code);
        });
    });
});





//school year
$("#_ledgersy").change(function () {
    var schoolyear = $("#_ledgersy").val();
    //alert(schoolyear);
    $.ajax({
        url: 'sy_ledger_data.php',
        method: 'POST',
        data: 'schoolyear=' + schoolyear
    }).done(function (ledgername) {
        //console.log(ledgername);
        ledgername = JSON.parse(ledgername);
        $('#_ledgerstudentid').empty();
        ledgername.forEach(function (ledgername) {
            $('#_ledgerstudentid').append('<option id=' + ledgername.student_id + '  value=' + ledgername.student_id + '>' + ledgername.lastname + ', ' + ledgername.firstname +'</option>');
     
        });
    });
});

//edit school year
$("#edit_ledgersy").change(function () {
    var schoolyear = $("#edit_ledgersy").val();
    //alert(schoolyear);
    $.ajax({
        url: 'sy_ledger_data.php',
        method: 'POST',
        data: 'schoolyear=' + schoolyear
    }).done(function (ledgername) {
        //console.log(ledgername);
        ledgername = JSON.parse(ledgername);
        $('#edit_ledgerstudentid').empty();
        ledgername.forEach(function (ledgername) {
            $('#edit_ledgerstudentid').append('<option id=' + + '  value='+ + '>' + '-----Select-----' +'</option>');
            $('#edit_ledgerstudentid').append('<option id=' + ledgername.student_id + '  value=' + ledgername.student_id + '>' + ledgername.lastname + ', ' + ledgername.firstname +'</option>');
        });
    });
});


//ledger edit
$("body").on("click", ".ledger_edit", function (e) {
    e.preventDefault();
    $('#ledger_edit').modal('show');
    var id = $(this).data('id');
    getledger(id);
});

//delete edit
$("body").on("click", ".ledger_delete", function (e) {
    e.preventDefault();
    $('#ledger_delete').modal('show');
    var id = $(this).data('id');
    getledger(id);
});
function getledger(id) {
    $.ajax({
        type: 'POST',
        url: 'ledger_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#edit_id').val(response.ledger_id);
            $('#edit_ledgersy').val(response.ledger_sy).trigger('change');
            $('#edit_ledgerstudentid').val(response.lastname).trigger('change');
            $('#edit_ledgerstrand').val(response.strand_code);
            $('#edit_ledgerpayment').val(response.payment_type).trigger('change');
            $('#edit_ledgertuitionfee').val(response.tuition_fee);

            $('#delete_id').val(response.ledger_id);
            $('#delete_ledgersy').val(response.ledger_sy);
            $('#delete_ledgerstudentid').val(response.lastname);
            $('#delete_ledgerstrand').val(response.strand_code);
            $('#delete_ledgerpayment').val(response.payment_type);
            $('#delete_ledgertuitionfee').val(response.tuition_fee);


        }
    });
}