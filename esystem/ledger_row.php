<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `ledger` 
    left join admission on ledger.studentid = admission.student_id
    left join students_information on admission.student_id = students_information.student_id
    left join tracks_strands on admission.track_strand = tracks_strands.id
    WHERE ledger.ledger_id ='$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);
}
?>
