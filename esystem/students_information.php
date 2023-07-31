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
                            <h1 class="m-0 text-dark">Students Information</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Admission</a></li>
                                <li class="breadcrumb-item">Students Information</a></li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#student_information_add"><i class="nav-icon fas fa-user-plus"></i> Add
                                Information</button>
                            <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact #</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT *,students_information.student_id AS student_id, _barangaydb.name AS barangay, _municitydb.name AS municity, _provincedb.name AS province FROM students_information 
                                    LEFT JOIN _barangaydb ON students_information.barangay = _barangaydb.code
                                    LEFT JOIN _municitydb ON students_information.municity = _municitydb.code
                                    LEFT JOIN _provincedb ON students_information.province = _provincedb.code
                                    WHERE students_information.delstatus = 1";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . strtoupper($row['lastname']) . ", " . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['address'] . ", " . $row['barangay'] . ", " . $row['municity'] . ", " . $row['province'] . "</td>";
                                        echo "<td>" . $row['cellphone_number'] . "</td>";
                                        echo "<td style='text-align:center;'><a href='student_information_profile.php?student_id=" . $row['student_id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include '_MdlStudentsInformation/_MdlStudentInformation.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
    <?php include '_JSStudentsInformation/js_StudentInformation.js'; ?>
</script>

</html>