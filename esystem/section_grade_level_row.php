<?php
include 'includes/conn.php';

if (isset($_POST['grade_level'])) {
    $sql = "SELECT * FROM `sections` WHERE `grade_level`='" . $_POST['grade_level'] . "'";
    $query = $conn->query($sql);
    $result = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "id" => $row['id'],
            "section_name" => $row['section_name']
        );
        array_push($result, $temp);
    }
    echo json_encode($result);
}
