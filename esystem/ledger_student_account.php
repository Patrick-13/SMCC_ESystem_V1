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



if(isset($_POST['ledger_print'])){
$id = $_POST['ledger_print'];

$pdf = new FPDF('P', 'mm', 'a4');
$pdf->setFont('arial', 'b', '8');
$pdf->AddPage();
$pdf->Ln(20);
$pdf->Image('../img/smccheader.png',10,10,200);
$pdf->Ln(10);



$sql = "SELECT *, voucher.v_tuition_fee/8 as breakdown from admission 
left join students_information on admission.student_id = students_information.student_id
left join tracks_strands on admission.track_strand =  tracks_strands.id
left join ledger on admission.student_id = ledger.studentid
left join voucher on ledger.payment_type = voucher.id
 where admission.id = 1";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
       $studentid = $row['student_id']; 
       $lastname = $row['lastname'];
       $firstname = $row['firstname'];
       $fullname = $lastname . ', ' .$firstname;
       $strand = $row['strand_code'];
       $grade = $row['grade_level'];
       $vouchertype = $row['voucher_type'];
       $tuitionfee = $row['v_tuition_fee'];
       $tuitionbreakdown = $row['breakdown'];
       //$users = $user['user_type'];


    }            
$pdf->Rect(5, 5, 200, 285, 'D');   
$pdf->setFont('arial', 'b', '20');
$pdf->Cell('200','10','STATEMENT OF ACCOUNT','0','0','C');
$pdf->Ln(20);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('40','5','Student Id:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('5','5',$studentid,'0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('50','5','Student Name:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('35','5',$fullname,'0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('40','5','Strand:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-10','5',$strand,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('44','5','Grade Level:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-10','5',$grade,'0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('72','5','Voucher Type:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('2','5',$vouchertype,'0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('82','5','Tuition Fee:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-40','5',$tuitionfee,'0','0','C');
$pdf->Ln(15);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('82','5','Tuition Fee Break Down:','0','0','C');
$pdf->Ln(15);
$pdf->Cell('100','5','1st Exam:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','2nd Exam:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','3rd Exam:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','4th Exam:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','5th Exam:','0','0','C');
$pdf->setFont('arial', '', '15');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','6th Exam:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','7th Exam:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','8th Exam:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionbreakdown,'0','0','C');
$pdf->Ln(10);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','Total:','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('-25','5',$tuitionfee,'0','0','C');
$pdf->Ln(30);
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('100','5','School Cashier:','0','0','C');
$pdf->setFont('arial', '', '12');




}
            



$pdf->Output();

?>
