<?php
include 'includes/session.php';

if (isset($_POST['student_requirements_edit'])) {

    $student_id = htmlspecialchars($_POST['student_id']);

    //Requirements
    if (htmlspecialchars($_POST['f138']) == true) {
        $f138 = 1;
    } else {
        $f138 = 0;
    }

    if (htmlspecialchars($_POST['f137']) == true) {
        $f137 = 1;
    } else {
        $f137 = 0;
    }

    if (htmlspecialchars($_POST['good_moral']) == true) {
        $good_moral = 1;
    } else {
        $good_moral = 0;
    }

    if (htmlspecialchars($_POST['psa']) == true) {
        $psa = 1;
    } else {
        $psa = 0;
    }

    if (htmlspecialchars($_POST['coc']) == true) {
        $coc = 1;
    } else {
        $coc = 0;
    }

    if (htmlspecialchars($_POST['idpic']) == true) {
        $idpic = 1;
    } else {
        $idpic = 0;
    }

    if (htmlspecialchars($_POST['sf10']) == true) {
        $sf10 = 1;
    } else {
        $sf10 = 0;
    }

    if (htmlspecialchars($_POST['sf9']) == true) {
        $sf9 = 1;
    } else {
        $sf9 = 0;
    }

    $sql = "UPDATE `students_information` SET 
    `f137`='$f137', 
    `f138`='$f138', 
    `good_moral`='$good_moral', 
    `psa`='$psa', 
    `coc`='$coc', 
    `idpic`='$idpic', 
    `sf9`='$sf9', 
    `sf10`='$sf10' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, student requirements edited successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

header('location: enrollment.php');
