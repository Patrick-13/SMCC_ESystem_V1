$("body").on("click", ".user_type_edit", function (e) {
    e.preventDefault();
    $('#user_type_edit').modal('show');
    var id = $(this).data('id');
    getUserType(id);
});

$("body").on("click", ".user_type_delete", function (e) {
    e.preventDefault();
    $('#user_type_delete').modal('show');
    var id = $(this).data('id');
    getUserType(id);
});

function getUserType(id) {
    $.ajax({
        type: 'POST',
        url: 'user_type_row.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function (response) {
            $('#edit_id').val(response.id);
            $('#edit_user_type').val(response.user_type);

            $('#delete_id').val(response.id);
            $('#delete_user_type').val(response.user_type);
        }
    });
}