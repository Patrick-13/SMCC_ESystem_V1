<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {

    $id = htmlspecialchars($_POST['id']);

    $sql = "UPDATE `sections` SET `delstatus`=0 WHERE `id`='$id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, section deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

header('location: sections.php');
