<div class="modal fade" id="user_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="user_type" id="user_type" style="width: 100%;">
                                <option selected="selected" disabled>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM `user_types` WHERE `delstatus` = 1";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['user_type'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="employee" id="employee" style="width: 100%;">
                                <option selected="selected" disabled>- Select -</option>
                                <?php
                                $sql = "SELECT * FROM employees";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value=" . $row['employee_id'] . ">" . strtoupper($row['lastname']) . ", " . $row['firstname'] . " " . $row['middlename'] . "</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-user-plus"></i> Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>