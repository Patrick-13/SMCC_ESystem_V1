<?php
include 'includes/session.php';

if (isset($_POST['add'])) {

    $schedule_name = htmlspecialchars($_POST['schedule_name']);

    $sql = "SELECT * FROM `schedules` WHERE `schedule_name` = '$schedule_name'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, schedule already existed in the database.';
    } else {
        $sql = "INSERT INTO `schedules`(`schedule_name`, `delstatus`)
        VALUES ('$schedule_name', 1)";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, schedule created successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: schedules.php');
