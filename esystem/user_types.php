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
                            <h1 class="m-0 text-dark">User Types</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Security Settings</a></li>
                                <li class="breadcrumb-item active">User Types</li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_type_add"><i class="nav-icon fas fa-plus"></i> Add User Type</button>
                            <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>User Type</th>
                                        <th style="width: 10%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `user_types` WHERE `delstatus`=1";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['user_type'] . "</td>";
                                        echo "<td style='text-align:center;'>";
                                        echo "<button class='btn btn-warning btn-sm user_type_edit' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fa fa-edit' aria-hidden='true'></i></button> ";
                                        echo "<button class='btn btn-danger btn-sm user_type_delete' data-toggle='modal' data-id='" . $row['id'] . "'><i class='fas fa-trash' aria-hidden='true'></i></button>";
                                        echo "</td>";
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
    <?php include '_MdlUserTypes/_MdlUserType.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
    <?php include '_JSUserTypes/js_UserType.js'; ?>
</script>
<script>
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
<script>
    window.addEventListener("load", function() {
        const loader = document.querySelector(".loader");
        loader.className += " hidden"; // class "loader hidden"
    });
</script>

</html>