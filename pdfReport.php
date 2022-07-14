<?php
require('fpdf.php');

class PDF extends FPDF{
 

    function header(){
        $this->SetFont('Times','B',9);
        $this->Cell(25, 10,'product_id',0,0,'C');
        $this->Cell(25, 10,'product_cat',0,0,'C');
        $this->Cell(25, 10,'product_title',0,0,'C');
        $this->Cell(25, 10,'product_price',0,0,'C');
        $this->Cell(25, 10,'product_desc',0,0,'C');
        $this->Cell(30, 10,'product_image',0,0,'C');
        $this->Cell(25, 10,'product_keywords',0,0,'C');
        $y= $this->GetY();
        $this->Line(10,10,199,10);
        $this->Line(10,10,10,200);
        $this->Line(199,10,199,200);
        $this->Line(10,200,199,200);
        $this->Line(10,$y,199,$y);
        $this->Line(35,10,35,200);
        $this->Line(60,10,60,200);
        $this->Line(85,10,85,200);
        $this->Line(110,10,110,200);
        $this->Line(140,10,140,200);
        $this->Line(165,10,165,200);
    }
}


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',9);

$con = mysqli_connect('localhost','root', '', 'furnstore');
$sql = "select * from products where product_title='{$_POST['product']}' ";
$result = mysqli_query($con, $sql);
$h = 10;
while ($rows = mysqli_fetch_array($result)){
   
    $y= $pdf->GetY();
    $y1= $pdf->GetY();
    $pdf->SetY($y);
    $pdf->Line(10,$y1+7,199,$y1+7);
    $pdf->SetY($y1+5);
    $pdf->Cell(25, $h, $rows['product_id'],0,0,'C');
    $pdf->Cell(30, $h, $rows['product_cat'],0,0,'C');
    $pdf->Cell(30, $h, $rows['product_title'],0,0);
    
    $pdf->Cell(15, $h, $rows['product_price'],0,0);
   
    
    $pdf->Cell(35, $h, $rows['product_desc'],0,0);
    $pdf->MultiCell(20, $h, $rows['product_image'],0,'L');

    $pdf->Cell(155, $h, '');
    $pdf->Cell(30, 5, $rows['product_keywords'],0,0);
   
    
    
   
    
    
}

$pdf->Output();
?> 