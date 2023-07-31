<?php
session_start();
include 'esystem/includes/conn.php';

if (isset($_SESSION['loggedin-user'])) {
  $session_id = $_SESSION['loggedin-user'];
  $sql = "SELECT * FROM `users` WHERE employee_id = '$session_id'";
  $query = $conn->query($sql);
  $row = $query->fetch_assoc();

  header('location: esystem/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMCC Enrollment & Account System</title>
  <link rel="shortcut icon" href="docs/assets/img/logo50.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-color: white;">
  <div class="login-box">

    <div class="login-logo">

      <a href="#"><img src="img/logo.png" style="width: 25%;"></a>

    </div>
    <!-- /.login-logo -->
    <div class="card" style="border: 1px solid #BFBFBF; box-shadow: 10px 10px 5px #aaaaaa;">
      <div class="card-body login-card-body">
        <?php
        if (isset($_SESSION['error'])) {
          echo " 
          <div class='alert alert-danger alert-dismissible'>
          <h5><i class='icon fas fa-ban'></i> Alert!</h5>

            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
          unset($_SESSION['error']);
        }
        ?>
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->

        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" id="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">

          </div>
          <div class="row">
            <div class="col-8">
              <a href="register.php" class="text-center">Forgot Password?</a>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="login" id="login">Log In</button>
            </div>
          </div>
        </form>
        <p class="mb-1">
          <!--  <a href="forgot-password.html">I forgot my password</a>-->
        </p>
        <p class="mb-0">

        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>



</html>