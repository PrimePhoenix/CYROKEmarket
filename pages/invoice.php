<?php
/*call the FPDF library*/
require('../fpdf184/fpdf.php');
session_start();
require("../database/include/connection.php");
/*A4 width : 219mm*/
$fullname=$_SESSION['fullname'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
$street=$_SESSION['street'];
$town=$_SESSION['town'];
$parish=$_SESSION['parish'];
$Store="";
$OrderID="";
if(isset($_GET['SN']))
{
	$Store=$_GET['SN'];
}

if(isset($_GET['OID']))
{
	$OrderID=$_GET['OID'];

}
$_SESSION['location']="";

function getDeliveryinfo($OrderID)
{
	 
	  $location="";
	  $DateandTime="";
	  $connect=OpenCon();
	  $sql = "SELECT DeliveryAddress,DeliveryTime,DeliveryDate FROM delivery where OrderID='$OrderID'";
		  $result = $connect->query($sql);

		 if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
				$_SESSION['location']="wdg";
				$_SESSION['location']=$row['DeliveryAddress'];
				$_SESSION['time']=$row['DeliveryTime'];
				$_SESSION['date']=$row['DeliveryDate'];
	}}

  }
  $products=array();

  function getproducts($OrderID)
  {
	   $prod=array();
		$connect=OpenCon();
		$sql = "SELECT ProductName,QuantityOrdered,Total FROM ordertable where OrderID='$OrderID'";
			$result = $connect->query($sql);
  
		   if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$data=$row['QunatityOrdered']." ".$row['ProductName']." for $".$row[Total];
				array_push($prod,$data);
	  }}
  return $prod;
	}
  

getDeliveryinfo($OrderID);
    $deliverylocation="Store Pickup";

$products=getproducts($OrderID);
$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

/*Cell(width , height , text , border , end line , [align] )*/

$pdf->Cell(50 ,10,'',0,0);
$pdf->Cell(70 ,5,'CYROK E-Market Reciept',0,0);
$pdf->Cell(59 ,10,'',0,1);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(71 ,5,'Billed To',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Order Details',0,1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,$fullname,0,0);
$pdf->Cell(25 ,5,'Store Name',0,0);
$pdf->Cell(34 ,5,$Store,0,1);

$pdf->Cell(130 ,5,'Phone:'.$phone,0,0);
$pdf->Cell(25 ,5,'Invoice Date:',0,0);
$pdf->Cell(34 ,5,'12th Jan 2019',0,1);
 
$pdf->Cell(130 ,5,$street,0,0);
$pdf->Cell(25 ,5,'Invoice No:',0,0);
$pdf->Cell(34 ,5,'ORD001',0,1);

$pdf->Cell(130 ,5,$town,0,0);
$pdf->Cell(25 ,5,'Payment:',0,0);
$pdf->Cell(34 ,5,'Credit Card',0,1);

$pdf->Cell(130 ,5,$parish,0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'Delivery Detail',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);

$pdf->SetFont('Arial','',10);
$pdf->Cell(20 ,5,'Delivery Location:Store Pickup',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(130 ,5,'Date and Time:',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);

$pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(10 ,6,'Sl',1,0,'C');
$pdf->Cell(80 ,6,'Description',1,0,'C');
$pdf->Cell(23 ,6,'Qty',1,0,'C');
$pdf->Cell(30 ,6,'Unit Price',1,0,'C');
$pdf->Cell(20 ,6,'Sales Tax',1,0,'C');
$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);
    for ($i = 0; $i <= 10; $i++) {
		$pdf->Cell(10 ,6,$i,1,0);
		$pdf->Cell(80 ,6,$products[$i],1,0);
		$pdf->Cell(23 ,6,'1',1,0,'R');
		$pdf->Cell(30 ,6,'15000.00',1,0,'R');
		$pdf->Cell(20 ,6,'100.00',1,0,'R');
		$pdf->Cell(25 ,6,'15100.00',1,1,'R');
	}
		

$pdf->Cell(118 ,6,'',0,0);
$pdf->Cell(25 ,6,'Subtotal',0,0);
$pdf->Cell(45 ,6,'151000.00',1,1,'R');


$pdf->Output();

?>