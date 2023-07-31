<!DOCTYPE html>
<html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMCC E-System | Ledger Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Ledger</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Admission</a></li>
                                <li class="breadcrumb-item">Ledger</a></li>
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
   
                                </ul>
                            </div>
                            <form action="ledger_student_account.php" method="POST">
                            <div class="card-body">
                                <div class="tab-content">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_student_ledger"><i class="nav-icon fas fa-plus"></i> Add Ledger</button>
                                <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>School Year</th>
                                        <th>Student Id</th>
                                        <th>Student Name</th>
                                        <th>Strand</th>
                                        <th>Voucher Type</th>
                                        <th>Tutition Fee</th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `ledger` 
                                    left join admission on ledger.studentid = admission.student_id
                                    left join students_information on admission.student_id = students_information.student_id
                                    left join tracks_strands on admission.track = tracks_strands.id
                                    left join voucher on ledger.payment_type = voucher.id
                                    WHERE ledger.ledger_status=1";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['ledger_sy'] . "</td>";
                                        echo "<td>" . $row['studentid'] . "</td>";
                                        echo "<td>" . $row['lastname'] . ', ' . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['strand_code'] . "</td>";
                                        echo "<td>" . $row['voucher_type'] . "</td>";
                                        echo "<td>" . $row['tuition_fee'] . "</td>";
                                        echo "<td style='text-align:center;'>";
                                        echo "<button class='btn btn-warning btn-sm ledger_edit' data-toggle='modal' data-id='" . $row['ledger_id'] . "'><i class='fa fa-edit' aria-hidden='true'></i></button> ";
                                        echo "<button class='btn btn-danger btn-sm ledger_delete' data-toggle='modal' data-id='" . $row['ledger_id'] . "'><i class='fas fa-trash' aria-hidden='true'></i></button> ";
                                        echo "<button class='btn btn-primary btn-sm' name='ledger_print' data-toggle='modal' data-id='" . $row['ledger_id'] . "'><i class='fas fa-print' aria-hidden='true'></i></button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php
    include '_Mdstudentsledger/_Mdstudentsledger.php';
    ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
  <?php include '_JSstudentledger/js_studentledger.js'; ?>
</script>

</html>