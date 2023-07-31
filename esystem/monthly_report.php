<!DOCTYPE html>
<html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMCC E-System | Monthly Report Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Collection Report and Expenses</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Admission</a></li>
                                <li class="breadcrumb-item">Collection Report and Expenses</a></li>
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
                          
                            <div class="card-body">
                                <div class="tab-content">
                                <form action="monthly_collectexpenses_pdf.php" method="post">
                                <label>Date from: </label>
                                <input type="date" id="datefrom" name="datefrom">
                                <label>Date to: </label>
                                <input type="date"  id="dateto" name="dateto">
                                <button type="button" class="btn btn-warning btn-m" id="search"><i class="nav-icon fas fa-search"></i></button>
                                <button type="submit" class="btn btn-primary btn-m" name="print"><i class="nav-icon fas fa-print"></i></button>
                                </form> 
                                <table id="collectexpensetable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">OR NO</th>
                                        <th style="text-align:center;">Date</th>
                                        <th style="text-align:center;">Student Id</th>
                                        <th style="text-align:center;">Student Name</th>
                                        <th style="text-align:center;">Amount Paid</th>
                                    
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
            </section>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php
    //include '_collectionandexpensesreport/_collectionandexpensesreport.php';
    ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
  <?php include '_JSCollectionexpenses/js_collectionandexpensesreport.js'; ?>
</script>

</html>