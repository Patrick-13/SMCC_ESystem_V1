<?php
include 'includes/session.php';

if (isset($_POST['saveexpenses'])) {
    $expenses_paymentorno = $_POST['expenses_paymentorno'];
    $expenses_paymentstudentid = $_POST['expenses_paymentstudentid'];
    $expenses_studentpayamount = $_POST['expenses_studentpayamount'];
    $datenow = date('Y-m-d');
 
   

    $sql = "INSERT INTO `expenses`(`date_expenses`, `expenses_or`, `name`, `amount_paid`, `delstatus`)
    VALUES ('$datenow ','$expenses_paymentorno','$expenses_paymentstudentid', '$expenses_studentpayamount',1)";
      if ($conn->query($sql)) {
        $_SESSION['success'] = 'Expenses Recorded Successfully';
    } else {
        $_SESSION['error'] = $conn->error . "Fill up the form correctly!";
    }

 
}

header('location: payment.php');
?>