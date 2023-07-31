<?php
$employee_id = $user['employee_id'];
$active = $user['active'];
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="home.php" class="brand-link" style="text-align:center;">
    <span class="logo-lg"><img src="../img/logo.png" width="60px" style="opacity: 0.9;"></span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- <div class="col-lg-3" style="margin-top:10px;"> -->
      <div class="image">
        <img src="<?php echo (!empty($user['photo'])) ? '../img/employees/' . $user['photo'] : '../img/profile.jpg'; ?>" class="img-circle" alt="User Image" style="width:50px;">
      </div>
      <!-- </div> -->
      <!-- <div class="col-lg-9" style="margin-left:10px; margin-top:6px;"> -->
      <div class="info" style="margin:auto; padding:auto;">
        <a href="employee_profile.php?employee_id=<?php echo $employee_id; ?>&active=<?php echo $active; ?>" class='text-center'><?php echo $user['firstname'] . " " . $user['lastname'] ?></a>
        <?php
        if ($user['usertype_id'] == 1) {
          echo "<p class='text-muted text-center' style='margin:0; padding:0;'>Administrator</p>";
        } else if ($user['usertype_id'] == 2) {
          echo "<p class='text-muted text-center' style='margin:0; padding:0;'>Staff</p>";
        } else if ($user['usertype_id'] == 3) {
          echo "<p class='text-muted text-center' style='margin:0; padding:0;'>Faculty</p>";
        } else if ($user['usertype_id'] == 4) {
          echo "<p class='text-muted text-center' style='margin:0; padding:0;'>Student</p>";
        }
        ?>
        <!-- </div> -->
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" style="padding-bottom: 50px;" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="home.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="myprofile.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              My Profile
            </p>
          </a>
        </li>
        <li class="nav-header">ADMISSION</li>
        <li class="nav-item">
          <a href="students_information.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Students Information
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="enrollment.php" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Enrollment
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="records.php" class="nav-link">
            <i class="nav-icon fa fa-folder"></i>
            <p>
              Records
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="archive.php" class="nav-link">
            <i class="nav-icon fa fa-archive"></i>
            <p>
              Archive
            </p>
          </a>
        </li>
        <li class="nav-header">SYSTEM MANAGEMENT</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-list-alt"></i>
            <p>
              Master List
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="employees.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Employees</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              Admission Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="sections.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sections</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="schedules.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Schedules</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tracks_strands.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tracks & Strands</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="school_year.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>School Year</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="voucher_settings.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Voucher Type</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
             Students Account
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="ledger.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ledger</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payment.php" class="nav-link">
                <i class="fa fa-money nav-icon"></i>
                <p>Payment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="monthly_report.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Monthly Reports</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              Security Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="users.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="user_types.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Types</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="fa fa-sign-out nav-icon" aria-hidden="true"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>