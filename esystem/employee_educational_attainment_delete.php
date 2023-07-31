<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = htmlspecialchars($_POST['id']);

    $sql = "DELETE FROM `employees_educational_attainment` WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = "Thank you for your patience, educational attainment deleted successfully";
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}
header('location:myprofile.php');
