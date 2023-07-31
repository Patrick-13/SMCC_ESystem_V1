<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['loggedin-user']) || trim($_SESSION['loggedin-user']) == '') {
	header('location: ../index.php');
}

$sql = "SELECT *, employees.employee_id, users.user_type AS usertype_id, user_types.user_type AS user_type_name FROM `users` 
LEFT JOIN `employees` ON users.employee_id=employees.employee_id 
LEFT JOIN user_types ON users.user_type = user_types.id
WHERE users.employee_id = '" . $_SESSION['loggedin-user'] . "'";

$query = $conn->query($sql);
$user = $query->fetch_assoc();
