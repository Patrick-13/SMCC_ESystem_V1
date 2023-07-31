<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {

    $id = htmlspecialchars($_POST['id']);

    $sql = "UPDATE `school_year` SET`delstatus`=0 WHERE `id`='$id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, school year close successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

header('location: school_year.php');
