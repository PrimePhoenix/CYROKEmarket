<?php 
// Include database configuration file 
session_start();
require("../database/include/connection.php");
 
// If search form is submitted 
//if(isset($_POST['searchSubmit'])){ 
    /*if(!empty($_POST['location'])){ 
        $location = $_POST['location']; 
    } */
    if(!isset($_SESSION['ID']))
    {
      echo "<script>window.history.back();</script>";
    }
    if(!(isset($_GET['latitude'])&& isset($_GET['longitude']))) 
    {
      echo "<script>window.history.back();</script>";
    }

    if(!empty($_GET['latitude'])){ 
        $latitude =$_GET['latitude']; 
    } 
     
    if(!empty($_GET['longitude'])){ 
        $longitude = $_GET['longitude']; 
    } 
     
    if(!empty($_GET['distance'])){ 
        $distance_km = $_GET['distance']; 
    } 
    if(empty($_GET['distance'])){ 
        $distance_km =100; 
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYROK E-Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="../index.css">



</head>

  <body style="background:white">
   

    <!--Naviation Bar-->
    <nav class="navbar bg-danger">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="homepage.php">CYROK E-Market</a>
        </div>
        <ul class="nav navbar-nav text-danger">
          <li ><a href="../homepage.php">Home</a></li>
          <li><a href="../About.html">About CYROK E-Market</a></li>
          <li><a href="../Contact.html">Contact us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          
          <li id="selectlogin"><a href="logout.php"><span class="glyphicon glyphicon-log-out" ></span> Logout</a></li>
        </ul>

       
      </div>
    </nav>
    <!--Main container for the Page--> <div onclick="window.history.back()" class="btn btn-success">Return to previous page</div><div><h3>Stores within <?php echo $distance_km?>km of your location</h3></div><br>
    <div id="Main-container" style="max-width:90%;display:flex;flex-direction:row;flex-wrap:wrap; justify-content:center">

    <style>
  .allstores{width: 200px;
  flex-direction:column;
  background:white;
 
  justify-self;
}
  </style>



<?php
// Calculate distance and filter records by radius 
$sql_distance = $having = ''; 
if(!empty($distance_km) && !empty($latitude) && !empty($longitude)){ 
    $radius_km = $distance_km; 
  
    $sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`p`.`latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`p`.`latitude`*pi()/180)) * cos(((".$longitude."-`p`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance "; 
     
    $having = " HAVING (distance <= $radius_km) "; 
     
    $order_by = ' distance ASC '; 
}else{ 
    $order_by = ' p.id DESC '; 
} 
 $connect=OpenCon();
// Fetch places from the database 
//$sql = "SELECT p.*".$sql_distance." FROM  p $having ORDER BY $order_by"; 
?>

<?php
$sql = "SELECT p.*,(((acos(sin((".$latitude."*pi()/180)) * sin((`p`.`Lattitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`p`.`Lattitude`*pi()/180)) * cos(((".$longitude."-`p`.`Longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM coordinates p HAVING (distance <= $radius_km) ORDER BY distance ASC "; 
$query = $connect->query($sql); 

if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
       $SID= $row["StoreID"];
       $distance=round($row['distance'], 2);
$connect2=OpenCon();
       $sql2 = "SELECT Storename,Address,Parish,OpeningHours,StoreImage FROM stores where StoreID='$SID'";
       
       $result = $connect->query($sql2);
       if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
     
       echo '
       
       <div id="storecard" class="store" style="background:white" >
      <div class="storeimgdiv"><img style="max-width:150px; max-height:150px" class="card-img" src="../process/uploads/'.$row["StoreImage"].'" alt="Card image cap"/> </div><div class="card-body"><h3>'.$row["Storename"].'</h3>
      
   
       <span> <b>Located at </b><div> '.$row["Address"].', '.$row["Parish"].'</div></span>
        <span class="card-text"><b>Opening hours: </b>'.$row["OpeningHours"].'</span>
        <div><b>'.$distance.'km away</b></div>
        
        <script>
          goShopping=(id)=>{
            window.location="shopping.php?id="+id;
          }
          </script>
          <a class="btn btn-success" style ="margin-top:5px;"href="../pages/shopping.php?id='.$_SESSION['ID'].'&sname='.$row["Storename"].'&Storeid='.$SID.'">Shop here</a>
      </div>

</div>';}}}}else{
    echo "<div>Sorry.There is no registered store within ".$distance_km."km of your location</div>";
}?>

</div>
</div>

    <script src="../index.js"  media="all"></script>
    <script src="../js/app.js"></script>
  </body>
</html>
