
<?php
include 'includes/conn.php';

if (isset($_POST['tuition'])) {

    $tuition = $_POST['tuition'];
    $sql = "SELECT * FROM `voucher` 
     where id = '$tuition'";
    $query = $conn->query($sql);
    $vouchertype = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "id" => $row['id'],
            "voucher_type" => $row['voucher_type'],
            "v_tuition_fee" => $row['v_tuition_fee']
         

        );
        array_push($vouchertype, $temp);
    }
    echo json_encode($vouchertype);
}


?>