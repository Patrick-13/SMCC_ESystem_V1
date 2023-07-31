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



$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->setFont('arial', 'b', '8');
$pdf->AddPage();
$pdf->Ln(20);
$pdf->Image('../img/smccheader.png',10,10,200);
$pdf->Ln(10);

if(isset($_POST['coe'])){
  $studid = $_POST['coe'];

$sql = "SELECT * from students_information
left join admission on students_information.student_id = admission.student_id 
left join sections on admission.section = sections.id
left join school_year on admission.sy_semester = school_year.id where students_information.student_id = $studid";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$fullname = $lastname.',  '.$firstname;
$grade = $row['grade_level'];
$section = $row['section_name'];
$sy = $row['school_year'];
$year = date('Y');
$month = date('F');
$day = date('j');
$sy_ = $sy.'-'.$year;
 

           
$pdf->Rect(5, 5, 205, 270, 'D');  
$pdf->setFont('arial', 'b', '15'); 
$pdf->Cell('200','10','CERTIFICATE OF ENROLMENT','0','0','C');
$pdf->Ln(25);
$pdf->setFont('arial', '', '12');
$pdf->Cell('80','5','This is to certify that','0','0','C');
$pdf->setFont('arial', 'u', '12');
$pdf->Cell('12','5',$fullname,'0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('60','5','with LRN:','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('-15','5','12609815022','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('80','5','is officially enrol      ','0','0','C');
$pdf->Ln(5);
$pdf->Cell('32','5','-led in Grade','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('-2','5',$grade,'0','0','C');
$pdf->Cell('10','5','-','0','0','C');
$pdf->Cell('15','5',$section,'0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('12','5','at','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('83','5','Southern Mindanao Computer College, Inc.,','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('50','5','Del Pilar Street,       ','0','0','C');
$pdf->Ln(5);
$pdf->Cell('52','5','Digos City School Year','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('18','5',$sy_.'.','0','0','C');
$pdf->Ln(10);

$pdf->setFont('arial', '', '12');
$pdf->Cell('210','5','This certification is issued upon the request of the above mention for whatever legal purp','0','0','C');
$pdf->Ln(5);
$pdf->Cell('65','5','-ose it may serve him/her best.','0','0','C');

$pdf->Ln(10);
$pdf->setFont('arial', '', '12');
$pdf->Cell('63','5','Given this','0','0','C');
$pdf->Cell('-23','5',$day.'th day of','0','0','C');
$pdf->Cell('56','5',$month,'0','0','C');
$pdf->Cell('-33','5',$year,'0','0','C');
$pdf->Cell('144','5','at Southern Mindanao Computer College, Inc., Del Pi','0','0','C');
$pdf->Ln(5);
$pdf->Cell('110','5','-lar Street Digos City, Davao del Sur, Philippines, 8002.','0','0','C');
$pdf->Ln(60);
$pdf->Cell('63','5','School Seal','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('160','5','Ermelinda T. Arche','0','0','C');
$pdf->Ln(5);
$pdf->setFont('arial', '', '12');
$pdf->Cell('286','5','School Administrator','0','0','C');
}
}

if(isset($_POST['goodmoral'])){
  $studid = $_POST['goodmoral'];

$sql = "SELECT * from students_information
left join admission on students_information.student_id = admission.student_id 
left join sections on admission.section = sections.id
left join school_year on admission.sy_semester = school_year.id where students_information.student_id = $studid";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$fullname = $lastname.',  '.$firstname;
$grade = $row['grade_level'];
$section = $row['section_name'];
$sy = $row['school_year'];
$year = date('Y');
$month = date('F');
$day = date('j');
$sy_ = $sy.'-'.$year;


         
$pdf->Rect(5, 5, 205, 255, 'D');  
$pdf->setFont('arial', 'b', '15'); 
$pdf->Cell('200','10','CERTIFICATE OF GOODMORAL CHARACTER','0','0','C');
$pdf->Ln(25);
$pdf->setFont('arial', '', '12');
$pdf->Cell('80','5','This is to certify that','0','0','C');
$pdf->setFont('arial', 'u', '12');
$pdf->Cell('5','5',$fullname,'0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('60','5','with LRN:','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('-15','5','12609815022','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('80','5',' a bonafide student','0','0','C');
$pdf->Ln(5);
$pdf->Cell('24','5','in Grade','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('-2','5',$grade,'0','0','C');
$pdf->Cell('10','5','-','0','0','C');
$pdf->Cell('8','5',$section,'0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('12','5','at','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('83','5','Southern Mindanao Computer College, Inc.,','0','0','C');
$pdf->setFont('arial', '', '12');
$pdf->Cell('56','5','Del Pilar Street, Digos City','0','0','C');
$pdf->Ln(5);
$pdf->Cell('30','5','School Year','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('18','5',$sy_.'.','0','0','C');

$pdf->Ln(10);
$pdf->setFont('arial', '', '12');
$pdf->Cell('210','5','This further certifies that he/she is a law-abiding student with a good moral character and','0','0','C');
$pdf->Ln(5);
$pdf->Cell('152','5','that he/she bears no record of misdemeanor during his/her stay in this school.','0','0','C');

$pdf->Ln(10);
$pdf->setFont('arial', '', '12');
$pdf->Cell('210','5','This certification is issued upon the request of the above mention for whatever legal purp','0','0','C');
$pdf->Ln(5);
$pdf->Cell('65','5','-ose it may serve his/her best.','0','0','C');

$pdf->Ln(10);
$pdf->setFont('arial', '', '12');
$pdf->Cell('63','5','Given this','0','0','C');
$pdf->Cell('-23','5',$day.'th day of','0','0','C');
$pdf->Cell('56','5',$month,'0','0','C');
$pdf->Cell('-33','5',$year,'0','0','C');
$pdf->Cell('144','5','at Southern Mindanao Computer College, Inc., Del Pi','0','0','C');
$pdf->Ln(5);
$pdf->Cell('110','5','-lar Street Digos City, Davao del Sur, Philippines, 8002.','0','0','C');
$pdf->Ln(60);
$pdf->Cell('63','5','School Seal','0','0','C');
$pdf->setFont('arial', 'b', '12');
$pdf->Cell('160','5','Ermelinda T. Arche','0','0','C');
$pdf->Ln(5);
$pdf->setFont('arial', '', '12');
$pdf->Cell('286','5','School Administrator','0','0','C');
}
}
$pdf->Output();  
           
?>
