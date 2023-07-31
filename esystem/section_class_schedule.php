<?php
include 'includes/conn.php';


$grade_level = $_POST['grade_level'];
$class_schedule = $_POST['class_schedule'];

$sql = "SELECT * FROM `sections` WHERE `grade_level`='$grade_level' AND `class_schedule`='$class_schedule'";
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

?>
