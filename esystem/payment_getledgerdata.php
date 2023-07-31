
<?php
include 'includes/conn.php';

if (isset($_POST['top'])) {

    $top = $_POST['top'];
    $sql = "SELECT * FROM `ledger`
    left join admission on ledger.studentid = admission.student_id 
    left join students_information on admission.student_id = students_information.student_id
    left join voucher on ledger.payment_type = voucher.id
    where voucher.voucher_type = '$top'";
    $query = $conn->query($sql);
    $typeofpayment = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "student_id" => $row['student_id'],
            "lastname" => $row['lastname'],
            "firstname" => $row['firstname'],
            "middlename" => $row['middlename'],
            "tuition_fee" => $row['tuition_fee'],
            "payment_type" => $row['payment_type'],

        );
        array_push($typeofpayment, $temp);
    }
    echo json_encode($typeofpayment);
}


?>