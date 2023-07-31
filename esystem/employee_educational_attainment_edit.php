<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    //Educational Attainment
    $id = htmlspecialchars($_POST['id']);
    $employee_id = htmlspecialchars($_POST['employee_id']);
    $level = htmlspecialchars($_POST['level']);
    $school_name = htmlspecialchars($_POST['school_name']);
    $sy_from = htmlspecialchars($_POST['sy_from']);
    $sy_to = htmlspecialchars($_POST['sy_to']);
    $attainment = htmlspecialchars($_POST['attainment']);
    $honor = htmlspecialchars($_POST['honor']);

    // $sql = "SELECT * FROM `employees_educational_attainment` WHERE `employee_id`='$employee_id' AND `level`='$level'";
    // $query = $conn->query($sql);

    // if ($query->num_rows > 0) {
    //     $_SESSION['error'] = "Sorry for the inconvenience, level already existed in the database. Please update the existing level.";
    // } else {
    $sql = "UPDATE `employees_educational_attainment` SET 
    `level`='$level',
    `school_name`='$school_name',
    `sy_from`='$sy_from',
    `sy_to`='$sy_to',
    `attainment`='$attainment',
    `honor`='$honor'
    WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = "Thank you for your patience, educational attainment updated successfully";
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
    // }
}

header('location:myprofile.php');
