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
        $this->Cell(190,5,'ORDERS REPORT',0,0,'C');
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
        $this->SetFont('Times','B',12);
        $this->SetTextColor(0,0,0);
        $this->Cell(20,12,'Order ID',1,0,'L');
        $this->Cell(41,12,'Customer Name',1,0,'L');
        $this->Cell(30,12,'Total Price',1,0,'L');
        $this->Cell(37,12,'Payment Method',1,0,'L');
        $this->Cell(32,12,'Order Status',1,0,'L');
        $this->Cell(30,12,'Date & Time',1,0,'L');
        $this->Ln();
    }
    
    function viewTable($conn){
        $this->SetFont('Times','',12);
        $this->SetTextColor(0,0,0);

        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];

        $stmt = $conn->query("SELECT * FROM orders JOIN customer ON orders.customer_id=customer.customer_id WHERE orders.order_datetime BETWEEN '$from_date' AND '$to_date' && (orders.order_status = 'Delivered') != (orders.order_status = 'Cancelled') ORDER BY `orders`.`order_id` DESC");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->SetFont('Times','',11);
        $this->SetTextColor(0,0,0);
        $this->Cell(20,10,$data->order_id,1,0,'C');
        $this->Cell(41,10,$data->name,1,0,'L');
        $this->Cell(30,10,$data->total_price,1,0,'L');
        $this->Cell(37,10,$data->payment_method,1,0,'L');

        if($data->order_status == 'Cancelled'){
        $this->SetTextColor(255,0,0);
        $this->Cell(32,10,$data->order_status,1,0,'L');
        }
        if($data->order_status == 'Delivered'){
            $this->SetTextColor(0,255,0);
            $this->Cell(32,10,$data->order_status,1,0,'L');
            }
        if($data->order_status == 'Order Placed'){
            $this->SetTextColor(0, 0, 139);
            $this->Cell(32,10,$data->order_status,1,0,'L');
            }
        $this->SetTextColor(0,0,0);
        $this->Cell(30,10,date('M j g:i A', strtotime($data->order_datetime)),1,0,'L');
        $this->Ln();
        }
        $stmt = $conn->query("SELECT COUNT(order_id) AS NumberOfOrders FROM orders WHERE order_datetime BETWEEN '$from_date' AND '$to_date' && order_status = 'Delivered'");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->Ln();
        $this->SetFont('Arial','B',15);
        $this->Cell(110,10,'Total Delivered Orders:',0,0,'R');
        $this->Cell(11,10,$data->NumberOfOrders,0,0,'R');
        $this->Cell(-1,10,'',0,0,'L');
        }
        $stmt = $conn->query("SELECT COUNT(order_id) AS NumberOfOrders FROM orders WHERE order_datetime BETWEEN '$from_date' AND '$to_date' && order_status = 'Cancelled'");
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this->Ln();
        $this->SetFont('Arial','B',15);
        $this->Cell(110,10,'Total Cancelled Orders:',0,0,'R');
        $this->Cell(11,10,$data->NumberOfOrders,0,0,'R');
        $this->Cell(-1,10,'',0,0,'L');
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