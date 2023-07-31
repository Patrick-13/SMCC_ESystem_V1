<div class="modal fade" id="user_type_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user_type_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="user_type" id="user_type" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-plus"></i> Add User Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="user_type_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user_type_edit.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="user_type" id="edit_user_type">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="edit"><i class="nav-icon fas fa-edit"></i> Edit User Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="user_type_delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete User Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user_type_delete.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="delete_id">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="user_type" id="delete_user_type" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm" name="delete"><i class="nav-icon fas fa-trash"></i> Delete User Type</button>
                </div>
            </form>
        </div>
    </div>
</div>