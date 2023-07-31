<div class="modal fade" id="section_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="section_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Grade Level</label>
                        <div class="col-lg-4">
                            <select class="select form-control" name="grade_level" id="grade_level" required>
                                <option value="" selected>- Select -</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label">Section Name</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="section_name" id="section_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Class Schedule</label>
                        <div class="col-lg-4">
                            <select class="select form-control" name="class_schedule" id="class_schedule" required>
                                <option value="" disabled selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM schedules";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value=" . $row['id'] . ">" .  $row['schedule_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label">Capacity</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" name="capacity" id="capacity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Advisory</label>
                        <div class="col-lg-10">
                            <select class="select form-control" name="advisor" id="advisor" required>
                                <option disabled selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM employees";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value=" . $row['employee_id'] . ">" .  strtoupper($row['lastname']) . ", " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-plus"></i> Add Section</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="section_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="section_edit.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id" required>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Grade Level</label>
                        <div class="col-lg-4">
                            <select class="select form-control" name="grade_level" id="edit_grade_level" required>
                                <option value="" selected>- Select -</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label">Section Name</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="section_name" id="edit_section_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Class Schedule</label>
                        <div class="col-lg-4">
                            <select class="select form-control" name="class_schedule" id="edit_class_schedule" required>
                                <option value="" disabled selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM schedules";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value=" . $row['id'] . ">" .  $row['schedule_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label">Capacity</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" name="capacity" id="edit_capacity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Advisory</label>
                        <div class="col-lg-10">
                            <select class="select form-control" name="advisor" id="edit_advisor" required>
                                <option disabled selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM employees";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value=" . $row['employee_id'] . ">" .  strtoupper($row['lastname']) . ", " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="edit"><i class="nav-icon fas fa-edit"></i> Edit Section</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="section_delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="section_delete.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="delete_id" required>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Grade Level</label>
                        <div class="col-lg-4">
                            <select class="select form-control" name="grade_level" id="delete_grade_level" disabled>
                                <option value="0" selected>- Select -</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label">Section Name</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="section_name" id="delete_section_name" disabled required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Class Schedule</label>
                        <div class="col-lg-4">
                            <select class="select form-control" name="class_schedule" id="delete_class_schedule" disabled required>
                                <option value="" disabled selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM schedules";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value=" . $row['id'] . ">" .  $row['schedule_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label">Capacity</label>
                        <div class="col-lg-4">
                            <input type="number" class="form-control" name="capacity" id="delete_capacity" disabled required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Advisory</label>
                        <div class="col-lg-10">
                            <select class="select form-control" name="advisor" id="delete_advisor" disabled required>
                                <option disabled selected>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM employees";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value=" . $row['employee_id'] . ">" .  strtoupper($row['lastname']) . ", " . $row['firstname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm" name="delete"><i class="nav-icon fas fa-trash"></i> Delete Section</button>
                </div>
            </form>
        </div>
    </div>
</div>