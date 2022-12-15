<?php
   require("../database/include/connection.php");

   session_start();
   if(!isset($_SESSION['ID'])) 
{
  echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
    
   echo "<script> window.location='../pages/signin.html';</script>";
}

if($_SESSION['ID']!=$_GET["id"])
{ 

echo "<script>window.history.back();</script>";


}

$sessID=$_GET["id"];
$uname=$_SESSION['$sessID'];
$role=$_SESSION['$uname'];
 

   ?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="../style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"  media="all">
  <link rel="stylesheet" href="../bootstrapstyles.css"  media="all">
  <link rel="stylesheet" href="../index.css"  media="all">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/vue@3"></script>

   </head>


<body>
  <div class="sidebar"  >
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CYROK E-Market</span>
    </div>
      <ul class="nav-links">
        <li>
          <a <?php echo 'href="CustomerDashboard.php?id='.$sessID.'"';?> >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name active">Dashboard</span>
          </a>
        </li>
        <li>
        <a <?php echo 'href="CustomerDashboard.php?id='.$sessID.'"';?>>
            <i class='bx bx-box' ></i>
            <span class="links_name">Purchases</span>
          </a>
        </li>
        <li>
        <?php echo '<a href="../process/update_process.php?id='.$sessID.'">';?>
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Update Profile</span>
          </a>
        </li>
    
        <li>
        <?php echo '<a href="../pages/Useroperations/forgot.inc.php?id='.$sessID.'">';?>
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Reset Password</span>
          </a>
        </li>
        <li>
          <a <?php echo 'href="storehome.php?id='.$sessID.'"';?>>
            <i class='bx bx-user' ></i>
            <span class="links_name">Go shopping</span>
          </a>
        </li>
        <li class="log_out">
          <a <?php echo 'href="../process/logout.php?id='.$sessID.'"';?>>
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
       
        
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Customer Dashboard</span>
      </div>
     
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Logged in as <b><?php echo $_SESSION['$sessID'] ?></b></span>
        
      </div>
    </nav>

    

    <div class="home-content" >
        <div id="newAdmin" style="display:none;">
<h3 >New Administrator</h3>
            <div id="newAdminForm">
              <h4> User information</h4>
              <form method="post" <?php echo "action='../process/adminsignupprocess.php?id=".$sessID."'"?>>
                  <div class="inputline"><label>Firstname</label><input type="text"  class="form-control" name="fname"/></div>
                    <div class="inputline"><label>Lastname</label><input type="text"  class="form-control" name="lname"/></div>
                      <div class="inputline"><label>Username</label><input type="text"  class="form-control" name="username"/></div>
                      <div class="inputline"><label>Email</label><input type="email"  class="form-control" name="e-mail"/></div>
                        <div class="inputline"><label>Password</label><input type="password"  class="form-control" name="password"/></div>
                          <div class="inputline"><label>Re-enter Password</label><input type="password"  class="form-control" name="cpassword"/></div>
                            <div class="inputline"><button class="btn btn-danger">CANCEL</button><button class="btn btn-success">CREATE USER</button> </div>

              </form>
            </div>

	      </div>

        
     
        <div class="sales-boxes" id="adminMain" style=' display:flex; flex-direction:column;height:auto;'>
      
          
          
          <div class="recent-sales box" style="margin:auto;width:800px">
            
            <h2 style="margin-left:25%;margin-right:25%">Purchases</h2>
            <table style=" width:80%; margin:auto; height:fit-content">
              <tr><th style=" width:30%">OrderID</th><th style=" width:30%">Supermarket</td><th style=" width:30%">Date</th></tr>
              <?php 
               $connect=OpenCon();
               $uname=$_SESSION['$sessID'];
               $sql1="select customerID from customers where username='$uname'";
               $cusID="";
               if($result = mysqli_query($connect, $sql1)){
                if(mysqli_num_rows($result) > 0)
                {
                     $ID = mysqli_fetch_array($result);
                     $cusID=$ID[0];
                     
                }}
$orderID=[];
  $orderdate=[];             $sql = "SELECT OrderID,OrderDate from customerorder where customerID='$cusID'";
                     if($result = mysqli_query($connect, $sql)){
                        if ($result->num_rows > 0) {
                         /*output data of each row*/
                     while($row = $result->fetch_assoc()) {
                            array_push($orderID,$row['OrderID']);
                            array_push($orderdate,$row['OrderDate']);
                }}
                
                     }
              for ($i=0; $i < count($orderID); $i++) { 
               
             
                $sql = "SELECT Storename from storeorders where orderID='$orderID[$i]'";
                if($result = mysqli_query($connect, $sql)){
                   if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
                       
                       echo '<tr><td><a target="_blank" href="myproducts.php?id='.$orderID[$i].'">'.$orderID[$i].'</a></td><td>'.$row["Storename"].'</td><td>'.$orderdate[$i].'</td></tr>';
           }}
              } }?>
             
              
     
</table>

              <div class="sales-details" >

            
                            </div>
            </div> 
              

      
            
          
          </div>

        
  </div>
  </div>
  </section>
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../index.js"  media="all"></script>
    <script src="../js/app.js"  media="all"></script>
</body>
</html>

