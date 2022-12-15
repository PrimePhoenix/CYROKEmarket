<?php

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

 

//setdelivery($orderID,$sessID);
//setPayment($orderID,$sessID);
//updatecustomerOrdertable($orderID);
function getOrderIdfromCustomerOrder($allIDsforstore,$user)
{ $connect=OpenCon();
    $cusID="";

    $sql="SELECT CustomerID from customers where UserName='$user'";
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0)
        {
             $CusID = mysqli_fetch_array($result);

             $cusID=$CusID[0];
       }
       mysqli_close($connect);
    }
        $OrderID='';
        $connect=OpenCon();
            for ($i=0; $i < count($allIDsforstore); $i++) { 
        
        $sql="SELECT OrderID from customerorder where isCashout='0' and OrderID='$allIDsforstore[$i]' and customerID='$cusID'";
        if($result = mysqli_query($connect, $sql)){
            if(mysqli_num_rows($result) > 0)
            {
                $OID = mysqli_fetch_array($result);

                $OrderID=$OID[0];
        }

        }
            echo $cusID;

        }return $OrderID;
        mysqli_close($connect);
}

 //Search order table for that order which ha that ID



 //UPDATE CUTOMER ORDER TO CHANGE THE DATE


 //DROP RECORDS IN ORDERTABLE WHERE ID I ORDERID
function deletepreviousorderrecord($orderID)
{$connect=OpenCon();
    $del="DELETE FROM `ordertable` WHERE `ordertable`.`OrderId` = '$orderID'";
  //  $result = $connect->query($del);
$isdeleted=-1;

if($result = mysqli_query($connect, $del)){
   if (mysqli_affected_rows($connect) > 0)
    {



   // if ($result) {
        $isdeleted= $orderID;
       
    }}
    mysqli_close($connect);
return $isdeleted;
}

 //CREATE NEW RECRD


 function updateOrdertable($orderID,$orderdata,$sessID)
 {
    $connect=OpenCon();
    $currentDate= date("d/m/Y");
    $orderdate= $currentDate;


        foreach ($orderdata as $key) {
    
            $insert="INSERT INTO `ordertable`(`OrderId`, `ProductId`, `ProductName`, `ProductDescription`, `QuantityOrdered`, `UnitPrice`, `PriceForThree`, `Total`, `Amountinstock`) 
            VALUES ('{$orderID}','{$key->id}','{$key->Name}','{$key->Description}','{$key->NoItems}','{$key->unitprice}','{$key->pricefor3}','{$key->Total}','{$key->instock}')";


        
            if($connect->query($insert)===true)
            {
            //   echo('<script>alert("Order saved to database")</script>');
                //echo '<script> window.location="../pages/storehome.php?id='.$sessID.'"</script>';
            
            }else{
                $err= "error saving information ".$connect->error;
                // echo '<script> alert("'.$err.'")</script>';
                
            // echo '<script> window.location="../pages/stores.php?id='.$sessID.'"</script>';
            echo "<script type='text/javascript'>messageDialog('".$err."','orderdberror','../images/error.png','".$sessID."');</script>";
            }
            }
            

     mysqli_close($connect);
   
 }

function orderexists($storeName,$user)
{     $exists=-1;
    
    //search storeorder for orderids
    $allIDsforstore=[];

 
    $allIDsforstore=getOrderIds($storeName);
   //earch customerorder for id where id =OrderID
 //if that order is not cashed out, return that orderID
    $orderID=getOrderIdfromCustomerOrder($allIDsforstore,$user);
   $exists= deletepreviousorderrecord($orderID);
   return $exists;
}


 ?>
