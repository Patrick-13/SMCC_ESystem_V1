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
                            <h1 class="m-0 text-dark">Employees</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Master List</a></li>
                                <li class="breadcrumb-item active">Employees</li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#faculty_n_staff_add"><i class="nav-icon fas fa-user-plus"></i> Add Employee</button>
                            <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Address</th>
                                        <th>Contact #</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT *, _barangaydb.name AS barangay, _municitydb.name AS municity, _provincedb.name AS province FROM employees 
                                    LEFT JOIN _barangaydb ON employees.barangay = _barangaydb.code
                                    LEFT JOIN _municitydb ON employees.municity = _municitydb.code
                                    LEFT JOIN _provincedb ON employees.province = _provincedb.code";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . strtoupper($row['lastname']) . ", " . $row['firstname'] . " " . $row['middlename'] . "</td>";
                                        echo "<td>" . $row['date_of_birth'] . "</td>";
                                        echo "<td>" . $row['address'] . ", " . $row['barangay'] . ", " . $row['municity'] . ", " . $row['province'] . ", " . $row['zipcode'] . "</td>";
                                        echo "<td>" . $row['cellphone_number'] . "</td>";
                                        echo "<td style='text-align:center;'><a href='employee_profile.php?employee_id=" . $row['employee_id'] . "&active=" . $row['active'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a></td>";
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

    <?php include '_MdlEmployees/_MdlEmployee.php'; ?>
    <?php include 'includes/scripts.php'; ?>

</body>
<script>
    <?php include '_JSEmployees/js_Employees.js'; ?>
</script>

</html>