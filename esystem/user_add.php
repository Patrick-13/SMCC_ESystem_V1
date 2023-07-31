<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    // Basic Information
    $user_type = htmlspecialchars($_POST['user_type']);
    $employee_id = htmlspecialchars($_POST['employee']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `users` WHERE `username`='$username'";
    $query = $conn->query($sql);

    if ($query->num_rows > 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, username already existed in the database.';
    } else {
        $sql = "INSERT INTO `users`(`employee_id`,`username`,`password`,`user_type`,`delstatus`) 
        VALUES ('$employee_id','$username','$password','$user_type',1)";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, user created successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: users.php');
