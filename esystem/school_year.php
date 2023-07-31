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
                            <h1 class="m-0 text-dark">School Year</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Admission Settings</a></li>
                                <li class="breadcrumb-item active">School Year</li>
                            </ol>
                        </div><!-- /.col -->
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#school_year_open"><i class="nav-icon fas fa-plus"></i> Open School Year</button>
                            <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>School Year</th>
                                        <th>Semester</th>
                                        <th>Status</th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `school_year`";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['school_year'] . "</td>";

                                        if ($row['semester'] == 1) {
                                            echo "<td>1st Semester</td>";
                                        } else if ($row['semester'] == 2) {
                                            echo "<td>2nd Semester</td>";
                                        }

                                        if ($row['delstatus'] == 1) {
                                            echo "<td>Open</td>";
                                        } else {
                                            echo "<td>Closed</td>";
                                        }
                                        if ($row['delstatus'] == 1) {
                                            echo "<td>";
                                            echo "<button class='btn btn-warning btn-sm school_year_edit' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' aria-hidden='true'></i></button> ";
                                            echo "<button class='btn btn-danger btn-sm school_year_delete' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fas fa-ban' aria-hidden='true'></i></button>";
                                            echo "</td>";
                                        } else {
                                            echo "<td></td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include '_MdlSchoolYear/_MdlSchoolYear.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
    <?php include '_JSSchoolYear/js_SchoolYear.js'; ?>
</script>


</html>