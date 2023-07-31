<?php
include 'includes/session.php';

if (isset($_POST['add'])) {

    $section_name = htmlspecialchars($_POST['section_name']);
    $advisor = htmlspecialchars($_POST['advisor']);
    $grade_level = htmlspecialchars($_POST['grade_level']);
    $class_schedule = htmlspecialchars($_POST['class_schedule']);
    $capacity = htmlspecialchars($_POST['capacity']);

    $sql = "SELECT * FROM `sections` WHERE `grade_level`='$grade_level' AND `section_name`='$section_name'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, section name already existed in the database.';
    } else {
        $sql = "INSERT INTO `sections`(`grade_level`, `section_name`, `class_schedule`, `capacity`, `advisor`, `delstatus`) VALUES ('$grade_level', '$section_name', '$class_schedule', '$capacity', '$advisor',1)";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, section created successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: sections.php');
