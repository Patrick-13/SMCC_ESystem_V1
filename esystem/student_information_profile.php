<!DOCTYPE html>
<html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMCC E-System | Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Student Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Master List</a></li>
                                <li class="breadcrumb-item"><a href="students_information.php">Student Information</a></li>
                                <li class="breadcrumb-item"><a>Student Profile</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="container-fluid">
                    <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <?php
                                    $student_id = htmlspecialchars($_GET['student_id']);
                                    // $active = htmlspecialchars($_GET['active']);

                                    $sql = "SELECT *, 
                                    _barangaydb.name AS barangay, _barangaydb.code AS barangay_code,
                                    _municitydb.name AS municity, _municitydb.code AS municity_code,
                                    _provincedb.name AS province, _provincedb.code AS province_code
                                    FROM students_information 
                                    LEFT JOIN tracks_strands ON students_information.strand = tracks_strands.id
                                    LEFT JOIN _barangaydb ON students_information.barangay = _barangaydb.code
                                    LEFT JOIN _municitydb ON students_information.municity = _municitydb.code
                                    LEFT JOIN _provincedb ON students_information.province = _provincedb.code 
                                    WHERE students_information.student_id = '$student_id'";
                                    $query = $conn->query($sql);
                                    $student = $query->fetch_assoc();

                                    ?>
                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img src="<?php echo (!empty($employee['photo'])) ? '../img/employees/' . $employee['photo'] : '../img/profile.jpg'; ?>" class="img-circle" alt="User Image" style="width:50%; height:120px;">
                                            </div>
                                            <h3 class="profile-username text-center"><?php echo htmlspecialchars($student['firstname']) . " " . htmlspecialchars($student['middlename']) . " " . htmlspecialchars($student['lastname']) ?></h3>
                                            <p class="text-muted text-center" style="margin:0; padding:0;">Student ID: <?php echo $student['student_id']; ?></p>
                                            <p class="text-muted text-center" style="margin:0; padding:0;">ID/Voucher Number: <?php echo htmlspecialchars($student['idvoucher_number']); ?></p>
                                            <p class="text-muted text-center" style="margin:0; padding:0;">Application Date: <?php echo date('M. Y', htmlspecialchars(strtotime($student['date_application']))); ?></p>

                                            <?php
                                            // if ($active == 1) {
                                            //     echo "<a href='#'><p class='text-center' style='color:#007bff; margin:0; padding:0;'>Active</p></a>";
                                            // } else {
                                            //     echo "<a href='#'><p class='text-center' style='color:#dc3545; margin:0; padding:0;'>Not Active</p></a>";
                                            // }
                                            ?>


                                            <!-- <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Followers</b> <a class="float-right">1,322</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Following</b> <a class="float-right">543</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Friends</b> <a class="float-right">13,287</a>
                                                </li>
                                            </ul>

                                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">About Me</h3>
                                        </div>
                                        <div class="card-body">

                                            <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Quick Information</strong>

                                            <br><br>
                                            <strong><i class="fa fa-thumb-tack" aria-hidden="true"></i> Address & Contact Details</strong>

                                            <p class="text-muted">
                                                <span class="tag tag-danger"><b>Address: </b><?php echo $student['address'] . ", " . $student['barangay'] . ", " . $student['municity'] . ", " . $student['province'] ?></span><br>
                                                <span class="tag tag-success"><b>Contact Number: </b><?php echo $student['cellphone_number'] ?></span><br>
                                                <span class="tag tag-info"><b>E-Address: </b><?php echo $student['primary_email'] ?></span><br>
                                            </p>

                                            <strong><i class="fa fa-thumb-tack" aria-hidden="true"></i> Emergency Contact</strong>

                                            <p class="text-muted">
                                                <span class="tag tag-danger"><b>Name: </b><?php echo $student['emerg_name'] ?></span><br>
                                                <span class="tag tag-success"><b>Relationship: </b><?php echo $student['emerg_relationship'] ?></span><br>
                                                <span class="tag tag-info"><b>Address: </b><?php echo $student['emerg_address'] ?></span><br>
                                                <span class="tag tag-warning"><b>Contact #: </b><?php echo $student['emerg_cellphone_no'] ?></span>
                                            </p>

                                            <strong><i class="far fa-file-alt mr-1"></i> Comment</strong>
                                            <p class="text-muted"><?php echo $student['comment']; ?></p>

                                            <hr>

                                            <button type="submit" class="btn btn-info btn-sm" name="edit_basic_information" id="edit_basic_information"><i class="nav-icon fas fa-folder"></i> Financial Records</button>
                                            <button type="submit" class="btn btn-primary btn-sm" name="edit_basic_information" id="edit_basic_information"><i class="nav-icon fas fa-file"></i> Admission Records</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
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
                                                <li class="nav-item">
                                                    <a class="nav-link" id="request_files_tab" data-toggle="pill" href="#request_files" role="tab" aria-controls="request_files" aria-selected="false">Request Files</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                                <!-- basic information -->
                                                <div class="tab-pane fade show active" id="basic_information" role="tabpanel" aria-labelledby="basic_information_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>" readonly required>
                                                        <div class="row">
                                                            <div class="col-xl-3">
                                                                <label>First Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $student['firstname']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <label>Middle Name (Optional)</label>
                                                                <input type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $student['middlename']; ?>">
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <label for="lastname">Last Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $student['lastname']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <label for="suffix">Suffix</label>
                                                                <select class="form-control" name="suffix" id="suffix">
                                                                    <?php
                                                                    if ($student['suffix'] == "") {
                                                                        echo "<option value='' disabled>- Select -</option>";
                                                                        echo "<option value='' selected>N/A</option>";
                                                                        echo "<option value='sr'>Sr.</option>";
                                                                        echo "<option value='jr'>Jr.</option>";
                                                                    } else if ($student['suffix'] == "sr") {
                                                                        echo "<option value='' disabled>- Select -</option>";
                                                                        echo "<option value=''>N/A</option>";
                                                                        echo "<option value='sr' selected>Sr.</option>";
                                                                        echo "<option value='jr'>Jr.</option>";
                                                                    } else if ($student['suffix'] == "sr") {
                                                                        echo "<option value='' disabled>- Select -</option>";
                                                                        echo "<option value=''>N/A</option>";
                                                                        echo "<option value='sr'>Sr.</option>";
                                                                        echo "<option value='jr'selected>Jr.</option>";
                                                                    } else {
                                                                        echo "<option value='' disabled selected>- Select -</option>";
                                                                        echo "<option value=''>N/A</option>";
                                                                        echo "<option value='sr'>Sr.</option>";
                                                                        echo "<option value='jr'>Jr.</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <label for="gender">Gender<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" name="gender" id="gender" required>
                                                                    <?php
                                                                    if ($student['gender'] == "male") {
                                                                        echo "<option disabled>- Select -</option>";
                                                                        echo "<option value='male' selected>Male</option>";
                                                                        echo "<option value='female'>Female</option>";
                                                                    } else if ($student['gender'] == "female") {
                                                                        echo "<option disabled>- Select -</option>";
                                                                        echo "<option value='male'>Male</option>";
                                                                        echo "<option value='female' selected>Female</option>";
                                                                    } else {
                                                                        echo "<option disabled selected>- Select -</option>";
                                                                        echo "<option value='male'>Male</option>";
                                                                        echo "<option value='female'>Female</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="date_of_birth">Date of Birth<span style="color:red;" class="astris">*</span></label>
                                                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $student['date_of_birth']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="birth_place">Birth Place<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="birth_place" id="birth_place" value="<?php echo $student['birth_place']; ?>" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <label for="religion">Religion<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="religion" id="religion" value="<?php echo $student['religion']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="nationality">Nationality<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $student['nationality']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="civil_status">Civil Status<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" name="civil_status" id="civil_status" required>
                                                                    <?php
                                                                    if ($student['civil_status'] == "single") {
                                                                        echo "<option disabled>- Select -</option>";
                                                                        echo "<option value='single' selected>Single</option>";
                                                                        echo "<option value='married'>Married</option>";
                                                                        echo "<option value='widow'>Widow</option>";
                                                                        echo "<option value='widower'>Widower</option>";
                                                                    } else if ($student['civil_status'] == "married") {
                                                                        echo "<option disabled>- Select -</option>";
                                                                        echo "<option value='single'>Single</option>";
                                                                        echo "<option value='married' selected>Married</option>";
                                                                        echo "<option value='widow'>Widow</option>";
                                                                        echo "<option value='widower'>Widower</option>";
                                                                    } else if ($student['civil_status'] == "widow") {
                                                                        echo "<option disabled>- Select -</option>";
                                                                        echo "<option value='single'>Single</option>";
                                                                        echo "<option value='married'>Married</option>";
                                                                        echo "<option value='widow' selected>Widow</option>";
                                                                        echo "<option value='widower'>Widower</option>";
                                                                    } else if ($student['civil_status'] == "widower") {
                                                                        echo "<option disabled>- Select -</option>";
                                                                        echo "<option value='single'>Single</option>";
                                                                        echo "<option value='married'>Married</option>";
                                                                        echo "<option value='widow'>Widow</option>";
                                                                        echo "<option value='widower' selected>Widower</option>";
                                                                    } else {
                                                                        echo "<option disabled selected>- Select -</option>";
                                                                        echo "<option value='single'>Single</option>";
                                                                        echo "<option value='married'>Married</option>";
                                                                        echo "<option value='widow'>Widow</option>";
                                                                        echo "<option value='widower'>Widower</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_basic_information" id="edit_basic_information"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- family information -->
                                                <div class="tab-pane fade" id="family_information" role="tabpanel" aria-labelledby="family_information_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Fathers Name</label>
                                                                <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo $student['father_name']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Occupation</label>
                                                                <input type="text" class="form-control" name="father_occupation" id="father_occupation" value="<?php echo $student['father_occupation']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Monthly Income</label>
                                                                <input type="text" class="form-control" name="father_mi" id="father_mi" value="<?php echo $student['father_mi']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="father_cellphone_no">Cellphone No.</label>
                                                                <input type="text" class="form-control" name="father_cellphone_no" id="father_cellphone_no" value="<?php echo $student['father_cellphone_no']; ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Mothers Name</label>
                                                                <input type="text" class="form-control" name="mother_name" id="mother_name" value="<?php echo $student['mother_name']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Occupation</label>
                                                                <input type="text" class="form-control" name="mother_occupation" id="mother_occupation" value="<?php echo $student['mother_occupation']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Monthly Income</label>
                                                                <input type="text" class="form-control" name="mother_mi" id="mother_mi" value="<?php echo $student['mother_mi']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Cellphone No.</label>
                                                                <input type="text" class="form-control" name="mother_cellphone_no" id="mother_cellphone_no" value="<?php echo $student['mother_cellphone_no']; ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Presently Staying with?</label>
                                                                <input type="text" class="form-control" name="psw" id="psw" value="<?php echo $student['psw']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="psw_address" id="psw_address" value="<?php echo $student['psw_address']; ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_family_information" id="edit_family_information"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- home address information -->
                                                <div class="tab-pane fade" id="home_address" role="tabpanel" aria-labelledby="home_address_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label class="control-label">Region<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="region" name="region" required>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _regiondb";
                                                                    $query = $conn->query($sql);
                                                                    while ($region_row = $query->fetch_assoc()) {
                                                                        if ($region_row['code'] == $student['region']) {
                                                                            echo "<option value='" . $region_row['code'] . "' selected>" . $region_row['name'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $region_row['code'] . "'>" . $region_row['name'] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class=" col-xl-6">
                                                                <label class="control-label">Province<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="province" name="province" required>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _provincedb WHERE national='" . $student['region'] . "'";
                                                                    $query = $conn->query($sql);
                                                                    while ($province_row = $query->fetch_assoc()) {
                                                                        if ($province_row['code'] == $student['province_code']) {
                                                                            echo "<option value='" . $province_row['code'] . "' selected>" . $province_row['name'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $province_row['code'] . "'>" . $province_row['name'] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label class="control-label">Municipality/City<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="municity" name="municity" reqiured>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _municitydb WHERE province='" . $student['province_code'] . "'";
                                                                    $query = $conn->query($sql);
                                                                    while ($municity_row = $query->fetch_assoc()) {
                                                                        if ($municity_row['code'] == $student['municity_code']) {
                                                                            echo "<option value='" . $municity_row['code'] . "' selected>" . $municity_row['name'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $municity_row['code'] . "'>" . $municity_row['name'] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class=" col-xl-6">
                                                                <label class="control-label">Barangay<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="barangay" name="barangay" required>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _barangaydb WHERE municity='" . $student['municity_code'] . "'";
                                                                    $query = $conn->query($sql);
                                                                    while ($barangay_row = $query->fetch_assoc()) {
                                                                        if ($barangay_row['code'] == $student['barangay_code']) {
                                                                            echo "<option value='" . $barangay_row['code'] . "' selected>" . $barangay_row['name'] . "</option>";
                                                                        } else {
                                                                            echo "<option value='" . $barangay_row['code'] . "'>" . $barangay_row['name'] . "</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label class="control-label">Address<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $student['address']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label class="control-label">Zip Code<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" id="zip_code" name="zip_code" value="<?php echo $student['zip_code']; ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_home_address" id="edit_home_address"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- contact details -->
                                                <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="contact_details_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="telephone_number">Telephone Number</label>
                                                                <input type="text" class="form-control" name="telephone_number" id="telephone_number" value="<?php echo $student['telephone_number']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="cellphone_number">Cellphone Number<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="cellphone_number" id="cellphone_number" value="<?php echo $student['cellphone_number']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="primary_email">Primary Email<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="primary_email" id="primary_email" value="<?php echo $student['primary_email']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="secondary_email">Secondary Email</label>
                                                                <input type="text" class="form-control" name="secondary_email" id="secondary_email" value="<?php echo $student['secondary_email']; ?>">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class=" row">
                                                            <label style="color:red;">Emergency Contact</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_name" id="emerg_name" value="<?php echo $student['emerg_name']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Cellphone Number<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_cellphone_no" id="emerg_cellphone_no" value="<?php echo $student['emerg_cellphone_no']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Relationship<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_relationship" id="emerg_relationship" value="<?php echo $student['emerg_relationship']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Address<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_address" id="emerg_address" value="<?php echo $student['emerg_address']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_contact_details" id="edit_contact_details"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- educational background -->
                                                <div class="tab-pane fade" id="educational_background" role="tabpanel" aria-labelledby="educational_background_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Elementary</label>
                                                                <input type="text" class="form-control" name="elem_name" id="elem_name" value="<?php echo $student['elem_name']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="elem_address" id="elem_address" value="<?php echo $student['elem_address']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Year Graduated</label>
                                                                <input type="text" class="form-control" name="elem_yg" id="elem_yg" value="<?php echo $student['elem_yg']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Honors/Awards</label>
                                                                <input type="text" class="form-control" name="elem_honors" id="elem_honors" value="<?php echo $student['elem_honors']; ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Junior High School</label>
                                                                <input type="text" class="form-control" name="junior_name" id="junior_name" value="<?php echo $student['junior_name']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="junior_address" id="junior_address" value="<?php echo $student['junior_address']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label>Year Graduated</label>
                                                                <input type="text" class="form-control" name="junior_yg" id="junior_yg" value="<?php echo $student['junior_yg']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label>Honors/Awards</label>
                                                                <input type="text" class="form-control" name="junior_honors" id="junior_honors" value="<?php echo $student['junior_honors']; ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_educational_background" id="edit_educational_background"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- requirements -->
                                                <div class="tab-pane fade" id="requirements" role="tabpanel" aria-labelledby="requirements_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['f138'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='f138' id='f138' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='f138' id='f138'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">Form 138</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['f137'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='f137' id='f137' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='f137' id='f137'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">Form 137</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['good_moral'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='good_moral' id='good_moral' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='good_moral' id='good_moral'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">Good Moral</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['psa'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='psa' id='psa' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='psa' id='psa'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">NSO/PSA (Original Copy)</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['coc'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='coc' id='coc' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='coc' id='coc'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">Certificate of Completion</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['idpic'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='idpic' id='idpic' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='idpic' id='idpic'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">2x2 ID Picture</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['sf10'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='sf10' id='sf10' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='sf10' id='sf10'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">SF10</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <?php
                                                                    if ($student['sf9'] == 1) {
                                                                        echo "<input class='form-check-input' type='checkbox' name='sf9' id='sf9' checked>";
                                                                    } else {
                                                                        echo "<input class='form-check-input' type='checkbox' name='sf9' id='sf9'>";
                                                                    }
                                                                    ?>
                                                                    <label class="form-check-label">SF9</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_requirements" id="edit_requirements"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- application for admission -->
                                                <div class="tab-pane fade" id="application_addmission" role="tabpanel" aria-labelledby="statutory_information_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <label>Date Application<span style="color:red;" class="astris">*</span></label>
                                                                <input type="date" class="form-control" name="date_application" id="date_application" value="<?php echo $student['date_application']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="student_id">Student ID<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="student_id_view" id="student_id_view" value="<?php echo $student['student_id']; ?>" readonly required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label>School Year<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" name="school_year" id="school_year">
                                                                    <option value="0" disabled selected>- Select -</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM school_year WHERE delstatus = 1";
                                                                    $query = $conn->query($sql);
                                                                    while ($row_sy = $query->fetch_assoc()) {
                                                                        if ($row_sy['id'] == $student['school_year']) {
                                                                            echo "<option value='" . $row_sy['id'] . "' selected>" . $row_sy['school_year'] . "</option>";
                                                                        }
                                                                        echo "<option value='" . $row_sy['id'] . "'>" . $row_sy['school_year'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <label>Scholarship<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" name="scholarship" id="scholarship">
                                                                    <?php
                                                                    if ($student['scholarship'] == 1) {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='1' selected>Paying</option>";
                                                                        echo "<option value='2'>DepEd Voucher</option>";
                                                                        echo "<option value='3'>ESC</option>";
                                                                        echo "<option value='4'>Others</option>";
                                                                    } else if ($student['scholarship'] == 2) {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='1'>Paying</option>";
                                                                        echo "<option value='2' selected>DepEd Voucher</option>";
                                                                        echo "<option value='3'>ESC</option>";
                                                                        echo "<option value='4'>Others</option>";
                                                                    } else if ($student['scholarship'] == 3) {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='1'>Paying</option>";
                                                                        echo "<option value='2'>DepEd Voucher</option>";
                                                                        echo "<option value='3' selected>ESC</option>";
                                                                        echo "<option value='4'>Others</option>";
                                                                    } else if ($student['scholarship'] == 4) {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='1'>Paying</option>";
                                                                        echo "<option value='2'>DepEd Voucher</option>";
                                                                        echo "<option value='3'>ESC</option>";
                                                                        echo "<option value='4' selected>Others</option>";
                                                                    } else {
                                                                        echo "<option value='0' disabled selected>- Select -</option>";
                                                                        echo "<option value='1'>Paying</option>";
                                                                        echo "<option value='2'>DepEd Voucher</option>";
                                                                        echo "<option value='3'>ESC</option>";
                                                                        echo "<option value='4'>Others</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label>Scholarship Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="scholarship_name" id="scholarship_name" value="<?php echo $student['scholarship_name']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label>ID/VOUCHER Number<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="idvoucher_number" id="idvoucher_number" value="<?php echo $student['idvoucher_number']; ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_application_admission" id="edit_application_admission"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- comment and remarks -->
                                                <div class="tab-pane fade" id="comment_remarks" role="tabpanel" aria-labelledby="comment_remarks_tab">
                                                    <form action="student_information_profile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id; ?>">
                                                        <div class="row">
                                                            <div class="col-xl-3">
                                                                <label for="primary_email">Remarks<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" name="remarks" id="remarks">
                                                                    <?php
                                                                    if ($student['remarks'] == 1) {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='1' selected>New Student</option>";
                                                                        echo "<option value='2'>Transferee Student</option>";
                                                                        echo "<option value='3'>Drop Student</option>";
                                                                    } else if ($student['remarks'] == 2) {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='1'>New Student</option>";
                                                                        echo "<option value='2' selected>Transferee Student</option>";
                                                                        echo "<option value='3'>Drop Student</option>";
                                                                    } else if ($student['remarks'] == 3) {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='1'>New Student</option>";
                                                                        echo "<option value='2'>Transferee Student</option>";
                                                                        echo "<option value='3' selected>Drop Student</option>";
                                                                    } else {
                                                                        echo "<option value='0' disabled selected>- Select -</option>";
                                                                        echo "<option value='1'>New Student</option>";
                                                                        echo "<option value='2'>Transferee Student</option>";
                                                                        echo "<option value='3'>Drop Student</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <label>Comment</label>
                                                                <textarea type="text" class="form-control" name="comment" id="comment"><?php echo $student['comment'] ?></textarea>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group" style="text-align: center;">
                                                            <div class="col-xl-12">
                                                                <?php
                                                                if ($student['terms'] == 1) {
                                                                    echo "<input type='checkbox' class='form-check-input' name='terms' id='terms' style='padding:0; margin:10;' checked>";
                                                                } else {
                                                                    echo "<input type='checkbox' class='form-check-input' name='terms' id='terms' style='padding:0; margin:10;'>";
                                                                }
                                                                ?>

                                                                <label class="form-check-label">I hereby certify that the above information I have provided are true and correct. I adhere upon enrollment and agree to abide by the Rules and Regulations, without mental reservations and I promise to uphold its name as a true SMCC student.</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-3">
                                                                <label>Encoded By</label>
                                                                <input type="elementary_name" class="form-control" name="encoded_by" id="encoded_by" value="<?php $sql = "SELECT * FROM employees WHERE employee_id = '" . $student['encoded_by'] . "'";
                                                                                                                                                            $query = $conn->query($sql);
                                                                                                                                                            $row = $query->fetch_assoc();
                                                                                                                                                            echo $row['firstname'] . " " . $row['lastname']; ?>" style="text-align:center;" readonly>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_comment_remarks" id="edit_comment_remarks"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>

                                                <!-- request_files -->
                                                <form method="post" action="student_enrollment_certificate.php">
                                                    <div class="tab-pane fade" id="request_files" role="tabpanel" aria-labelledby="request_files_tab">
                                                    <button type="submit" class="btn btn-warning btn-sm" value="<?php echo $student_id; ?>" name="coe" ><i class="nav-icon fas fa-download"></i> Certificate of Enrollment</button>
                                                    <button type="submit" class="btn btn-warning btn-sm" value="<?php echo $student_id; ?>" name="goodmoral"><i class="nav-icon fas fa-download"></i> Certificate Good Moral</button>
                                                    <button type="submit" class="btn btn-warning btn-sm" name="edit_basic_information" id="edit_basic_information"><i class="nav-icon fas fa-download"></i> SF9</button>
                                                </div>       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include '_MdlEmployeesProfile/_MdlEmployeeEducationalAttainment.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
    <?php include '_JSStudentInformationProfile/js_StudentInformationProfile.js'; ?>
</script>

</html>