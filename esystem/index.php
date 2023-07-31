<?php
  session_start();
  if(isset($_SESSION['loggedin-user'])){
    //header('location:home.php');
	echo '<script>';
	echo 'window.location.href = "home.php"';
	echo '</script>';
  }else{
    header('location:../'); 
  }
