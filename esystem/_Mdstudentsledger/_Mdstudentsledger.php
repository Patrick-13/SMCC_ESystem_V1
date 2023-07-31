<!-- add ledger -->
<div class="modal fade" id="add_student_ledger">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Student Ledger</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="ledger_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">

                        <label class="col-lg-3 col-form-label">School Year<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="_ledgersy" name="_ledgersy" required>
                                <option disabled selected>Select</option>
                                <?php
                                                $sql = "SELECT DISTINCT(YEAR(enrollment_date)) as sy FROM admission";
                                                $query = $conn->query($sql);
                                                while ($row = $query->fetch_assoc()) {
                                                    echo "<option id='" . $row['sy'] . "' value='" . $row['sy'] . "'>" . $row['sy'] ."</option>";
                                                }
                                                ?>
                            </select>
                        </div>

                        <label class="col-lg-3 col-form-label">Student Name<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control select2" id="_ledgerstudentid" name="_ledgerstudentid" required>
                            <option value="">Select</option>
                            </select>
                        </div>
                        <label class="col-lg-3 col-form-label">Strand<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_ledgerstrand" id="_ledgerstrand">
                        </div>
                        <label class="col-lg-3 col-form-label">Voucher type<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="_ledgerpayment" name="_ledgerpayment" required>
                            <option disabled selected>Select</option>
                                <?php
                                                $sql = "SELECT * from `voucher` where `v_delstatus` = 1";
                                                $query = $conn->query($sql);
                                                while ($row = $query->fetch_assoc()) {
                                                    echo "<option id='" . $row['id'] . "' value='" . $row['id'] . "'>" . $row['voucher_type'] ."</option>";
                                                }
                                                ?>
                            </select>
                        </div>
                        <label class="col-lg-3 col-form-label">Tuition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_ledgertuitionfee" id="_ledgertuitionfee">

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="addledger"><i
                            class="nav-icon fas fa-plus"></i> Add Ledger</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit ledger -->
<div class="modal fade" id="ledger_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Student Ledger</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id" required>
                <div class="modal-body">
                    <div class="form-group">

                        <label class="col-lg-3 col-form-label">School Year<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="edit_ledgersy" name="_ledgersy" required>
                                <option disabled selected>Select</option>
                                <?php
                                                $sql = "SELECT YEAR(enrollment_date) as sy FROM admission";
                                                $query = $conn->query($sql);
                                                while ($row = $query->fetch_assoc()) {
                                                    echo "<option id='" . $row['sy'] . "' value='" . $row['sy'] . "'>" . $row['sy'] ."</option>";
                                                }
                                                ?>
                            </select>
                        </div>
                        <label class="col-lg-3 col-form-label">Student Name<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="edit_ledgerstudentid" name="_ledgerstudentid" required>
                            </select>
                        </div>
                        <label class="col-lg-3 col-form-label">Strand<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_ledgerstrand" id="edit_ledgerstrand">
                        </div>
                        <label class="col-lg-3 col-form-label">Voucher type<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="edit_ledgerpayment" name="_ledgerpayment" required>
                                <option value="">Select</option>
                                <option value="SHS-VP">SHS-VP</option>
                                <option value="ECS">ECS</option>
                                <option value="Paying">Paying</option>
                            </select>
                        </div>
                        <label class="col-lg-3 col-form-label">Tuition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_ledgertuitionfee" id="edit_ledgertuitionfee">

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="editlegder"><i
                            class="nav-icon fas fa-plus"></i> Edit Ledger</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete ledger -->
<div class="modal fade" id="ledger_delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Student Ledger</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" id="delete_id" required>
                <div class="modal-body">
                    <div class="form-group">

                        <label class="col-lg-3 col-form-label">School Year<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="delete_ledgersy" name="_ledgersy" disabled>
                                <option disabled selected>Select</option>
                                <?php
                                                $sql = "SELECT YEAR(enrollment_date) as sy FROM admission";
                                                $query = $conn->query($sql);
                                                while ($row = $query->fetch_assoc()) {
                                                    echo "<option id='" . $row['sy'] . "' value='" . $row['sy'] . "'>" . $row['sy'] ."</option>";
                                                }
                                                ?>
                            </select>
                        </div>

                        <label class="col-lg-3 col-form-label">Student Name<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="delete_ledgerstudentid" name="_ledgerstudentid" disabled>
                            </select>
                        </div>
                        <label class="col-lg-3 col-form-label">Strand<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_ledgerstrand" id="delete_ledgerstrand"
                                disabled>
                        </div>
                        <label class="col-lg-3 col-form-label">Voucher type<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="delete_ledgerpayment" name="_ledgerpayment" disabled>
                                <option value="">Select</option>
                                <option value="SHS-VP">SHS-VP</option>
                                <option value="ECS">ECS</option>
                                <option value="Paying">Paying</option>
                            </select>
                        </div>
                        <label class="col-lg-3 col-form-label">Tuition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_ledgertuitionfee"
                                id="delete_ledgertuitionfee" disabled>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="editlegder"><i
                            class="nav-icon fas fa-plus"></i> Edit Ledger</button>
                </div>
            </form>
        </div>
    </div>
</div>