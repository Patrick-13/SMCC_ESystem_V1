<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {

    $id = htmlspecialchars($_POST['id']);
    $school_year = htmlspecialchars($_POST['school_year']);
    $semester = htmlspecialchars($_POST['semester']);

    $sql = "SELECT * FROM `school_year` WHERE `school_year` = '$school_year' AND `semester`='$semester'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, school year already existed in the database.';
    } else {
        $sql = "UPDATE `school_year` SET `school_year`='$school_year', `semester`='$semester' WHERE `id`='$id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, school year edited successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: school_year.php');
