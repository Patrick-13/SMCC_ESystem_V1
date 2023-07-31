<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {

    $id = htmlspecialchars($_POST['id']);
    $user_type = htmlspecialchars($_POST['user_type']);

    $sql = "SELECT * FROM `user_types` WHERE `user_type`='$user_type' AND `delstatus`=0";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, user type already deleted in the database.';
    } else {
        $sql = "UPDATE `user_types` SET `delstatus`=0 WHERE `id` ='$id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, user type edited successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: user_types.php');
