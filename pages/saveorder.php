
<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrapstyles.css">
  <link rel="stylesheet" href="../index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body >


  <div id="cyrokdialog"></div>
<script src="../js/app.js"  media="all"></script>

<?php 
 require("../database/include/connection.php");
 require("updateorder.php");
 session_start();


 if(!isset($_SESSION['ID']))
 {
  echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
  // echo "<script>alert('You are not logged in')</script>";
   //echo "<script>window.location='signin.html'</script>";
   return;
 }

 if(!isset($_POST["id"]))
 
 {  echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
    // echo "<script>alert('You are not logged in')</script>";
   //echo "<script>window.location='signin.html'</script>";
 
 }


$orderdata=[];
$sessID="";
$storeName="";
if(isset($_POST["products"]))
 {

    $orderdata=json_decode($_POST["products"]);
    $sessID=$_POST["id"];
    $storeName=$_POST["storeName"];
    $user=$_SESSION['$sessID'];

    $oid=orderexists($storeName,$user);
    if($oid==-1)
    {
     
      //create new order 
      storeOrderDatatoDatabase($orderdata,$storeName,$user,$sessID);

    }else{
     
    
      updateOrdertable($oid,$orderdata,$sessID);
   


    }

echo "<script>window.location='../checkout.php?id=".$sessID."&SN=".$storeName."'</script>";
 }

 function storeOrderDatatoDatabase($orderdata,$storeName,$user,$sessID)
 {$connect=OpenCon();
    $currentDate= date("d/m/Y");
    $orderdate= $currentDate;

$orderID=customerOrdertable($user);
foreach ($orderdata as $key) {
        //$insert="INSERT INTO ordertable (ManagerID,StoreID)VALUES('{$ManagerID}','{$storeID}');";
      $insert="INSERT INTO `ordertable`(`OrderId`, `ProductId`, `ProductName`, `ProductDescription`, `QuantityOrdered`, `UnitPrice`, `PriceForThree`, `Total`, `Amountinstock`) 
      VALUES ('{$orderID}','{$key->id}','{$key->Name}','{$key->Description}','{$key->NoItems}','{$key->unitprice}','{$key->pricefor3}','{$key->Total}','{$key->instock}')";


 
     if($connect->query($insert)===true)
     {
      //   echo('<script>alert("Order saved to database")</script>');
         //echo '<script> window.location="../pages/storehome.php?id='.$sessID.'"</script>';
       
     }else{
         $err= "error saving information ".$connect->error;
        // echo '<script> alert("'.$err.'")</script>';
         echo $err;
       // echo '<script> window.location="../pages/stores.php?id='.$sessID.'"</script>';
       echo "<script type='text/javascript'>messageDialog('".$err."','orderdberror','../images/error.png','".$sessID."');</script>";
     }
    }
    
    storeandOrdertable($orderID,$storeName,$sessID);

     mysqli_close($connect);
    
 }

 function storeandOrdertable($orderId,$storeName,$sessID)
 {$connect=OpenCon();

  $saved=false;

      $insert="INSERT INTO `storeorders`(`OrderID`, `StoreName`) 
      VALUES ('{$orderId}','{$storeName}')";


 
     if($connect->query($insert)===true)
     {
        // echo('<script>alert("Order saved storeorder to database")</script>');
         //echo '<script> window.location="../pages/storehome.php?id='.$sessID.'"</script>';
         $saved=true;
       
     }else{
         $err= "error saving information ".$connect->error;
         //echo '<script> alert("'.$err.'")</script>';
         
        echo "<script type='text/javascript'>messageDialog('".$err."','orderdberror','../images/error.png','".$sessID."');</script>";
       
     
    }
    

     if($saved)
     {
      // echo "<script type='text/javascript'>messageDialog('Your order has been saved','orderdberror','../images/SUCCESS.png','".$sessID."');</script>";
       // echo '<script> window.location="../pages/storehome.php?id='.$sessID.'"</script>';
      } else{
      $err= "error saving information ".$connect->error;
         
       
         echo "<script type='text/javascript'>messageDialog('".$err."','orderdberror','../images/error.png','".$sessID."');</script>";
     }
     
    mysqli_close($connect);
 }
 
 function getOrderId($date)
 {
  $OrderID="";
  $connect=OpenCon();

  $sql="SELECT OrderID from customerorder where OrderDate='$date'";
  if($result = mysqli_query($connect, $sql)){
      if(mysqli_num_rows($result) > 0)
      {
           $OID = mysqli_fetch_array($result);

           $OrderID=$OID[0];
     }
     

 }return $OrderID;
}
 function customerOrdertable($user)
 {$connect=OpenCon();

$cusID="";
$currentDate= date("d/m/Y");
       $orderdate= $currentDate;
    $sql="SELECT CustomerID from customers where UserName='$user'";
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0)
        {
             $CusID = mysqli_fetch_array($result);

             $cusID=$CusID[0];
       }
       
   
      $insert="INSERT INTO `customerorder`( `customerID`, `isCashout`,`OrderDate`) 
      VALUES ('{$cusID}','0','{$orderdate}')";


 
     if($connect->query($insert)===true)
     {
       
         
       
     }
    
     mysqli_close($connect);

   
 }
 return getOrderId($orderdate);
 }

 ?>


</body>
</html>