<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {

    $id = htmlspecialchars($_POST['id']);

    $sql = "SELECT * FROM `tracks_strands` WHERE `id` = '$id' AND `delstatus` = 0";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, track and strand already deleted in the database.';
    } else {
        $sql = "UPDATE `tracks_strands` SET `delstatus`= 0 WHERE id = '$id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, track and stranad deleted successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: tracks_strands.php');
