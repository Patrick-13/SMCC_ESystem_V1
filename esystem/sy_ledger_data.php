
<?php
include 'includes/conn.php';

if (isset($_POST['schoolyear'])) {

    $sy = $_POST['schoolyear'];
    $sql = "SELECT * FROM `admission` 
    left join students_information on admission.student_id = students_information.student_id
    left join tracks_strands on admission.track = tracks_strands.id
     where YEAR(admission.enrollment_date) = '$sy'";
    $query = $conn->query($sql);
    $ledgername = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "student_id" => $row['student_id'],
            "lastname" => $row['lastname'],
            "firstname" => $row['firstname'],
            "middlename" => $row['middlename'],
            "strand_code" => $row['strand_code']

        );
        array_push($ledgername, $temp);
    }
    echo json_encode($ledgername);
}


?>