//ledger edit
$("body").on("click", ".voucher_edit", function (e) {
    e.preventDefault();
    $('#voucher_edit').modal('show');
    var id = $(this).data('id');
    getvouchertype(id);
});

//delete edit
$("body").on("click", ".voucher_delete", function (e) {
    e.preventDefault();
    $('#voucher_delete').modal('show');
    var id = $(this).data('id');
    getvouchertype(id);
});
function getvouchertype(id) {
    $.ajax({
        type: 'POST',
        url: 'voucher_settings_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#edit_id').val(response.id);
            $('#edit_vouchertype').val(response.voucher_type);
            $('#edit_vtuitionfee').val(response.v_tuition_fee);

            $('#delete_id').val(response.id);
            $('#delete_vouchertype').val(response.voucher_type);
            $('#delete_vtuitionfee').val(response.v_tuition_fee);
   


        }
    });
}