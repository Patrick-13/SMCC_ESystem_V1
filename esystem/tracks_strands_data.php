<?php
include 'includes/conn.php';

if (isset($_POST['id'])) {
    $sql = "SELECT * FROM `tracks_strands` WHERE `track_name`='" . $_POST['id'] . "'";
    $query = $conn->query($sql);
    $result = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "id" => $row['id'],
            "strand_name" => $row['strand_name']
        );
        array_push($result, $temp);
    }
    echo json_encode($result);
}
