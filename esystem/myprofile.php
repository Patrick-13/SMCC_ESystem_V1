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
                            <h1 class="m-0 text-dark">My Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">My Profile</a></li>
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
                                    $employee_id = htmlspecialchars($user['employee_id']);
                                    $active = htmlspecialchars($user['active']);
                                    $user_type_name = htmlspecialchars($user['user_type_name']);
                                    $sql = "SELECT *, 
                                    _barangaydb.name AS barangay, _barangaydb.code AS barangay_code,
                                    _municitydb.name AS municity, _municitydb.code AS municity_code,
                                    _provincedb.name AS province, _provincedb.code AS province_code 
                                    FROM employees 
                                    LEFT JOIN _barangaydb ON employees.barangay = _barangaydb.code
                                    LEFT JOIN _municitydb ON employees.municity = _municitydb.code
                                    LEFT JOIN _provincedb ON employees.province = _provincedb.code 
                                    WHERE employee_id = '$employee_id'";
                                    $query = $conn->query($sql);
                                    $row = $query->fetch_assoc();

                                    ?>
                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img src="<?php echo (!empty($user['photo'])) ? '../img/employees/' . $user['photo'] : '../img/profile.jpg'; ?>" class="img-circle" alt="User Image" style="width:50%;">
                                            </div>
                                            <h3 class="profile-username text-center"><?php echo htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['middlename']) . " " . htmlspecialchars($row['lastname']) ?></h3>
                                            <p class="text-muted text-center" style="margin:0; padding:0;"><?php echo $user_type_name; ?></p>
                                            <p class="text-muted text-center" style="margin:0; padding:0;">Employee ID: <?php echo $row['employee_id']; ?></p>
                                            <p class="text-muted text-center" style="margin:0; padding:0;">Hired Since: <?php echo date('M. Y', strtotime($user['hired_date'])); ?></p>
                                            <?php
                                            if ($active == 1) {
                                                echo "<a href='#'><p class='text-center' style='color:#007bff; margin:0; padding:0;'>Active</p></a>";
                                            } else {
                                                echo "<a href='#'><p class='text-center' style='color:#dc3545; margin:0; padding:0;'>Not Active</p></a>";
                                            }
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


                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                                            <p class='text-muted'><?php echo $row['address'] . ", " . $row['barangay'] . ", " . $row['municity'] . ", " . $row['province'] . ", " . $row['zipcode']; ?></p>

                                            <hr>

                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Emergency Contact</strong>

                                            <p class="text-muted">
                                                <span class="tag tag-danger"><?php echo $row['emerg_name'] ?></span><br>
                                                <span class="tag tag-success"><?php echo $row['emerg_relationship'] ?></span><br>
                                                <span class="tag tag-info"><?php echo $row['emerg_address'] ?></span><br>
                                                <span class="tag tag-warning"><?php echo $row['emerg_contact'] ?></span>
                                            </p>

                                            <!-- <hr> -->

                                            <!-- <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#basic_information" data-toggle="tab">Basic Information</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#statutory_information" data-toggle="tab">Statutory Information</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#home_address" data-toggle="tab">Home Address</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#contact_details" data-toggle="tab">Contact Details</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#educational_background" data-toggle="tab">Educational Attainment</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#photo" data-toggle="tab">Photo</a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="basic_information">
                                                    <form action="myprofile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $row['employee_id'] ?>" readonly>
                                                        <div class="row">
                                                            <div class="col-xl-3">
                                                                <label>Hired Date<span style="color:red;" class="astris">*</span></label>
                                                                <input type="date" class="form-control" name="hired_date" id="hired_date" value="<?php echo $row['hired_date'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-3">
                                                                <label for="firstname">First Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $row['firstname'] ?>" placeholder="First Name" required>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <label for="middlename">Middle Name</label>
                                                                <input type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $row['middlename'] ?>" placeholder="Middle Name (Optional)">
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <label for="lastname">Last Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $row['lastname'] ?>" placeholder="Last Name" required>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <label for="suffix">Suffix</label>
                                                                <select class="form-control" name="suffix" id="suffix">
                                                                    <?php
                                                                    if ($row['suffix'] == 1) {
                                                                        echo "<option value='0' disabled >- Select -</option>";
                                                                        echo "<option value='0' selected>N/A</option>";
                                                                        echo "<option value='sr'>Sr.</option>";
                                                                        echo "<option value='jr'>Jr.</option>";
                                                                    } else if ($row['suffix'] == "sr") {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='0'>N/A</option>";
                                                                        echo "<option value='sr' selected>Sr.</option>";
                                                                        echo "<option value='jr'>Jr.</option>";
                                                                    } else if ($row['suffix'] == "jr") {
                                                                        echo "<option value='0' disabled>- Select -</option>";
                                                                        echo "<option value='0'>N/A</option>";
                                                                        echo "<option value='sr'>Sr.</option>";
                                                                        echo "<option value='jr' selected>Jr.</option>";
                                                                    } else {
                                                                        echo "<option value='0' selected disabled>- Select -</option>";
                                                                        echo "<option value='0'>N/A</option>";
                                                                        echo "<option value='sr'>Sr.</option>";
                                                                        echo "<option value='jr'>Jr.</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <label>Nick Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="nickname" id="nickname" value="<?php echo $row['nickname'] ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="gender">Gender<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" name="gender" id="gender" required>
                                                                    <?php
                                                                    if ($row['gender'] == "male") {
                                                                        echo "<option disabled>- Select -</option>";
                                                                        echo "<option value='male' selected>Male</option>";
                                                                        echo "<option value='female'>Female</option>";
                                                                    } else if ($row['gender'] == "female") {
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
                                                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <label for="birth_place">Birth Place<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="birth_place" id="birth_place" placeholder="Birth Place" value="<?php echo $row['birth_place'] ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="religion">Religion<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion" value="<?php echo $row['religion'] ?>" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="nationality">Nationality<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" value="<?php echo $row['nationality'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4">
                                                                <label for="civil_status">Civil Status<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" name="civil_status" id="civil_status" required>
                                                                    <?php
                                                                    if ($row['civil_status'] == "single") {
                                                                        echo "<option disabled >- Select -</option>";
                                                                        echo "<option value='single' selected>Single</option>";
                                                                        echo "<option value='married'>Married</option>";
                                                                        echo "<option value='widow'>Widow</option>";
                                                                        echo "<option value='widower'>Widower</option>";
                                                                    } else if ($row['civil_status'] == "married") {
                                                                        echo "<option disabled >- Select -</option>";
                                                                        echo "<option value='single'>Single</option>";
                                                                        echo "<option value='married' selected>Married</option>";
                                                                        echo "<option value='widow'>Widow</option>";
                                                                        echo "<option value='widower'>Widower</option>";
                                                                    } else if ($row['civil_status'] == "widow") {
                                                                        echo "<option disabled >- Select -</option>";
                                                                        echo "<option value='single'>Single</option>";
                                                                        echo "<option value='married'>Married</option>";
                                                                        echo "<option value='widow' selected>Widow</option>";
                                                                        echo "<option value='widower'>Widower</option>";
                                                                    } else if ($row['civil_status'] == "widower") {
                                                                        echo "<option disabled >- Select -</option>";
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
                                                <div class="tab-pane" id="statutory_information">
                                                    <form action="myprofile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $row['employee_id'] ?>" readonly>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="sss">SSS</label>
                                                                <input type="text" class="form-control" name="sss" id="sss" value="<?php echo $row['sss'] ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="pag_ibig">Pag-IBIG</label>
                                                                <input type="text" class="form-control" name="pag_ibig" id="pag_ibig" value="<?php echo $row['pag_ibig'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="phic">PHIC</label>
                                                                <input type="text" class="form-control" name="phic" id="phic" value="<?php echo $row['phic'] ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="tin">TIN</label>
                                                                <input type="text" class="form-control" name="tin" id="tin" value="<?php echo $row['tin'] ?>">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_statutory_information" id="edit_statutory_information"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="home_address">
                                                    <form action="myprofile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $row['employee_id'] ?>" readonly>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="permanent_region" class="control-label">Region<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="region" name="region" required>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _regiondb";
                                                                    $query = $conn->query($sql);
                                                                    while ($region_row = $query->fetch_assoc()) {
                                                                        if ($region_row['code'] == $row['region']) {
                                                                            echo "<option value='" . $region_row['code'] . "' selected>" . $region_row['name'] . "</option>";
                                                                        }
                                                                        echo "<option value='" . $region_row['code'] . "'>" . $region_row['name'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class=" col-xl-6">
                                                                <label for="province" class="control-label">Province<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="province" name="province" required>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _provincedb WHERE national='" . $row['region'] . "'";
                                                                    $query = $conn->query($sql);
                                                                    while ($province_row = $query->fetch_assoc()) {
                                                                        if ($province_row['code'] == $row['province_code']) {
                                                                            echo "<option value='" . $province_row['code'] . "' selected>" . $province_row['name'] . "</option>";
                                                                        }
                                                                        echo "<option value='" . $province_row['code'] . "'>" . $province_row['name'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="municity" class="control-label">Municipality/City<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="municity" name="municity" reqiured>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _municitydb WHERE province='" . $row['province_code'] . "'";
                                                                    $query = $conn->query($sql);
                                                                    while ($municity_row = $query->fetch_assoc()) {
                                                                        if ($municity_row['code'] == $row['municity_code']) {
                                                                            echo "<option value='" . $municity_row['code'] . "' selected>" . $municity_row['name'] . "</option>";
                                                                        }
                                                                        echo "<option value='" . $municity_row['code'] . "'>" . $municity_row['name'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class=" col-xl-6">
                                                                <label for="barangay" class="control-label">Barangay<span style="color:red;" class="astris">*</span></label>
                                                                <select class="form-control" id="barangay" name="barangay" required>
                                                                    <option disabled selected>Select</option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM _barangaydb WHERE municity='" . $row['municity_code'] . "'";
                                                                    $query = $conn->query($sql);
                                                                    while ($barangay_row = $query->fetch_assoc()) {
                                                                        if ($barangay_row['code'] == $row['barangay_code']) {
                                                                            echo "<option value='" . $barangay_row['code'] . "' selected>" . $barangay_row['name'] . "</option>";
                                                                        }
                                                                        echo "<option value='" . $barangay_row['code'] . "'>" . $barangay_row['name'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="address" class="control-label">Address<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" id="address" name="address" placeholder="Street No./Apartment Bldg./Prk. Name" value="<?php echo $row['address'] ?>" required>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="zipcode" class="control-label">Zip Code<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="xxxx" value="<?php echo $row['zipcode'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_home_address" id="edit_home_address"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="contact_details">
                                                    <form action="myprofile_edit.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $row['employee_id'] ?>" readonly>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="telephone_number">Telephone Number</label>
                                                                <input type="text" class="form-control" name="telephone_number" id="telephone_number" value="<?php echo $row['telephone_number']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="cellphone_number">Cellphone Number<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="cellphone_number" id="cellphone_number" value="<?php echo $row['cellphone_number']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="primary_email">Primary Email<span style="color:red;" class="astris">*</span></label>
                                                                <input type="email" class="form-control" name="primary_email" id="primary_email" value="<?php echo $row['primary_email']; ?>">
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="secondary_email">Secondary Email</label>
                                                                <input type="email" class="form-control" name="secondary_email" id="secondary_email" value="<?php echo $row['secondary_email']; ?>">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <label style="color:red;">Emergency Contact</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="emerg_name">Name<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_name" id="emerg_name" value="<?php echo $row['emerg_name']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="emerg_contact">Contact Number<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_contact" id="emerg_contact" value="<?php echo $row['emerg_contact']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label for="emerg_relationship">Relationship<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_relationship" id="emerg_relationship" value="<?php echo $row['emerg_relationship']; ?>" required>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="emerg_address">Address<span style="color:red;" class="astris">*</span></label>
                                                                <input type="text" class="form-control" name="emerg_address" id="emerg_address" value="<?php echo $row['emerg_address']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row" style="float:right;">
                                                            <button type="submit" class="btn btn-success btn-sm" name="edit_contact_details" id="edit_contact_details"><i class="nav-icon fas fa-edit"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="educational_background">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#educational_attainment_add"><i class="nav-icon fas fa-plus"></i> Add Attainment</button>
                                                    <table id="defaultTableAllFalse" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Level</th>
                                                                <th>School Name</th>
                                                                <th>School Year</th>
                                                                <th>Attainment</th>
                                                                <th>Honor</th>
                                                                <th style="width:11%;"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql = "SELECT * FROM `employees_educational_attainment` WHERE `employee_id`='$employee_id'";
                                                            $query = $conn->query($sql);
                                                            while ($row = $query->fetch_assoc()) {
                                                                echo "<tr>";
                                                                if ($row['level'] == 1) {
                                                                    echo "<td>Primary</td>";
                                                                } else  if ($row['level'] == 2) {
                                                                    echo "<td>Tertiary</td>";
                                                                } else if ($row['level'] == 3) {
                                                                    echo "<td>Vocational</td>";
                                                                } else if ($row['level'] == 4) {
                                                                    echo "<td>Graduate</td>";
                                                                } else if ($row['level'] == 5) {
                                                                    echo "<td>Post Graduate</td>";
                                                                }
                                                                echo "<td>" . $row['school_name'] . "</td>";
                                                                echo "<td>" . $row['sy_from'] . " - " . $row['sy_to'] . "</td>";
                                                                echo "<td>" . $row['attainment'] . "</td>";
                                                                echo "<td>" . $row['honor'] . "</td>";
                                                                echo "<td>";
                                                                echo "<button class='btn btn-warning btn-sm educational_attainment_edit' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' aria-hidden='true'></i></button> ";
                                                                echo "<button class='btn btn-danger btn-sm educational_attainment_delete' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fas fa-trash' aria-hidden='true'></i></button>";
                                                                echo "</td>";
                                                                echo "</tr>";
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="photo">
                                                    <form action="employee_educational_attainment_upload_photo.php" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <input type="hidden" name="employee_id" id="photo_employee_id" value=<?php echo $employee_id; ?>>
                                                            <label for="photo" class="col-2 control-label">Photo</label>
                                                            <input type="file" class="col-8" id="photo" name="photo" required>
                                                            <button type="submit" class="btn btn-success btn-sm" name="upload" id="upload"><i class="nav-icon fas fa-edit"></i> Upload</button>
                                                        </div>
                                                    </form>
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
    <?php include '_MdlMyProfile/_MdlEducationalAttainment.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
    <?php include '_JSMyProfile/js_MyProfile.js'; ?>
</script>

</html>