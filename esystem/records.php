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
                            <h1 class="m-0 text-dark">Records</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Admission</a></li>
                                <li class="breadcrumb-item">Records</a></li>
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
                                    <li class="nav-item"><a class="nav-link active" href="#quick_search" data-toggle="tab">Quick Search</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#enrollees" data-toggle="tab">Enrollees</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#requirements_check" data-toggle="tab">Requirements Check</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="quick_search">

                                    </div>
                                    <div class="tab-pane" id="enrollees">
                                        <table id="defaultTable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Contact #</th>
                                                    <th>Strand</th>
                                                    <th>Grade</th>
                                                    <th>School Year</th>
                                                    <th>Semester</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT *, school_year.school_year AS school_year, _barangaydb.name AS barangay, _municitydb.name AS municity, _provincedb.name AS province 
                                                FROM `admission` 
                                                LEFT JOIN school_year ON admission.school_year = school_year.id
                                                LEFT JOIN students_information ON admission.student_id = students_information.student_id 
                                                LEFT JOIN tracks_strands ON admission.track_strand = tracks_strands.id
                                                LEFT JOIN _barangaydb ON students_information.barangay = _barangaydb.code 
                                                LEFT JOIN _municitydb ON students_information.municity = _municitydb.code 
                                                LEFT JOIN _provincedb ON students_information.province = _provincedb.code";
                                                $query = $conn->query($sql);
                                                while ($row = $query->fetch_assoc()) {
                                                    $sy_end = $row['school_year'] + 1;
                                                    echo "<tr>";
                                                    echo "<td><a href='student_information_profile.php?student_id=" . $row['student_id'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</a></td>";
                                                    echo "<td>" . $row['barangay'] . " " . $row['municity'] . " " . $row['province'] . "</td>";
                                                    echo "<td>" . $row['cellphone_number'] . "</td>";
                                                    echo "<td>" . $row['strand_name'] . "</td>";
                                                    echo "<td>" . $row['grade_level'] . "</td>";
                                                    echo "<td>" . $row['school_year'] . " - " . $sy_end . "</td>";
                                                    if ($row['semester'] == 1) {
                                                        echo "<td> 1st Semester </td>";
                                                    } else if ($row['semester'] == 2) {
                                                        echo "<td> 2nd Semester </td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="requirements_check">
                                        <table id="enrollees_req" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Contact #</th>
                                                    <th>F138</th>
                                                    <th>F137</th>
                                                    <th>Good Moral</th>
                                                    <th>NSO/PSA</th>
                                                    <th>COC</th>
                                                    <th>2x2 ID Picture</th>
                                                    <th>SF10</th>
                                                    <th>SF9</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT *, _barangaydb.name AS barangay, _municitydb.name AS municity, _provincedb.name AS province 
                                                FROM `admission`
                                                LEFT JOIN school_year ON admission.school_year = school_year.id
                                                LEFT JOIN students_information ON admission.student_id = students_information.student_id 
                                                LEFT JOIN tracks_strands ON students_information.strand = tracks_strands.id
                                                LEFT JOIN _barangaydb ON students_information.barangay = _barangaydb.code 
                                                LEFT JOIN _municitydb ON students_information.municity = _municitydb.code 
                                                LEFT JOIN _provincedb ON students_information.province = _provincedb.code";
                                                $query = $conn->query($sql);
                                                while ($row = $query->fetch_assoc()) {

                                                    $f138 = "";
                                                    $f137 = "";
                                                    $goodmoral = "";
                                                    $psa = "";
                                                    $coc = "";
                                                    $idpic = "";
                                                    $sf9 = "";
                                                    $sf10 = "";

                                                    if ($row['f138'] != 0) {
                                                        $f138 = "checked";
                                                    }
                                                    if ($row['f137'] != 0) {
                                                        $f137 = "checked";
                                                    }

                                                    if ($row['good_moral'] != 0) {
                                                        $goodmoral = "checked";
                                                    }

                                                    if ($row['psa'] != 0) {
                                                        $psa = "checked";
                                                    }

                                                    if ($row['coc'] != 0) {
                                                        $coc = "checked";
                                                    }

                                                    if ($row['idpic'] != 0) {
                                                        $idpic = "checked";
                                                    }

                                                    if ($row['sf9'] != 0) {
                                                        $sf9 = "checked";
                                                    }
                                                    if ($row['sf10'] != 0) {
                                                        $sf10 = "checked";
                                                    }

                                                    echo "<tr>";
                                                    echo "<form action='student_information_requirements_edit.php' method='POST'>";
                                                    echo "<td><input type='hidden' name='student_id' value=" . $row['student_id'] . " readonly>" . $row['student_id'] . "</td>";
                                                    echo "<td><a href='student_information_profile.php?student_id=" . $row['student_id'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</a></td>";
                                                    echo "<td>" . $row['barangay'] . " " . $row['municity'] . " " . $row['province'] . "</td>";
                                                    echo "<td>" . $row['cellphone_number'] . "</td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='f138'" . $f138 . "></td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='f137'" . $f137 . "></td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='good_moral'" . $goodmoral . "></td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='psa'" . $psa . "></td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='coc'" . $coc . "></td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='idpic'" . $idpic . "></td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='sf9'" . $sf9 . "></td>";
                                                    echo "<td style='text-align:center;'><input class='control-input' type='checkbox' name='sf10'" . $sf10 . "></td>";
                                                    echo "<td style='text-align:center; width: 6%;'>
                                                    <button type='submit' class='btn btn-warning btn-sm' name='student_requirements_edit'><i class='fa fa-edit' aria-hidden='true'></i></button></td>";
                                                    echo "</form>";
                                                    echo "</tr>";
                                                }
                                                ?>
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
    <?php include '_JSStudentsInformation/js_StudentInformation.js'; ?>
</script>

</html>