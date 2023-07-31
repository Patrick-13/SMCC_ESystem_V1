<?php
include 'includes/session.php';

if (isset($_POST['add'])) {

    $student_id = htmlspecialchars($_POST['student_id']);
    $grade_level = htmlspecialchars($_POST['grade_level']);
    $section = htmlspecialchars($_POST['section']);
    $strand = htmlspecialchars($_POST['strand']);
    $school_year = htmlspecialchars($_POST['school_year']);
    $enrollment_date = htmlspecialchars($_POST['enrollment_date']);
    $comment = htmlspecialchars($_POST['comment']);
    $delstatus = true;

    $sql = "SELECT * FROM `admission` WHERE `student_id`='$student_id' AND `school_year`='$school_year'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, student already enrolled in this school year.';
    } else {
        $sql = "INSERT INTO `admission`(`student_id`, `grade_level`, `section`, `track_strand`, `school_year`, `enrollment_date`, `comment`, `delstatus`) 
        VALUES (?,?,?,?,?,?,?,?)";
        $query = $conn->prepare($sql);
        $query->bind_param('sssssssi', $student_id, $grade_level, $section, $strand, $school_year, $enrollment_date, $comment, $delstatus);
        if ($query->execute()) {
            $_SESSION['success'] = 'Thank you for your patience, section created successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: enrollment.php');
