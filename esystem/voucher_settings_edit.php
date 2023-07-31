<?php
include 'includes/session.php';

if (isset($_POST['editvoucher'])) {

    $id = htmlspecialchars($_POST['id']);
    $_vouchertype = htmlspecialchars($_POST['_vouchertype']);
    $_vtuitionfee = htmlspecialchars($_POST['_vtuitionfee']);


    $sql = "SELECT * FROM `voucher` WHERE `voucher_type` = '$_vouchertype' AND `v_tuition_fee` = '$_vtuitionfee'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, Voucher Type already existed in the database.';
    } else {
        $sql = "UPDATE `voucher` SET 
        `voucher_type`='$_vouchertype',
        `v_tuition_fee`='$_vtuitionfee'
         WHERE id = '$id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, Voucher Type edited successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: voucher_settings.php');
