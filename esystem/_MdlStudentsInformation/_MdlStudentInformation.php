<div class="modal fade" id="student_information_add">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Student Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="student_information_add.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basic_information_tab" data-toggle="pill" href="#basic_information" role="tab" aria-controls="basic_information" aria-selected="true">Basic Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="family_information_tab" data-toggle="pill" href="#family_information" role="tab" aria-controls="family_information" aria-selected="false">Family Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home_address_tab" data-toggle="pill" href="#home_address" role="tab" aria-controls="home_address" aria-selected="false">Home Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact_details_tab" data-toggle="pill" href="#contact_details" role="tab" aria-controls="contact_details" aria-selected="false">Contact Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="educational_background_tab" data-toggle="pill" href="#educational_background" role="tab" aria-controls="educational_background" aria-selected="false">Educational Background</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="requirements_tab" data-toggle="pill" href="#requirements" role="tab" aria-controls="requirements" aria-selected="false">Requirements</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="application_addmission_tab" data-toggle="pill" href="#application_addmission" role="tab" aria-controls="application_addmission" aria-selected="true">Application for Admission</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="comment_remarks_tab" data-toggle="pill" href="#comment_remarks" role="tab" aria-controls="comment_remarks" aria-selected="false">Comment & Remarks</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <!-- Basic Information -->
                                <div class="tab-pane fade show active" id="basic_information" role="tabpanel" aria-labelledby="basic_information_tab">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <label for="firstname">First Name<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" required>
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="middlename">Middle Name (Optional)</label>
                                            <input type="text" class="form-control" name="middlename" id="middlename">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="lastname">Last Name<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="suffix">Suffix</label>
                                            <select class="form-control" name="suffix" id="suffix">
                                                <option value="" disabled selected>- Select -</option>
                                                <option value="">None</option>
                                                <option value="sr">Sr.</option>
                                                <option value="jr">Jr.</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label for="gender">Gender<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" name="gender" id="gender" required>
                                                <option disabled selected>- Select -</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="date_of_birth">Date of Birth<span style="color:red;" class="astris">*</span></label>
                                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="birth_place">Birth Place<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="birth_place" id="birth_place" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label for="religion">Religion<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="religion" id="religion" required>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="nationality">Nationality<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="nationality" id="nationality" required>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="civil_status">Civil Status<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" name="civil_status" id="civil_status" required>
                                                <option disabled selected>- Select -</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="widow">Widow</option>
                                                <option value="widower">Widower</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Family Information -->
                                <div class="tab-pane fade" id="family_information" role="tabpanel" aria-labelledby="family_information_tab">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Fathers Name</label>
                                            <input type="text" class="form-control" name="father_name" id="father_name">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Occupation</label>
                                            <input type="text" class="form-control" name="father_occupation" id="father_occupation">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Monthly Income</label>
                                            <input type="text" class="form-control" name="father_mi" id="father_mi">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="father_cellphone_no">Cellphone No.</label>
                                            <input type="text" class="form-control" name="father_cellphone_no" id="father_cellphone_no">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Mothers Name</label>
                                            <input type="text" class="form-control" name="mother_name" id="mother_name">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Occupation</label>
                                            <input type="text" class="form-control" name="mother_occupation" id="mother_occupation">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Monthly Income</label>
                                            <input type="text" class="form-control" name="mother_mi" id="mother_mi">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Cellphone No.</label>
                                            <input type="text" class="form-control" name="mother_cellphone_no" id="mother_cellphone_no">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Presently Staying with?</label>
                                            <input type="text" class="form-control" name="psw" id="psw">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="psw_address" id="psw_address">
                                        </div>
                                    </div>
                                </div>
                                <!-- Home Address Information -->
                                <div class="tab-pane fade" id="home_address" role="tabpanel" aria-labelledby="home_address_tab">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="control-label">Region<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" id="region" name="region" required>
                                                <option disabled selected>Select</option>
                                                <?php
                                                $sql = "SELECT * FROM _regiondb";
                                                $query = $conn->query($sql);
                                                while ($row = $query->fetch_assoc()) {
                                                    echo "<option id='" . $row['code'] . "' value='" . $row['code'] . "'>" . $row['name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class=" col-xl-6">
                                            <label class="control-label">Province<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" id="province" name="province" required>
                                                <option disabled selected>Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="control-label">Municipality/City<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" id="municity" name="municity" reqiured>
                                                <option disabled selected>Select</option>
                                            </select>
                                        </div>
                                        <div class=" col-xl-6">
                                            <label class="control-label">Barangay<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" id="barangay" name="barangay" required>
                                                <option disabled selected>Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="control-label">Address<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Street No./Apartment Bldg./Prk. Name" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="control-label">Zip Code<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code">
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact Details -->
                                <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="contact_details_tab">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="telephone_number">Telephone Number</label>
                                            <input type="text" class="form-control" name="telephone_number" id="telephone_number">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="cellphone_number">Cellphone Number<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="cellphone_number" id="cellphone_number" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="primary_email">Primary Email<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="primary_email" id="primary_email">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="secondary_email">Secondary Email</label>
                                            <input type="text" class="form-control" name="secondary_email" id="secondary_email">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label style="color:red;">Emergency Contact</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Name<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_name" id="emerg_name" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Cellphone Number<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_cellphone_no" id="emerg_cellphone_no" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Relationship<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_relationship" id="emerg_relationship" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Address<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_address" id="emerg_address" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Educational Background -->
                                <div class="tab-pane fade" id="educational_background" role="tabpanel" aria-labelledby="educational_background_tab">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Elementary</label>
                                            <input type="text" class="form-control" name="elem_name" id="elem_name">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="elem_address" id="elem_address">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Year Graduated</label>
                                            <input type="text" class="form-control" name="elem_yg" id="elem_yg">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Honors/Awards</label>
                                            <input type="text" class="form-control" name="elem_honors" id="elem_honors">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Junior High School</label>
                                            <input type="text" class="form-control" name="junior_name" id="junior_name">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="junior_address" id="junior_address">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>Year Graduated</label>
                                            <input type="text" class="form-control" name="junior_yg" id="junior_yg">
                                        </div>
                                        <div class="col-xl-6">
                                            <label>Honors/Awards</label>
                                            <input type="text" class="form-control" name="junior_honors" id="junior_honors">
                                        </div>
                                    </div>
                                </div>
                                <!-- Requirements -->
                                <div class="tab-pane fade" id="requirements" role="tabpanel" aria-labelledby="requirements_tab">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="f138" id="f138">
                                                <label class="form-check-label">Form 138</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="f137" id="f137">
                                                <label class="form-check-label">Form 137</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="good_moral" id="good_moral">
                                                <label class="form-check-label">Good Moral</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="psa" id="psa">
                                                <label class="form-check-label">NSO/PSA (Original Copy)</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="coc" id="coc">
                                                <label class="form-check-label">Certificate of Completion</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="idpic" id="idpic">
                                                <label class="form-check-label">2x2 ID Picture</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sf10" id="sf10">
                                                <label class="form-check-label">SF10</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sf9" id="sf9">
                                                <label class="form-check-label">SF9</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Application for Admission -->
                                <div class="tab-pane fade" id="application_addmission" role="tabpanel" aria-labelledby="statutory_information_tab">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Date Application<span style="color:red;" class="astris">*</span></label>
                                            <input type="date" class="form-control" name="date_application" id="date_application" required>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="student_id">Student ID<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="student_id" id="student_id" value="<?php
                                                                                                                                $sql_sy = "SELECT * FROM school_year WHERE delstatus = 1";
                                                                                                                                $query_sy = $conn->query($sql_sy);
                                                                                                                                $row_sy = $query_sy->fetch_assoc();
                                                                                                                                $active_school_year = $row_sy['school_year'];

                                                                                                                                $sql = "SELECT * FROM students_information ORDER BY id DESC";
                                                                                                                                $query = $conn->query($sql);

                                                                                                                                if ($query->num_rows < 1) {
                                                                                                                                    $id_num = 0;
                                                                                                                                } else {
                                                                                                                                    $row = $query->fetch_assoc();
                                                                                                                                    $id_num = $row['id'] + 1;
                                                                                                                                }



                                                                                                                                echo $active_school_year . "0" . $id_num;
                                                                                                                                ?>" required readonly>
                                        </div>
                                        <div class="col-xl-4">
                                            <!-- <label>School Year<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" name="school_year" id="school_year">
                                                <option value="0" disabled selected>- Select -</option>
                                                <?php
                                                // $sql = "SELECT * FROM school_year WHERE delstatus = 1";
                                                // $query = $conn->query($sql);
                                                // while ($row = $query->fetch_assoc()) {
                                                //     echo "<option value='" . $row['id'] . "'>" . $row['school_year'] . "</option>";
                                                // }
                                                ?>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Scholarship<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" name="scholarship" id="scholarship">
                                                <option value="0" disabled selected>- Select -</option>
                                                <option value="1">Paying</option>
                                                <option value="2">DepEd Voucher</option>
                                                <option value="3">ESC</option>
                                                <option value="4">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Scholarship Name<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="scholarship_name" id="scholarship_name" value="" required>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>ID/VOUCHER Number<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="idvoucher_number" id="idvoucher_number">
                                        </div>
                                    </div>

                                </div>
                                <!-- Comment and Remarks -->
                                <div class="tab-pane fade" id="comment_remarks" role="tabpanel" aria-labelledby="comment_remarks_tab">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <label>Comment</label>
                                            <textarea type="text" class="form-control" name="comment" id="comment"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group" style="text-align: center;">
                                        <div class="col-xl-12">
                                            <input type="checkbox" class="form-check-input" name="terms" id="terms" style="padding:0; margin:10;">
                                            <label class="form-check-label">I hereby certify that the above information
                                                I have provided are true and correct. I adhere upon enrollment and agree
                                                to abide by the Rules and Regulations, without mental reservations and I
                                                promise to uphold its name as a true SMCC student.</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <label>Encoded By</label>
                                            <input type="elementary_name" class="form-control" name="encoded_by" id="encoded_by" value="<?php echo $user['firstname'] . " " . $user['lastname']; ?>" style="text-align:center;" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-user-plus"></i> Add Student Information</button>
                </div>
            </form>
        </div>
    </div>
</div>