
<?php
include 'includes/conn.php';

if (isset($_POST['studentid'])) {

    $studentid = $_POST['studentid'];
    $sql = "SELECT * FROM `ledger`
    left join admission on ledger.studentid = admission.student_id 
    left join students_information on admission.student_id = students_information.student_id
    left join tracks_strands on admission.track = tracks_strands.id
    where admission.student_id = '$studentid'";
    $query = $conn->query($sql);
    $studenttuition = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "grade_level" => $row['grade_level'],
            "strand_code" => $row['strand_code'],
            "tuition_fee" => $row['tuition_fee']

        );
        array_push($studenttuition, $temp);
    }
    echo json_encode($studenttuition);
}


?>