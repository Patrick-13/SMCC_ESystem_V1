
<?php
include 'includes/conn.php';


    $datefrom = $_POST['datefrom'];
    $dateto = $_POST['dateto'];
    $sql = "SELECT * FROM `payment` 
    left join students_information on payment.student_id = students_information.student_id 
    where payment.date_payment BETWEEN '$datefrom' and '$dateto'";
    $query = $conn->query($sql);
    $studenttuition = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "or_no" => $row['or_no'],
            "date_payment" => $row['date_payment'],
            "student_id" => $row['student_id'],
            "lastname" => $row['lastname'],
            "firstname" => $row['firstname'],
            "middlename" => $row['middlename'],
            "amount_paid" => $row['amount_paid']

        );
        array_push($studenttuition, $temp);
    }
    echo json_encode($studenttuition);



?>