<?php
include 'includes/session.php';

if (isset($_POST['add'])) {

    $user_type = htmlspecialchars($_POST['user_type']);

    $sql = "SELECT * FROM `user_types` WHERE `user_type`='$user_type'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, user type already existed in the database.';
    } else {
        $sql = "INSERT INTO `user_types`(`user_type`,`delstatus`) 
        VALUES ('$user_type',1)";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, user type created successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: user_types.php');
