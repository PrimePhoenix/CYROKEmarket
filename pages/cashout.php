
<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrapstyles.css">
  <link rel="stylesheet" href="../index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body >


  <div id="cyrokdialog"><div>
<script src="../js/app.js"  media="all"></script>
<?php 
 require("../database/include/connection.php");
 session_start();

 if(!isset($_SESSION['ID']))
 {
  echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
  // echo "<script>alert('You are not logged in')</script>";
   //echo "<script>window.location='signin.html'</script>";
   return;
 }

 if(!isset($_GET["id"]))
 
 {  echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
    // echo "<script>alert('You are not logged in')</script>";
   //echo "<script>window.location='signin.html'</script>";
 
 }


$sessID="";
$storeName="";


if(isset($_GET["SN"]))
 {

   
    $sessID=$_GET["id"];
    $storeName=$_GET["SN"];
  

 
 }
 if(!isset($_SESSION['deliverylocation']))
{
    echo "<script> window.location='storehome.php?id=".$sessID."'</script>";
}
 //search storeorder for orderids
$allIDsforstore=[];
$allIDsforstore=getOrderIds($storeName);


function getOrderIds($storeName)
{
 $OrderID=[];
 $connect=OpenCon();

 $sql="SELECT OrderID from storeorders where StoreName='$storeName'";
 if($result = mysqli_query($connect, $sql)){
     if(mysqli_num_rows($result) > 0)
     {
         while($OID = mysqli_fetch_array($result))
{
    array_push($OrderID,$OID[0]);
}
          
    }
    

}return $OrderID;
}

 //earch customerorder for id where id =OrderID
 //if that order is not cashed out, return that orderID
$orderID=getOrderIdfromCustomerOrder($allIDsforstore);

setdelivery($orderID,$sessID);
setPayment($orderID,$sessID);
updatecustomerOrdertable($orderID);
//echo "<script>window.open('invoice.php?SN=".$storeName."&OID=".$orderID."')</script>";
echo "<script> window.location='storehome.php?id=".$sessID."'</script>";
function getOrderIdfromCustomerOrder($allIDsforstore)
{
    $OrderID='';
    $connect=OpenCon();
    for ($i=0; $i < count($allIDsforstore); $i++) { 
    
        



    $sql="SELECT OrderID from customerorder where isCashout='0' and OrderID='$allIDsforstore[$i]'";
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0)
        {
            $OID = mysqli_fetch_array($result);

            $OrderID=$OID[0];
    }

    }
        

    }return $OrderID;
}

 //Search order table for that order which ha that ID



//search storeorder for store id where that order ID exist storeID=
 
function setPayment($orderID,$sessID){
 
    $paymentmethod="Credit Card";
        if(isset($_SESSION['paymethod']))
        {   
            $paymentmethod=$_SESSION['paymethod'];
            unset($_SESSION['paymethod']);
    
        }
        $connect=OpenCon();
            //$insert="INSERT INTO ordertable (ManagerID,StoreID)VALUES('{$ManagerID}','{$storeID}');";
            $insert="INSERT INTO `payment`(`OrderId`,`PaymentMethod`) 
            VALUES ('{$orderID}','{$paymentmethod}')";
        
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
        mysqli_close($connect);
}

 function setdelivery($orderID,$sessID){
 
                $address="";
                $deliverydate="";
                $deliverytime="";
                if(isset($_SESSION['storedelivery']))
                {
                    if($_SESSION['storedelivery']==true)
                    {
                        $address="Pickup at Store";
                        unset($_SESSION['storedelivery']);
                    }else
                    {
                        $address=$_SESSION['deliverylocation'];
                        unset($_SESSION['deliverylocation']);
                    }

                }

                if(isset($_SESSION['pickuptime']))
                {
                    $deliverytime=$_SESSION['pickuptime'];
                    unset($_SESSION['pickuptime']);
                }

                if(isset($_SESSION['pickupdate']))
                {
                $deliverydate=$_SESSION['pickupdate'];
                unset($_SESSION['pickupdate']);
                }
                $connect=OpenCon();
                    //$insert="INSERT INTO ordertable (ManagerID,StoreID)VALUES('{$ManagerID}','{$storeID}');";
                    $insert="INSERT INTO `delivery`(`OrderId`,`DeliveryAddress`,`DeliveryTime`,`DeliveryDate`) 
                    VALUES ('{$orderID}','{$address}','{$deliverytime}','{$deliverydate}')";
                
                
                
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
                    mysqli_close($connect);
     }

 

 function updatecustomerOrdertable($orderID)
    {
        $connect=OpenCon();

    
        $UPDATE="UPDATE `customerorder` SET `isCashout`='1' WHERE OrderID='$orderID'";
        
    
        if($connect->query($UPDATE)===true)
        {
        
            
        
        }
        
        mysqli_close($connect);

   
 }


 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>