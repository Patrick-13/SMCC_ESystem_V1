<?php
include 'includes/session.php';

if (isset($_POST['addledger'])) {

    $_ledgersy = $_POST['_ledgersy'];
    $_ledgerstudentid = $_POST['_ledgerstudentid'];
    $_ledgerpayment = $_POST['_ledgerpayment'];
    $_ledgertuitionfee = $_POST['_ledgertuitionfee'];
   

    $sql = "INSERT INTO `ledger`(`ledger_sy`,`studentid`, `payment_type`, `tuition_fee`, `ledger_status`)
    VALUES ('$_ledgersy', '$_ledgerstudentid','$_ledgerpayment',' $_ledgertuitionfee',1)";
      if ($conn->query($sql)) {
        $_SESSION['success'] = 'Student Ledger Account Created Successfully';
    } else {
        $_SESSION['error'] = $conn->error . "Fill up the form correctly!";
    }

 
}

header('location: ledger.php');
?>