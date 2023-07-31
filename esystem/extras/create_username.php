<?php
include '../includes/session.php';

if (isset($_GET['empno'])) {
    $id = $_GET['empno'];
    $sql = "SELECT * FROM `employees` WHERE employee_id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
    echo strtolower($row['lastname'] . '.' . substr($row['firstname'], 0, 1) . substr($row['middlename'], 0, 1));
} else {
    echo '';
}
