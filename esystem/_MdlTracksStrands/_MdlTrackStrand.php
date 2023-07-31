<div class="modal fade" id="track_strand_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Strand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="track_strand_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Track Name<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-10">
                            <select class="form-control" name="track_name" id="track_name" style="width: 100%;" required>
                                <option selected="selected" disabled>- Select -</option>
                                <option value="1">Academic Track</option>
                                <option value="2">Arts and Design</option>
                                <option value="3">Sports</option>
                                <option value="4">Technical Vocational Livelihood</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Strand<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="strand_name" id="strand_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Strand Code<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="strand_code" id="strand_code" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-plus"></i> Add Strand</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="track_strand_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Strand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="track_strand_edit.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Track Name<span style="color:red;" class="astris">*</span></label>

                        <div class="col-lg-10">
                            <select class="form-control" name="track_name" id="edit_track_name" style="width: 100%;" required>
                                <option selected="selected" disabled>- Select -</option>
                                <option value="1">Academic Track</option>
                                <option value="2">Arts and Design</option>
                                <option value="3">Sports</option>
                                <option value="4">Technical Vocational Livelihood</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Strand<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="strand_name" id="edit_strand_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Strand Code<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="strand_code" id="edit_strand_code" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="edit"><i class="nav-icon fas fa-edit"></i> Edit Strand</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="track_strand_delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Strand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="track_strand_delete.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="delete_id">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Track Name<span style="color:red;" class="astris">*</span></label>

                        <div class="col-lg-10">
                            <select class="form-control" name="track_name" id="delete_track_name" style="width: 100%;" disabled required>
                                <option selected="selected" disabled>- Select -</option>
                                <option value="1">Academic Track</option>
                                <option value="2">Arts and Design</option>
                                <option value="3">Sports</option>
                                <option value="4">Technical Vocational Livelihood</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Strand<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="strand_name" id="delete_strand_name" readonly required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Strand Code<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="strand_code" id="delete_strand_code" readonly required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm" name="delete"><i class="nav-icon fas fa-trash"></i> Delete Strand</button>
                </div>
            </form>
        </div>
    </div>
</div>