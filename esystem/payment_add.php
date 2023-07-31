<?php
include 'includes/session.php';

if (isset($_POST['savepayment'])) {
    $paymentorno = $_POST['_paymentorno'];
    $paymentstudentid = $_POST['_paymentstudentid'];
    $studentpayamount = $_POST['_studentpayamount'];
    $studentbalance = $_POST['_studentbalance'];
    $datenow = date('Y-m-d');
 
   

    $sql = "INSERT INTO `payment`(`or_no`,`date_payment`,`student_id`, `amount_paid`, `balance`,`delstatus`)
    VALUES ('$paymentorno ','$datenow','$paymentstudentid', '$studentpayamount','$studentbalance',1)";
      if ($conn->query($sql)) {
        $_SESSION['success'] = 'Account Payment Processed Successfully';
    } else {
        $_SESSION['error'] = $conn->error . "Fill up the form correctly!";
    }

 
}

header('location: payment.php');
?>