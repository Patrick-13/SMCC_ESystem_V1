<?php
include 'includes/session.php';

if (isset($_POST['deletevoucher'])) {

    $id = htmlspecialchars($_POST['id']);

    $sql = "SELECT * FROM `voucher` WHERE `id` = '$id' AND `v_delstatus` = 0";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, track and strand already deleted in the database.';
    } else {
        $sql = "UPDATE `voucher` SET `v_delstatus`= 0 WHERE id = '$id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, Voucher Type deleted successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: voucher_settings.php');
