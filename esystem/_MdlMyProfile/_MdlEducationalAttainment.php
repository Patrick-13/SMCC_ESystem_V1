<div class="modal fade" id="educational_attainment_add">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Educational Attainament</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="employee_educational_attainment_add.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $employee_id; ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Level<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <select class="form-control" name="level" id="level" style="width: 100%;" required>
                                <option selected="selected" disabled>- Select -</option>
                                <option value="1">Primary</option>
                                <option value="2">Tertiary</option>
                                <option value="3">Vocational</option>
                                <option value="4">Graduate</option>
                                <option value="5">Post Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="school_name" class="col-3 col-form-label">School Name<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="school_name" id="school_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sy_from" class="col-3 col-form-label">S.Y. From<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="sy_from" id="sy_from" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sy_to" class="col-3 col-form-label">S.Y. To<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="sy_to" id="sy_to" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="attainment" class="col-3 col-form-label">Attainament</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="attainment" id="attainment">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="honor" class="col-3 col-form-label">Honor</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="honor" id="honor">
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="add"><i class="fa fa-plus"></i> Add Attainment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="educational_attainment_edit">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Educational Attainament</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="employee_educational_attainment_edit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                <input type="hidden" name="employee_id" id="edit_employee_id">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Level<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <select class="form-control" name="level" id="edit_level" style="width: 100%;" required>
                                <option selected="selected" disabled>- Select -</option>
                                <option value="1">Primary</option>
                                <option value="2">Tertiary</option>
                                <option value="3">Vocational</option>
                                <option value="4">Graduate</option>
                                <option value="5">Post Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="school_name" class="col-3 col-form-label">School Name<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="school_name" id="edit_school_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sy_from" class="col-3 col-form-label">S.Y. From<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="sy_from" id="edit_sy_from" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sy_to" class="col-3 col-form-label">S.Y. To<span style="color:red;" class="astris">*</span></label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="sy_to" id="edit_sy_to" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="attainment" class="col-3 col-form-label">Attainament</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="attainment" id="edit_attainment">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="honor" class="col-3 col-form-label">Honor</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="honor" id="edit_honor">
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="edit"><i class="fa fa-edit"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="educational_attainment_delete">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Educational Attainament</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="employee_educational_attainment_delete.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="delete_id">
                <input type="hidden" name="employee_id" id="delete_employee_id">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Level</label>
                        <div class="col-9">
                            <select class="form-control" name="level" id="delete_level" style="width: 100%;" disabled>
                                <option selected="selected" disabled>- Select -</option>
                                <option value="1">Primary</option>
                                <option value="2">Tertiary</option>
                                <option value="3">Vocational</option>
                                <option value="4">Graduate</option>
                                <option value="5">Post Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="school_name" class="col-3 col-form-label">School Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="school_name" id="delete_school_name" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sy_from" class="col-3 col-form-label">S.Y. From</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="sy_from" id="delete_sy_from" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sy_to" class="col-3 col-form-label">S.Y. To</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="sy_to" id="delete_sy_to" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="attainment" class="col-3 col-form-label">Attainament</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="attainment" id="delete_attainment" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="honor" class="col-3 col-form-label">Honor</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="honor" id="delete_honor" disabled>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="delete"><i class="fas fa-trash"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>