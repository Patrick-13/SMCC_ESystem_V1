<?php
include 'includes/session.php';

if (isset($_POST['upload'])) {
    $employee_id = $_POST['employee_id'];
    $active = $_POST['active'];
    $filename = $_FILES['photo']['name'];

    if (!empty($filename)) {
        move_uploaded_file($_FILES['photo']['tmp_name'], '../img/employees/' . $filename);
    }
    $sql = "UPDATE `employees` SET photo = '$filename' WHERE `employee_id` = '$employee_id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, photo updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . ". Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
} else {
    $_SESSION['error'] = $conn->error;
}

header('location: employee_profile.php?employee_id=' . $employee_id . '&active=' . $active . '');
