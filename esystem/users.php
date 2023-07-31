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
                            <h1 class="m-0 text-dark">Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Security Settings</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-solid">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_add"><i class="nav-icon fas fa-user-plus"></i> Add User</button>
                            <table id="defaultTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>User Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `users` LEFT JOIN `employees` ON users.employee_id=employees.employee_id WHERE `delstatus`=1";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['employee_id'] . "</td>";
                                        echo "<td><a href='employee_profile.php?employee_id=" . $row['employee_id'] . "&active=" . $row['active'] . "'>" . $row['firstname'] . " " . $row['lastname'] . "</a></td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        if ($row['user_type'] == 1) {
                                            echo "<td>Administrator</td>";
                                        } else if ($row['user_type'] == 1) {
                                            echo "<td>Staff</td>";
                                        } else if ($row['user_type'] == 1) {
                                            echo "<td>Faculty</td>";
                                        } else if ($row['user_type'] == 1) {
                                            echo "<td>Student</td>";
                                        }
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
    <?php include '_MdlUsers/_MdlUser.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>
<script>
    <?php include '_JSUsers/js_User.js'; ?>
</script>

</html>