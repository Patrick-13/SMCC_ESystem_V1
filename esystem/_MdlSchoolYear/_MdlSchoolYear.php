<div class="modal fade" id="school_year_open">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Open School Year</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="school_year_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <label class="col-lg-3 col-form-label">School Year<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="school_year" id="school_year" required>
                        </div>
                        <label class="col-lg-3 col-form-label">Semester<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-3">
                            <select class="select form-control" name="semester" id="semester" required>
                                <option value="">- Select -</option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-plus"></i> Open School Year</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="school_year_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit School Year</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="school_year_edit.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id" required>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">School Year<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="school_year" id="edit_school_year" required>
                        </div>
                        <label class="col-lg-3 col-form-label">Semester<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-3">
                            <select class="select form-control" name="semester" id="edit_semester" required>
                                <option value="">- Select -</option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="edit"><i class="nav-icon fas fa-edit"></i> Edit School Year</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="school_year_delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Closed School Year</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="school_year_delete.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="delete_id" required>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-lg-3 col-form-label">School Year<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="school_year" id="delete_school_year" readonly required>
                        </div>
                        <label class="col-lg-3 col-form-label">Semester<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-3">
                            <select class="select form-control" name="semester" id="delete_semester" disabled>
                                <option value="">- Select -</option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm" name="delete"><i class="nav-icon fas fa-ban"></i> Close School Year</button>
                </div>
            </form>
        </div>
    </div>
</div>