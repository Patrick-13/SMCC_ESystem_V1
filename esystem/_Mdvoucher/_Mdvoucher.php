<!-- add voucher -->
<div class="modal fade" id="add_vouchertype">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Student Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="voucher_settings_add.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-lg-3 col-form-label">Voucher Type<span style="color:red;"
                                class="astris">*</span></label>
                       <div class="col-lg-12">
                            <input type="text" class="form-control" name="_vouchertype" id="_vouchertype">
                        </div>

                        <label class="col-lg-3 col-form-label">Tutition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_vtuitionfee" id="_vtuitionfee">
                        </div>
                 
                    
                     
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="addvoucher"><i
                            class="nav-icon fas fa-plus"></i> Add Voucher Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit voucher -->
<div class="modal fade" id="voucher_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Voucher Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="voucher_settings_edit.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id" id="edit_id" required>
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-lg-3 col-form-label">Voucher Type<span style="color:red;"
                                class="astris">*</span></label>
                       <div class="col-lg-12">
                            <input type="text" class="form-control" name="_vouchertype" id="edit_vouchertype">
                        </div>

                        <label class="col-lg-3 col-form-label">Tutition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_vtuitionfee" id="edit_vtuitionfee">
                        </div>
                 
                    
                     
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="editvoucher"><i
                            class="nav-icon fas fa-edit"></i> Edit Voucher Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete voucher -->
<div class="modal fade" id="voucher_delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Voucher Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="voucher_settings_delete.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id" id="delete_id" required>
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-lg-3 col-form-label">Voucher Type<span style="color:red;"
                                class="astris">*</span></label>
                       <div class="col-lg-12">
                            <input type="text" class="form-control" name="_vouchertype" id="delete_vouchertype" disabled>
                        </div>

                        <label class="col-lg-3 col-form-label">Tutition Fee<span style="color:red;"
                                class="astris">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="_vtuitionfee" id="delete_vtuitionfee" disabled>
                        </div>
                 
                    
                     
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm" name="deletevoucher"><i
                            class="nav-icon fas fa-trash"></i> Delete Voucher Type</button>
                </div>
            </form>
        </div>
    </div>
</div>