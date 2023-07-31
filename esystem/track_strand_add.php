<?php
include 'includes/session.php';

if (isset($_POST['add'])) {

    $track_name = htmlspecialchars($_POST['track_name']);
    $strand_name = htmlspecialchars($_POST['strand_name']);
    $strand_code = htmlspecialchars($_POST['strand_code']);

    $sql = "SELECT * FROM `tracks_strands` WHERE `strand_name` = '$strand_name'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, strand already existed in the database.';
    } else {
        $sql = "INSERT INTO `tracks_strands`(`track_name`, `strand_name`, `strand_code`,`delstatus`)
        VALUES ('$track_name', '$strand_name', '$strand_code', 1)";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, strand created successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: tracks_strands.php');
