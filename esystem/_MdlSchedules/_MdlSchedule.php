<div class="modal fade" id="add_schedule">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="schedule_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Schedule Name<span style="color:red;" class="astris">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="schedule_name" id="schedule_name" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-plus"></i> Add Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>