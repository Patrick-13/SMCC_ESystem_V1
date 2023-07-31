<?php

include 'includes/session.php';
include '../fpdf/fpdf.php';

class PDF extends FPDF{
  function Header(){
      $this->Image('../img/logo.png',0,0);
          
  }
  function Footer(){
      $this->SetY(-15);
      $this->Image('../images/announcement/footer-logo.jpg', 0,0);
  }
}

if(isset($_POST['print'])){
    $datefrom = $_POST['datefrom'];
    $dateto = $_POST['dateto'];

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->setFont('arial', 'b', '8');
$pdf->AddPage();
$pdf->Ln(20);
$pdf->Image('../img/smccheader.png',10,10,200);
$pdf->Ln(10);
$pdf->Rect(5, 5, 205, 270, 'D');  
$pdf->setFont('arial', 'b', '15'); 
$pdf->Cell('200','10','COLLECTION REPORT AND EXPENSES','0','0','C');
$pdf->Ln(20);

$pdf->setFont('arial', 'b', '12'); 
$pdf->Cell('30','5','Date','1','0','C');
$pdf->Cell('30','5','OR #','1','0','C');
$pdf->Cell('75','5','Name','1','0','C');
$pdf->Cell('30','5','Amount Paid','1','0','C');
$pdf->Cell('30','5','Expenses','1','0','C');
$pdf->Ln();


$sql = "SELECT * FROM `payment` 
left join students_information on payment.student_id = students_information.student_id 
where payment.date_payment BETWEEN '$datefrom' and '$dateto'";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()) {

$orno = $row['or_no'];
$date = $row['date_payment'];
$name = $row['lastname'].', '.$row['firstname'];
$payment = $row['amount_paid'];




$pdf->setFont('arial', '', '12');
$pdf->Cell('30','5',$date,'1','0','C');
$pdf->Cell('30','5',$orno,'1','0','C');
$pdf->Cell('75','5',$name,'1','0','C');
$pdf->Cell('30','5',$payment,'1','0','C');
$pdf->Cell('30','5',$payment,'1','0','C');
$pdf->Ln();
}


$pdf->Cell('135','5','','1','0','C');
$pdf->setFont('arial', 'b', '12'); 
$pdf->Cell('30','5','Total','1','0','C');
$pdf->setFont('arial', '', '12'); 

$sql_ = "SELECT sum(payment.amount_paid) as total FROM `payment` left join students_information on payment.student_id = students_information.student_id 
where payment.date_payment BETWEEN '$datefrom' and '$dateto'";
$query_ = $conn->query($sql_);
while ($row_ = $query_->fetch_assoc()){
$total_ = $row_['total'];
}
$pdf->Cell('30','5',$total_,'1','0','C');

}
$pdf->Output();  
           
?>
