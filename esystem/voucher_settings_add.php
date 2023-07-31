<?php
include 'includes/session.php';

if (isset($_POST['addvoucher'])) {

    $_vouchertype = $_POST['_vouchertype'];
    $_vtuitionfee = $_POST['_vtuitionfee'];
  
   

    $sql = "INSERT INTO `voucher`(`voucher_type`, `v_tuition_fee`, `v_delstatus`)
    VALUES ('$_vouchertype', '$_vtuitionfee',1)";
      if ($conn->query($sql)) {
        $_SESSION['success'] = 'Voucher Type Created Successfully';
    } else {
        $_SESSION['error'] = $conn->error . "Fill up the form correctly!";
    }

 
}

header('location: voucher_settings.php');
