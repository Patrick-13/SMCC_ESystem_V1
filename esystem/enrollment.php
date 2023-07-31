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
                            <h1 class="m-0 text-dark">Enrollment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Admission</a></li>
                                <li class="breadcrumb-item">Enrollment</a></li>
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
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#enroll_student" data-toggle="tab">Enroll Student</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#enrollees" data-toggle="tab">Sections</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="enroll_student">
                                        <form action="enrollment_add.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Search Student<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-3">
                                                    <select class="select2 form-control" name="student_search" id="student_search" required>
                                                        <option disabled selected>- Select -</option>
                                                        <?php
                                                        $sql = "SELECT * FROM students_information";
                                                        $query = $conn->query($sql);
                                                        while ($row = $query->fetch_assoc()) {
                                                            echo "<option value=" . $row['student_id'] . ">" .  strtoupper($row['lastname']) . ", " . $row['firstname'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <strong>
                                                    <p>STUDENT INFORMATION</p>
                                                </strong>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Student ID<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="student_id" id="student_id" readonly>
                                                </div>

                                                <label class="col-form-label col-lg-2">Date Applied<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="date_application" id="date_application" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">First Name<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="firstname" id="firstname" readonly>
                                                </div>

                                                <label class="col-form-label col-lg-2">Middle Name<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="middlename" id="middlename" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Last Name<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="lastname" id="lastname" readonly>
                                                </div>

                                                <label class="col-form-label col-lg-2">Suffix<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="suffix" id="suffix" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Gender<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="gender" id="gender" readonly>
                                                </div>
                                                <label class="col-form-label col-lg-2">Date of Birth<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="date" class="form-control" name="date_birth" id="date_birth" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Address<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="home_address" id="home_address" readonly>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Contact #<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="contact_number" id="contact_number" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Scholarship<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="scholarship" id="scholarship" readonly>
                                                </div>

                                                <label class="col-form-label col-lg-2">Scholar Name<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="scholarship_name" id="scholarship_name" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label class="col-form-label col-lg-2">ESC ID/LRN<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" name="idvoucher_number" id="idvoucher_number" readonly>
                                                </div>

                                            </div>
                                            <hr>
                                            <div class="row">
                                                <strong>
                                                    <p>ENROLLMENT DETAILS</p>
                                                </strong>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Enrollment Date<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="date" class="form-control" name="enrollment_date" id="enrollment_date" required>
                                                </div>
                                                <label class="col-form-label col-lg-2">S.Y & Semester<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="school_year" id="school_year" required>

                                                        <option value="" disabled selected>- Select -</option>
                                                        <?php
                                                        $sql = "SELECT * FROM `school_year` WHERE `delstatus` = 1";
                                                        $query = $conn->query($sql);
                                                        while ($row = $query->fetch_assoc()) {
                                                            $school_year_start = $row['school_year'];
                                                            $school_year_end = $row['school_year'] + 1;
                                                            $school_year = $school_year_start . " - " . $school_year_end;

                                                            $semester = "";
                                                            if ($row['semester'] == 1) {
                                                                $semester = "1st Semester";
                                                            } else if ($row['semester'] == 2) {
                                                                $semester = "2nd Semester";
                                                            }
                                                            echo "<option value=" . $row['id'] . " >" . $school_year . " (" . $semester . ")</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Schedule<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="class_schedule" id="class_schedule" required>
                                                        <option value="0" disabled selected>- Select -</option>
                                                        <?php
                                                        $sql = "SELECT * FROM schedules";
                                                        $query = $conn->query($sql);
                                                        while ($row = $query->fetch_assoc()) {
                                                            echo "<option value='" . $row['id'] . "'>" . $row['schedule_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <label class="col-form-label col-lg-2">Grade Level<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="grade_level" id="grade_level" required>
                                                        <option disabled selected>- Select -</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Section<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="section" id="section" required>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Track<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="track" id="track" required>
                                                        <option value="0" disabled selected>- Select -</option>
                                                        <option value="1">Academic Track</option>
                                                        <option value="2">Arts and Design</option>
                                                        <option value="3">Sports</option>
                                                        <option value="4">Technical Vocational Livelihood</option>
                                                    </select>
                                                </div>
                                                <label class="col-form-label col-lg-2">Strand<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" name="strand" id="strand">
                                                        <option value="0" disabled selected>- Select -</option required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Comments<span style="color:red;" class="astris">*</span></label>
                                                <div class="col-lg-10">
                                                    <textarea type="text" class="form-control" name="comment" id="comment"></textarea>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="row" style="float:right;">
                                                <button type="submit" class="btn btn-primary btn-sm" name="add" id="add"><i class="nav-icon fas fa-user-plus"></i> Enroll Student</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="enrollees">
                                        <table id="defaultTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Section</th>
                                                    <th>Grade Level</th>
                                                    <th>Schedule</th>
                                                    <th>Capacity</th>
                                                    <th>Advisory</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
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
    <?php
    include '_MdlStudentsInformation/_MdlStudentInformation.php';
    ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
    <?php include '_JSEnrollment/js_Enrollment.js'; ?>
</script>

</html>