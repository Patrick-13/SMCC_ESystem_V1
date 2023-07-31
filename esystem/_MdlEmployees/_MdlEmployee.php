<div class="modal fade" id="faculty_n_staff_add">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="employee_add.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basic_information_tab" data-toggle="pill" href="#basic_information" role="tab" aria-controls="basic_information" aria-selected="true">Basic Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="statutory_information_tab" data-toggle="pill" href="#statutory_information" role="tab" aria-controls="statutory_information" aria-selected="false">Statutory Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home_address_tab" data-toggle="pill" href="#home_address" role="tab" aria-controls="home_address" aria-selected="false">Home Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact_details_tab" data-toggle="pill" href="#contact_details" role="tab" aria-controls="contact_details" aria-selected="false">Contact Details</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <!-- Basic Information -->
                                <div class="tab-pane fade show active" id="basic_information" role="tabpanel" aria-labelledby="basic_information_tab">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <label for="firstname">Employee ID<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?php
                                                                                                                                $sql = "SELECT * FROM employees ORDER BY id  DESC";
                                                                                                                                $query = $conn->query($sql);
                                                                                                                                $row = $query->fetch_assoc();
                                                                                                                                $id_num = $row['id'] + 1;
                                                                                                                                $currentyear = date("Y");
                                                                                                                                $lastyear = date("Y") - 1;

                                                                                                                                echo $currentyear . $lastyear . "0" . $id_num;
                                                                                                                                ?>" readonly required>
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="middlename">Hired Date<span style="color:red;" class="astris">*</span></label>
                                            <input type="date" class="form-control" name="hired_date" id="hired_date">
                                        </div>
                                    </div>
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
                                                <option value="0" disabled selected>- Select -</option>
                                                <option value="0">N/A</option>
                                                <option value="sr">Sr.</option>
                                                <option value="jr">Jr.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Nick Name<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="nickname" id="nickname" required>
                                        </div>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label for="birth_place">Birth Place<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="birth_place" id="birth_place" required>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="religion">Religion<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="religion" id="religion" required>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="nationality">Nationality<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="nationality" id="nationality" required>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                <!-- Statutory Information -->
                                <div class="tab-pane fade" id="statutory_information" role="tabpanel" aria-labelledby="statutory_information_tab">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="sss">SSS</label>
                                            <input type="text" class="form-control" name="sss" id="sss">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="pag_ibig">Pag-IBIG</label>
                                            <input type="text" class="form-control" name="pag_ibig" id="pag_ibig">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="phic">PHIC</label>
                                            <input type="text" class="form-control" name="phic" id="phic">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="tin">TIN</label>
                                            <input type="text" class="form-control" name="tin" id="tin">
                                        </div>
                                    </div>
                                </div>
                                <!-- Home Address Information -->
                                <div class="tab-pane fade" id="home_address" role="tabpanel" aria-labelledby="home_address_tab">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="permanent_region" class="control-label">Region<span style="color:red;" class="astris">*</span></label>
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
                                            <label for="province" class="control-label">Province<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" id="province" name="province" required>
                                                <option disabled selected>Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="municity" class="control-label">Municipality/City<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" id="municity" name="municity" reqiured>
                                                <option disabled selected>Select</option>
                                            </select>
                                        </div>
                                        <div class=" col-xl-6">
                                            <label for="barangay" class="control-label">Barangay<span style="color:red;" class="astris">*</span></label>
                                            <select class="form-control" id="barangay" name="barangay" required>
                                                <option disabled selected>Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="address" class="control-label">Street No./Apartment Bldg./Prk. Name<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="zipcode" class="control-label">Zip Code<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" id="zipcode" name="zipcode">
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
                                            <label for="emerg_name">Name<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_name" id="emerg_name" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="emerg_contact">Contact Number<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_contact" id="emerg_contact" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="emerg_relationship">Relationship<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_relationship" id="emerg_relationship" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="emerg_address">Address<span style="color:red;" class="astris">*</span></label>
                                            <input type="text" class="form-control" name="emerg_address" id="emerg_address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add"><i class="nav-icon fas fa-user-plus"></i> Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>