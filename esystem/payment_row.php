<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, payment.id as pay_id FROM payment 
        left join students_information on payment.student_id = students_information.student_id  WHERE payment.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>