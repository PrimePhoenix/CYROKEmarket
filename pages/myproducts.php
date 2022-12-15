
<?php
$products=[];
if(isset($_GET['id']))
{
    
    require("../database/include/connection.php");
$_SESSION['total']='';
    function getproducts($OrderID)
    {
        $total=0.00;
         $prod=array();
          $connect=OpenCon();
          $sql = "SELECT ProductName,QuantityOrdered,Total FROM ordertable where OrderID='$OrderID'";
              $result = $connect->query($sql);
    
             if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      $data=$row['QuantityOrdered']." ".$row['ProductName']." for $".$row['Total'];
                      $total+=$row['Total'];
                  array_push($prod,$data);
        }}
        $_SESSION['total']=$total;
    return $prod;
      }

$products=getproducts($_GET['id']);
$Total=0.00;
      
}
?>
<div style="width:700px;margin:auto;">
<div style="width:100%;"><h3 style="margin-left:20%; margin-right:25%;" >Order No <?php echo $_GET['id'] ?></h3></div>
    <?php for ($i=0; $i < count($products); $i++) { 
      echo " <div style='width:80%; margin-left:20%;'>".$products[$i]."</div> <br>";
      
    }?>
    <div style="border-top:1px solid black;margin-left:20%; width:50%"><?php echo '<b>Total:</b>$'.$_SESSION['total'].''?></div>
</div>