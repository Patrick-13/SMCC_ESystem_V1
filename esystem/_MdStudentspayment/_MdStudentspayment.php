<!-- add payment -->
<div class="modal fade" id="add_student_or">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Student Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="payment_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-lg-3 col-form-label">OR NO.<span style="color:red;"
                                class="astris">*</span></label>
                       <div class="col-lg-12">
                            <input type="text" class="form-control" name="_paymentorno" id="_paymentorno">
                        </div>

                        <label class="col-lg-3 col-form-label">Type of Payment<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="_top" name="_top" onchange="paymenttype_()" required>
                                <option value="">Select</option>
                                <option value="Paying">SHS-Paying</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <label class="col-lg-3 col-form-label">Student Name<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12" id="showstudidselect">
                            <select class="form-control select2" id="_paymentstudentid" name="_paymentstudentid" required>
                            </select>
                        </div>
                          <div class="col-lg-12" id="showstudidinput" style="display: none;">
                            <input  class="form-control" id="paymentstudentid" name="_paymentstudentid">
                            </div>
                        <label class="col-lg-3 col-form-label">Strand<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentstrand" id="_studentstrand">
                        </div>
                        <label class="col-lg-3 col-form-label">Grade Level<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentgradelvl" id="_studentgradelvl">
                        </div>
                        <label class="col-lg-3 col-form-label">Tuition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studenttuition" id="_studenttuition">
                        </div>
                        <label class="col-lg-4 col-form-label">Partial/Full Payment of<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentpayamount" id="_studentpayamount">
                        </div>
                        <label class="col-lg-4 col-form-label">Balance<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentbalance" id="_studentbalance">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="savepayment"><i
                            class="nav-icon fas fa-plus"></i> Save Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add expenses -->
<div class="modal fade" id="add_expenses">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Student Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="expenses_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-lg-3 col-form-label">OR NO.<span style="color:red;"
                                class="astris">*</span></label>
                       <div class="col-lg-12">
                            <input type="text" class="form-control" name="expenses_paymentorno" id="expenses_paymentorno">
                        </div>
                        <label class="col-lg-3 col-form-label">Name<span style="color:red;"
                                class="astris">*</span></label>
                          <div class="col-lg-12">
                            <input  class="form-control" id="expenses_paymentstudentid" name="expenses_paymentstudentid">
                            </div>
                        
                        <label class="col-lg-4 col-form-label">Partial/Full Payment of<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="expenses_studentpayamount" id="expenses_studentpayamount">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="saveexpenses"><i
                            class="nav-icon fas fa-plus"></i> Save Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit payment -->
<div class="modal fade" id="edit_student_or">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Student Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="payment_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <input type="text" class="editid" name="id">
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-lg-3 col-form-label">OR NO.<span style="color:red;"
                                class="astris">*</span></label>
                       <div class="col-lg-12">
                            <input type="text" class="form-control" name="_paymentorno" id="edit_paymentorno">
                        </div>

                        <label class="col-lg-3 col-form-label">Type of Payment<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <select class="form-control" id="edit_top" name="_top" onchange="paymenttype_()" required>
                                <option value="">Select</option>
                                <option value="Paying">SHS-Paying</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <label class="col-lg-3 col-form-label">Student Name<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12" id="showstudidselect">
                            <select class="form-control select2" id="edit_paymentstudentid" name="_paymentstudentid" required>
                            </select>
                        </div>
                          <div class="col-lg-12" id="showstudidinput" style="display: none;">
                            <input  class="form-control" id="edit_paymentstudentid" name="_paymentstudentid">
                            </div>
                        <label class="col-lg-3 col-form-label">Strand<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentstrand" id="edit_studentstrand">
                        </div>
                        <label class="col-lg-3 col-form-label">Grade Level<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentgradelvl" id="edit_studentgradelvl">
                        </div>
                        <label class="col-lg-3 col-form-label">Tuition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studenttuition" id="edit_studenttuition">
                        </div>
                        <label class="col-lg-4 col-form-label">Partial/Full Payment of<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentpayamount" id="edit_studentpayamount">
                        </div>
                        <label class="col-lg-4 col-form-label">Balance<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_studentbalance" id="edit_studentbalance">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="editpayment"><i
                            class="nav-icon fas fa-plus"></i> Save Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>