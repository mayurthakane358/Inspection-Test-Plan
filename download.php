<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );



$id=$_GET['id']; 


$query=mysqli_query($conn,"select t1.*,t2.* from create_job t1, create_job_items t2 WHERE t1.invoice_id = t2.invoice_id AND t1.invoice_id='$id' LIMIT 1");

while($rows=mysqli_fetch_array($query))
{
   $fn=$rows['file_name'];
   $ln=$rows['customer_id'];
   $mob=$rows['part_number'];
   $add=$rows['cust_draw_no'];
   $stotal=$rows['po_number'];
   $dis=$rows['itp_number'];
   $chrge=$rows['itp_revision_level'];
   $ftotal=$rows['rgpl_draw_no'];
   $jama=$rows['drawing_revision'];
   $baki=$rows['rtp_revision_date'];
  
   
}
require('fpdf182/fpdf.php');

$pdf = new FPDF('P','mm',array(500,460));
//add new page

$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1 ,5,'',0,0);
$pdf->Cell(10 ,0,'',0,0);
$pdf->Image('img/Ratna gears logo.png',220,5,40);
$pdf->Cell(230 ,0,'',0,0);
$pdf->Cell(10 ,5,'',0,1);
$pdf->Cell(240 ,0,'',0,0);
$pdf->Cell(10 ,5,'',0,1);
$pdf->Rect(5, 5, 450, 105, 'D');
$pdf->SetFont('Arial','B',9);



$pdf->SetY(35);
$pdf->SetFont('Arial','',13);
$pdf->Cell(90 ,20,'',50,0);
$pdf->Cell(30 ,30,'File Name:',50,0);
$pdf->Cell(40 ,30,"$fn",50,0);
$pdf->Cell(35 ,30,'Customer Id:',50,0);
$pdf->Cell(20 ,30,"$ln",50,0);
$pdf->Cell(25 ,30,'Part No:',50,0);
$pdf->Cell(25 ,30,"$mob",50,0);
$pdf->Cell(35 ,30,'Cust draw no:',50,0);
$pdf->Cell(25 ,30,"$add",50,0);
$pdf->Cell(20 ,30,'Po no:',50,0);
$pdf->Cell(30 ,30,"$stotal",50,1);

$pdf->SetY(55);
$pdf->SetFont('Arial','',13);
$pdf->Cell(90 ,20,'',50,0);
$pdf->Cell(25 ,30,'ITP No:',50,0);
$pdf->Cell(40 ,30,"$dis",50,0);
$pdf->Cell(35 ,30,'ITP Level:',50,0);
$pdf->Cell(20 ,30,"$chrge",50,0);
$pdf->Cell(25 ,30,'RGPL No:',50,0);
$pdf->Cell(25 ,30,"$ftotal",50,0);
$pdf->Cell(35 ,30,'Drawing Rev.:',50,0);
$pdf->Cell(25 ,30,"$jama",50,0);
$pdf->Cell(15 ,30,'Date:',50,0);
$pdf->Cell(30 ,30,"$baki",50,1);


$pdf->SetY(75);
$pdf->SetFont('Arial','',10);
$pdf->Rect(5,85, 445, 10, 'D');
$pdf->Cell(-5 ,20,'',50,0);
$pdf->Cell(15 ,30,'Sr.no',50,0,'C');
$pdf->Cell(20 ,30,'Draw L',50,0,'C');
$pdf->Cell(20 ,30,'Ballon.no',50,0,'C');
$pdf->Cell(22 ,30,'Charact',50,0,'C');
$pdf->Cell(20 ,30,'Spec.Dim',50,0,'C');
$pdf->Cell(20 ,30,'Up.Tol',50,0,'C');
$pdf->Cell(20 ,30,'Low.Tol',50,0,'C');
$pdf->Cell(24 ,30,'Up Dim',50,0,'C');
$pdf->Cell(22 ,30,'Low Dim',50,0,'C');
$pdf->Cell(35 ,30,'Instr.',50,0,'C');
$pdf->Cell(15 ,30,'JL1',50,0,'C');
$pdf->Cell(15 ,30,'JL2',50,0,'C');
$pdf->Cell(15 ,30,'JL3',50,0,'C');
$pdf->Cell(15 ,30,'JL4',50,0,'C');
$pdf->Cell(15 ,30,'JL5',50,0,'C');
$pdf->Cell(15 ,30,'JL6',50,0,'C');
$pdf->Cell(15 ,30,'JL7',50,0,'C');
$pdf->Cell(15 ,30,'JL8',50,0,'C');
$pdf->Cell(15 ,30,'JL9',50,0,'C');
$pdf->Cell(15 ,30,'JL10',50,0,'C');
$pdf->Cell(15 ,30,'JL11',50,0,'C');
$pdf->Cell(15 ,30,'JL12',50,0,'C');
$pdf->Cell(15 ,30,'JL13',50,0,'C');
$pdf->Cell(15 ,30,'JL14',50,0,'C');
$pdf->Cell(20 ,30,'JL15',50,0,'C');



$pdf->SetY(100);
  $cnt=1;  
  $query="select t1.*,t2.* from create_job t1, create_job_items t2 WHERE t1.invoice_id = t2.invoice_id AND t1.invoice_id='$id'";
  $result=mysqli_query($conn,$query);

  while($rows= mysqli_fetch_array($result))
  {
    
      
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(-2,5,'',50,0);
$pdf->Cell(12 ,5,"$cnt",50,0);
$pdf->Rect(5,85, 15, 25, 'D');
$pdf->Cell(15 ,5,$rows['draw_location'],50,0,'C');
$pdf->Rect(20,85, 21, 25, 'D');
$pdf->Cell(28 ,5,$rows['ballon_no'],50,0,'C');
$pdf->Rect(41,85, 21, 25, 'D');
$pdf->Cell(10 ,5,$rows['characteristics'],50,0,'C');
$pdf->Rect(62,85, 21, 25, 'D');
$pdf->Cell(28 ,5,$rows['spcified_dimention'],50,0,'C');
$pdf->Rect(83,85, 21, 25, 'D');
$pdf->Cell(21 ,5,$rows['upper_tolerance'],50,0,'C');
$pdf->Rect(104,85, 21, 25, 'D');
$pdf->Cell(20 ,5,$rows['lower_tolerance'],50,0,'C');
$pdf->Rect(125,85, 21, 25, 'D');
$pdf->Cell(18 ,5,$rows['upper_dimention'],50,0,'C');
$pdf->Rect(146,85, 21, 25, 'D');
$pdf->Cell(20 ,5,$rows['lower_dimention'],50,0,'C');
$pdf->Rect(167,85, 21, 25, 'D');
$pdf->Cell(40 ,5,$rows['measuring_instrument'],50,0,'C');
$pdf->Rect(188,85, 37, 25, 'D');

if ($rows['job_value'] >= $rows['lower_dimention'] AND $rows['job_value'] <= $rows['upper_dimention'])
{
$pdf->SetTextColor(0,255,0);  
$pdf->Cell(15 ,5,$rows['job_value'],50,0,'C');
$pdf->Rect(225,85, 15, 25, 'D');
} 
else
{
$pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value'],50,0,'C');
$pdf->Rect(225,85, 15, 25, 'D');
}

if ($rows['job_value2'] >= $rows['lower_dimention'] AND $rows['job_value2'] <= $rows['upper_dimention'])
{
$pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value2'],50,0,'C');
$pdf->Rect(240,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value2'],50,0,'C');
$pdf->Rect(240,85, 15, 25, 'D');  
}


if ($rows['job_value3'] >= $rows['lower_dimention'] AND $rows['job_value3'] <= $rows['upper_dimention'])
{
$pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value3'],50,0,'C');
$pdf->Rect(255,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value3'],50,0,'C');
$pdf->Rect(255,85, 15, 25, 'D');  
}

if ($rows['job_value4'] >= $rows['lower_dimention'] AND $rows['job_value4'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value4'],50,0,'C');
$pdf->Rect(270,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value4'],50,0,'C');
$pdf->Rect(270,85, 15, 25, 'D');  
}

if ($rows['job_value5'] >= $rows['lower_dimention'] AND $rows['job_value5'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value5'],50,0,'C');
$pdf->Rect(285,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value5'],50,0,'C');
$pdf->Rect(285,85, 15, 25, 'D');  
}

if ($rows['job_value6'] >= $rows['lower_dimention'] AND $rows['job_value6'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value6'],50,0,'C');
$pdf->Rect(300,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value6'],50,0,'C');
$pdf->Rect(300,85, 15, 25, 'D'); 
}

if ($rows['job_value7'] >= $rows['lower_dimention'] AND $rows['job_value7'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value7'],50,0,'C');
$pdf->Rect(315,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value7'],50,0,'C');
$pdf->Rect(315,85, 15, 25, 'D');  
}

if ($rows['job_value8'] >= $rows['lower_dimention'] AND $rows['job_value8'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value8'],50,0,'C');
$pdf->Rect(330,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value8'],50,0,'C');
$pdf->Rect(330,85, 15, 25, 'D');  
}

if ($rows['job_value9'] >= $rows['lower_dimention'] AND $rows['job_value9'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value9'],50,0,'C');
$pdf->Rect(345,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value9'],50,0,'C');
$pdf->Rect(345,85, 15, 25, 'D');  
}

if ($rows['job_value10'] >= $rows['lower_dimention'] AND $rows['job_value10'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value10'],50,0,'C');
$pdf->Rect(360,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value10'],50,0,'C');
$pdf->Rect(360,85, 15, 25, 'D');  
}

if ($rows['job_value11'] >= $rows['lower_dimention'] AND $rows['job_value11'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value11'],50,0,'C');
$pdf->Rect(375,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value11'],50,0,'C');
$pdf->Rect(375,85, 15, 25, 'D');  
}

if ($rows['job_value12'] >= $rows['lower_dimention'] AND $rows['job_value12'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value12'],50,0,'C');
$pdf->Rect(390,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value12'],50,0,'C');
$pdf->Rect(390,85, 15, 25, 'D');  
}

if ($rows['job_value13'] >= $rows['lower_dimention'] AND $rows['job_value13'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value13'],50,0,'C');
$pdf->Rect(405,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value13'],50,0,'C');
$pdf->Rect(405,85, 15, 25, 'D');  
}

if ($rows['job_value14'] >= $rows['lower_dimention'] AND $rows['job_value14'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value14'],50,0,'C');
$pdf->Rect(420,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value14'],50,0,'C');
$pdf->Rect(420,85, 15, 25, 'D');  
}

if ($rows['job_value15'] >= $rows['lower_dimention'] AND $rows['job_value15'] <= $rows['upper_dimention'])
{
  $pdf->SetTextColor(0,255,0); 
$pdf->Cell(15 ,5,$rows['job_value15'],50,0,'C');
$pdf->Rect(435,85, 15, 25, 'D');
} 
else
{
  $pdf->SetTextColor(255,0,0);
$pdf->Cell(15 ,5,$rows['job_value15'],50,1,'C');
$pdf->Rect(435,85, 15, 25, 'D');  
}

$cnt=$cnt+1;

}
//$pdf->Output('Invoice.pdf','D');

$pdf->Output();


}
?>