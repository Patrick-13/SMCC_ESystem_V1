<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {

    $id = htmlspecialchars($_POST['id']);
    $section_name = htmlspecialchars($_POST['section_name']);
    $advisor = htmlspecialchars($_POST['advisor']);
    $grade_level = htmlspecialchars($_POST['grade_level']);
    $class_schedule = htmlspecialchars($_POST['class_schedule']);
    $capacity = htmlspecialchars($_POST['capacity']);

    $sql = "SELECT * FROM `sections` WHERE `grade_level`='$grade_level' AND `section_name`='$section_name' AND `class_schedule`='$class_schedule' AND `capacity`='$capacity' AND `advisor`='$advisor'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $_SESSION['error'] = 'Sorry for the inconvenience, section name already existed in the database.';
    } else {
        $sql = "UPDATE `sections` SET `grade_level`='$grade_level', `section_name`='$section_name', `class_schedule`='$class_schedule', `capacity`='$capacity', `advisor`='$advisor' WHERE `id`='$id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, section edited successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: sections.php');
