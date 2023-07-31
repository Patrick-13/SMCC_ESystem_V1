<?php

session_start();

include 'esystem/includes/conn.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    $query = $conn->query($sql);

    if ($query->num_rows < 1) {
        $_SESSION['error'] = "Can't find your account";
    } else {
        $row = $query->fetch_assoc();
        $_SESSION['loggedin-user'] = $row['employee_id'];
    }
} else {
    $_SESSION['error'] = 'Please input the credentials first.';
}
header('location: esystem/index.php');
