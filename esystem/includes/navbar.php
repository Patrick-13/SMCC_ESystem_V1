<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <strong style='font-size:14px;'><?php echo "Today is" . date(" D, F d, Y"); ?></strong>
            <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu" style="margin-top:10px;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="<?php echo (!empty($user['photo'])) ? '../img/employees/' . $user['photo'] : '../img/profile.jpg'; ?>" class="user-image" alt="User Image">
                        <?php if ($user['nickname'] == "") {
                            echo "<span class='hidden-xs'>" . $user['firstname'] . " " . $user['lastname'] . "</span>";
                        } else {
                            echo "<span class='hidden-xs'>" . $user['nickname'] . "</span>";
                        }
                        ?>

                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo (!empty($user['photo'])) ? '../img/employees/' . $user['photo'] : '../img/profile.jpg'; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>
                                <?php
                                if ($user['usertype_id'] == 1) {
                                    echo "<small class='text-muted text-center' style='margin:0; padding:0;'>Administrator</small>";
                                } else if ($user['usertype_id'] == 2) {
                                    echo "<p class='text-muted text-center' style='margin:0; padding:0;'>Staff</small>";
                                } else if ($user['usertype_id'] == 3) {
                                    echo "<small class='text-muted text-center' style='margin:0; padding:0;'>Faculty</small>";
                                } else if ($user['usertype_id'] == 4) {
                                    echo "<small class='text-muted text-center' style='margin:0; padding:0;'>Student</small>";
                                }
                                ?>
                                <small>Hired since <?php echo date('M. Y', strtotime($user['hired_date'])); ?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </ul>
</nav>