
<?php session_start();
  require("../database/include/connection.php");

  if(!isset($_SESSION['ID']))
{

  echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
  //echo "<script>alert('You are not logged in')</script>";
  //echo "<script>window.location='signin.html'</script>";
  //return;
}
if(isset($_GET['id']))
{
  if($_SESSION['ID']!=$_GET["id"])
{ 

  echo "<script>window.history.back();</script>";


}
  $sessID=$_GET["id"];
$_SESSION['user']=$_SESSION['$sessID'];

}
else 
{  
  echo "<script>window.history.back();</script>";
  // echo "<script>alert('You are not logged in')</script>";
 // echo "<script>window.location='signin.html'</script>";

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYROK E-Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"  media="all">
  <link rel="stylesheet" href="../bootstrapstyles.css"  media="all">
  <link rel="stylesheet" href="../index.css"  media="all">

  

</head>

  <body  class="storespage">
    
  <nav class="navbar bg-danger" style="border-radius: 0%;">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../homepage.php">CYROK E-Market</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="../homepage.php">Home</a></li>
            <li><a href="../About.html">About CYROK E-Market</a></li>
            <li><?php echo '<a href="CustomerDashboard.php?id='.$sessID.'">';?>Manage My Account</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="pages/Signupform.php"></a></li>

            <li  id="selectlogin"> <?php echo"<a href='../process/logout.php?id=".$sessID."'>";?><span class="glyphicon glyphicon-log-out"> </span> Log out</a></li>
          </ul>
  
         
        </div>
      </nav>
      <div class="container-fluid" ><h3 style="margin-left:100px"><?php echo " Hello, ". $_SESSION["user"];?></h3></div>




      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Google Maps JavaScript library -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBQNFFQh6AnxH1GIaUSOEkvGe_kn46Mxhc"></script>

<script>
    
function getLocation() {
  if (navigator.geolocation) {
 
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {

 
  var distance=document.getElementById("dis").value;
 window.location="../process/findnearbystore.php?longitude="+position.coords.longitude+"&&latitude="+position.coords.latitude+"&&distance="+distance;
  
}
</script>

<form method="post" action="">
<div class="sbar">
  <input  class="col-md-8" type="search" style="height:45px; max-width: 500px; border-radius: 8px; name="location" id="location" value='' placeholder="Find a store...">
  
 <input type="submit" name="searchSubmit" value="SEARCH" class="btn btn-success"/>
  <select style="max-width:150px" class="form-control" name="distance_km" id="dis" onchange="getLocation()" >
        <option value="">Distance</option>
        <option value="5">+5 KM</option>
        <option value="10" >+10 KM</option>
        <option value="15" >+15 KM</option>
        <option value="20" >+20 KM</option>
    </select>
 
</div>
</form>

<style>
  .allstores{width: 200px;
  flex-direction:column;
 
  justify-self;

}

#storecard{

  width:280px;
  max-height:420px;
}
  </style>

<div id="storepage" class="store-content">
 
<!--<div id="storecard" class="store" style="width:80vw"-->

    
       <?php
       $connect=OpenCon();
       $sql2 = "SELECT StoreID,Storename,Address,Parish,OpeningHours,StoreImage FROM stores";
       
       $result = $connect->query($sql2);
       if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
     
       echo '
       <div id="storecard" class="store">
      <div class="storeimgdiv" ><img style="max-width:150px; max-height:150px border:2px solid black;" class="card-img" src="../process/uploads/'.$row["StoreImage"].'" alt="Card image cap"/></div> <div class="card-body"><h3>'.$row["Storename"].'</h3>
      
   
       <span> <b>Located at </b><div> '.$row["Address"].', '.$row["Parish"].'</div></span>
        <span class="card-text"><b>Opening hours: </b>'.$row["OpeningHours"].'</span>
        
        <script>
          goShopping=(id)=>{
            window.location="shopping.php?id="+id;
          }
          </script>
        <a class="btn btn-success" style ="margin-top:5px;"href="shopping.php?id='.$sessID.'&sname='.$row["Storename"].'&Storeid='.$row['StoreID'].'">Shop here</a>
      </div>

</div>';}}
?>
</div>

</div>

    <script src="../index.js"  media="all"></script>
    <script src="../js/app.js"></script>
  </body>
</html>