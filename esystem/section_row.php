<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT *, sections.id AS section_id FROM `sections` LEFT JOIN schedules ON sections.class_schedule=schedules.id WHERE sections.id ='$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);
}
