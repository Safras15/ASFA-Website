<?php

//including the database connection file.
include_once("Includes/connect.php");

require ('fpdf.php');


$conn = new PDO('mysql:host=localhost;dbname=asfa','root','');

class myPDF extends FPDF{
    function header(){
        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];

        $this->Image('../Images/NewLogo.png',10,9,30);
        $this->SetFont('Arial','B',14);
        $this->Cell(190,5,'STOCK REPORT',0,0,'C');
        $this->SetFont('Arial','B',11);
        $this->SetTextColor(0,0,0);
        $this->Cell(-30,10,'',0,0,'L');
        $this->Cell(-40,5,'Date Duration',0,0,'L');
        $this->Ln();
        $this->SetFont('Times','B',13);
        $this->SetTextColor(255,0,0);
        $this->Cell(190,10,'ASFA INTERNATIONAL (PVT) LTD',0,0,'C');
        $this->SetFont('Arial','',10);
        $this->SetTextColor(0,0,0);
        $this->Cell(-32,10,'',0,0,'L');
        $this->Cell(-80,10,'From:',0,0,'L');
        $this->Cell(92,10,'',0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(20,10,$from_date,0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',11);
        $this->SetTextColor(0,0,128);
        $this->Cell(190,0,'Address: No.45, Messenger Street, Colombo-12, Sri Lanka.',0,0,'C');
        $this->SetFont('Arial','',10);
        $this->SetTextColor(0,0,0);
        $this->Cell(-32,0,'',0,0,'L');
        $this->Cell(-80,0,'To:',0,0,'L');
        $this->Cell(92,0,'',0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(20,0,$to_date,0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',11);
        $this->SetTextColor(0,0,128);
        $this->Cell(190,9,'Tel: 0114332153 | Mob: 0777349991',0,0,'C');
        $this->Ln(20);
        }
    }   

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->SetFont('Times','B',13);
        $this->SetTextColor(0,0,0);
        $this->Cell(12,12,'ID',1,0,'L');
        $this->Cell(47,12,'Product',1,0,'L');
        $this->Cell(28,12,'Size',1,0,'L');
        $this->Cell(35,12,'Price',1,0,'L');
        $this->Cell(30,12,'Quantity',1,0,'L');
        $this->Cell(38,12,'Date & Time',1,0,'L');
        $this->Ln();
    }
    
    function viewTable($conn){
        $this->SetFont('Times','',12);
        $this->SetTextColor(0,0,0);

        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];

        $stmt = $conn->query("select * FROM product JOIN category ON product.cat_id=category.cat_id WHERE product.time BETWEEN '$from_date' AND '$to_date' ORDER BY `product`.`time` DESC");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->SetFont('Times','',12);
        $this->Cell(12,10,$data->product_id,1,0,'C');
        $this->Cell(47,10,$data->product_name,1,0,'L');
        $this->Cell(28,10,$data->product_size,1,0,'L');
        $this->Cell(35,10,$data->product_price,1,0,'L');
        $this->Cell(30,10,$data->product_quantity,1,0,'L');
        $this->Cell(38,10,date('M j g:i A', strtotime($data->time)),1,0,'L');
        $this->Ln();
        }
        $stmt = $conn->query("SELECT SUM(product_quantity) AS TotalProducts FROM product WHERE product.time BETWEEN '$from_date' AND '$to_date'");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->Ln();
        $this->SetFont('Arial','B',15);
        $this->Cell(100,10,'Total Product Quantity:',0,0,'R');
        $this->Cell(16,10,$data->TotalProducts,0,0,'R');
        $this->Cell(-1,10,'',0,0,'L');
        $this->Cell(3,10,'Cases',0,0,'L');
        $this->Ln();
        }
      }
    }
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable($conn);
$pdf->Output();

?>