<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = htmlspecialchars($_POST['id']);
    $active = htmlspecialchars($_POST['active']);

    $sql = "DELETE FROM `employees_educational_attainment` WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = "Thank you for your patience, educational attainment deleted successfully";
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}
header('location: employee_profile.php?employee_id=' . $employee_id . '&active=' . $active . '');
