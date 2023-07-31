<?php
    $conn = new mysqli('localhost','root','','smcc_sis_db');
    $conn -> set_charset("utf8");
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }
?>