<?php

require("database/include/search.php");
session_start();
$data=searchStores("shopper");
$state="loggedOut";
$usertype="test";
if(isset($_SESSION['ID']))
    {
      $id=$_SESSION['ID'];
    $state="loggedIn";

$usertype=$_SESSION['$uname'];

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYROK E-Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="index.css">



</head>

  <body>
   

    <!--Naviation Bar-->
    <nav class="navbar bg-danger" style='margin-left:15px;margin-right:15px;'>
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="homepage.php">CYROK E-Market</a>
        </div>
        <ul class="nav navbar-nav text-danger">
          <li ><a href="homepage.php">Home</a></li>
          <li><a href="About.html">About CYROK E-Market</a></li>
          <li><a href="Contact.html">Contact us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" id="sessionControl">
          <?php
            if($state=="loggedIn")
            {
              if($usertype=="Customer")
              {
                ?>
                 <li><a <?php echo 'href="pages/storehome.php?id='.$id.'"'?>><span style='margin-right="10%'>Continue Shopping</span></a></li>
                 <li id="selectlogin"><?php echo"<a href='process/logout.php?id=".$id."'>";?></span> Logout</a></li>
                 
                <?php
              
              }else  if($usertype=="Admin")
              {
                ?>
                <li><a <?php echo 'href="pages/admin.php?id='.$id.'"'?>><span style='margin-right="10%'>Return to Admin</span></a></li>
                <li id="selectlogin"><?php echo"<a href='process/logout.php?id=".$id."'>";?></span> Logout</a></li>
               <?php 
              }
            }else{
            ?>
          <li><a href="pages/Signupform.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li id="selectlogin"><a href="pages/signin.html"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
        </ul>
<?php
}?>
       
      </div>
    </nav>
    <!--Main container for the Page-->
    <div id="Main-container">


      <!--Search BAR-->
              <form action="process/search.php" method="post">
              <div class="sbar"  >
                
                <input class="col-md-8" type="search" style="height:45px; max-width: 500px; border-radius: 8px;" placeholder="Find a store..." id="searchbox"/>
                <button class="btn btn-success"> SEARCH</button>
            <ul>
              <?php foreach ($data as $store ) {
                # code...

              ?>
              <li><?php echo $store?></li>
              <?php }?>
<ul>
              </div>  
            </form>
            <?php
            if($state=="loggedIn")
            {
              if($usertype=="Customer")
              {
            ?>
            <button class="btn btn-success"  style="height:40px; border:1px solid black;margin-top:25.25%;margin-left:42%" onclick=<?php echo 'window.location="pages/storehome.php?id='.$id.'"'?>>CONTINUE SHOPPING</button>
            <?php
            }
            
                }
                else{
            ?>
            <button class="btn btn-success"  style="height:40px; border:1px solid black;margin-top:25.25%;margin-left:42%" onclick="window.location='pages/Signupform.php'">SIGN UP AND START SHOPPING !</button>
<?php
}
?>

           
    <!--modal for signup-->
          <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              Modal body..
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>

       
      
   
    </div>
  


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Google Maps JavaScript library -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=Your_API_Key"></script>
   

    <script src="index.js"></script>
  
  </body>
</html>