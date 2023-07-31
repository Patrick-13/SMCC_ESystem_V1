<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {

    $id = htmlspecialchars($_POST['id']);
    $track_name = htmlspecialchars($_POST['track_name']);
    $strand_name = htmlspecialchars($_POST['strand_name']);
    $strand_code = htmlspecialchars($_POST['strand_code']);

    $sql = "SELECT * FROM `tracks_strands` WHERE `track_name` = '$track_name' AND `strand_name` = '$strand_name' AND `strand_code`='$strand_code'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, track and strand already existed in the database.';
    } else {
        $sql = "UPDATE `tracks_strands` SET 
        `track_name`='$track_name',
        `strand_name`='$strand_name',
        `strand_code`='$strand_code'
         WHERE id = '$id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, track and stranad edited successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: tracks_strands.php');
