<!DOCTYPE html>
<html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMCC E-System | Cashier Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Cashier</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Admission</a></li>
                                <li class="breadcrumb-item">Cashier</a></li>
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
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="payment_tab" data-toggle="pill" href="#payment" role="tab" aria-controls="payment" aria-selected="true">Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="expenses_tab" data-toggle="pill" href="#expenses" role="tab" aria-controls="expenses" aria-selected="false">Expenses</a>
                                </li>
                                </ul>
                            </div>
                            <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="payment" role="tabpanel" aria-labelledby="payment_tab">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_student_or"><i class="nav-icon fas fa-plus"></i> Create Payment</button>
                                <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>OR NO</th>
                                        <th>Date</th>
                                        <th>Student Id</th>
                                        <th>Student Name</th>
                                        <th>Amount Paid</th>
                                        <th>Balance</th>
                                        <th style="width: 10%;">tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT *, payment.id as pay_id FROM payment 
                                    left join students_information on payment.student_id = students_information.student_id
                                     where payment.delstatus = 1 ";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['or_no'] . "</td>";
                                        echo "<td>" . $row['date_payment'] . "</td>";
                                        echo "<td>" . $row['student_id'] . "</td>";
                                        echo "<td>" . $row['lastname'] . ', ' . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['amount_paid'] . "</td>";
                                        echo "<td>" . $row['balance'] . "</td>";
                                        echo "<td style='text-align:center;'>";
                                        echo "<button class='btn btn-warning btn-sm payment_edit' data-toggle='modal' data-id='" . $row['pay_id'] . "'><i class='fa fa-edit' aria-hidden='true'></i></button> ";
                                        echo "<button class='btn btn-danger btn-sm payment_delete' data-toggle='modal' data-id='" . $row['pay_id'] . "'><i class='fas fa-trash' aria-hidden='true'></i></button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                                
                                </div>
                                <!--expenses-->
                               
                            <div class="tab-pane fade" id="expenses" role="tabpanel" aria-labelledby="expenses_tab">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_expenses"><i class="nav-icon fas fa-plus"></i> Create Expenses</button>
                                <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>OR NO</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Amount Paid</th>
                                        <th style="width: 10%;">tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * from `expenses`
                                     where delstatus = 1 ";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['expenses_or'] . "</td>";
                                        echo "<td>" . $row['date_expenses'] . "</td>";
                                        echo "<td>" . $row['name'] ."</td>";
                                        echo "<td>" . $row['amount_paid'] . "</td>";
                                        echo "<td style='text-align:center;'>";
                                        echo "<button class='btn btn-warning btn-sm payment_edit' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' aria-hidden='true'></i></button> ";
                                        echo "<button class='btn btn-danger btn-sm payment_delete' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fas fa-trash' aria-hidden='true'></i></button>";
                                        echo "</td>";
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
    include '_MdStudentspayment/_MdStudentspayment.php';
    ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
  <?php include '_JSstudentpayment/js_studentpayment.js'; ?>
</script>

</html>