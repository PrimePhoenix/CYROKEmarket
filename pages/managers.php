<?php
   require("../database/include/connection.php");

   session_start();

   if(!isset($_SESSION['ID'])) 
   {
      echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
   }
   if(!isset($_GET['id'])) 
   {
      echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
      
   }
   
   else
   
   if($_SESSION['ID']!=$_GET["id"])
   { 
   
      echo "<script>window.history.back();</script>";
   
   
   }
   

$sessID=$_GET["id"];
$uname=$_SESSION['$sessID'];
$role=$_SESSION['$uname'];


   if($role!="Admin")
   {
    echo "<script>window.location='../process/adminprompts.php?mess=unauthorized'</script>";
      
   }

/**

    /**
     * Delete a user based on a specified  id*/
    if(isset($_GET['del'])) 
    {
      delete($_GET['del'],$_GET['id']);
     
    }


   function delete($id,$sessID) {
      $connect=OpenCon();

        $sql = "DELETE FROM storemanagers
                WHERE ManagerID= $id";

        $result = $connect->query($sql);

        if ($result==true) {

            
                            $sql2 = "DELETE FROM managersinfo
                            WHERE ManagerID= $id";


                              $result2 = $connect->query($sql2);

                              if ($result2==true) {


                                echo "<script>window.location='../process/adminprompts.php?id=".$sessID."&mess=managerdeleted'</script>";
          }
        }else{
             echo "<script>window.location='../process/adminprompts.php?id=".$sessID."&mess=managererror'</script>";
          }
    }

    function getStoreName($StoreID)
    {
      $store="";

      for($Store=0;$Store<count($StoreID); $Store++)
       { $connect=OpenCon();
        $sql2 = "SELECT storename FROM stores where StoreID='$StoreID[$Store]'";
        

$result = $connect->query($sql2);

        if ($result->num_rows > 0) 
        {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $store=$store." ".$row['storename'];
                }
              
        }else {
                                    echo $connect->error;      
                    }
                
                $connect->close();
                  }
                return $store;
            }

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
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CYROK E-Market</span>
    </div>
      <ul class="nav-links">
        <li>
          <a <?php echo 'href="../pages/admin.php?id='.$sessID.'"';?> >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
        <?php echo '<a href="stores.php?id='.$sessID.'">';?>
            <i class='bx bx-box' ></i>
            <span class="links_name">Supermarkets</span>
          </a>
        </li>
        <li>
        <?php echo '<a href="managers.php?id='.$sessID.'" class="active">';?>
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Managers</span>
          </a>
        </li>
    
        <li>
        <?php echo '<a href="../pages/administrators.php?id='.$sessID.'">';?>
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Administrators</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Total Sales</span>
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
        <span class="dashboard">Store Managers</span>
      </div>
     
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Logged in as <b><?php echo $_SESSION['$sessID'] ?></b></span>
        
      </div>
    </nav>

    

    <div class="home-content" >
        <div id="newAdmin" style="display:none">
            <div>
              <h2> Managers</h2>
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

        
     
        <div class="sales-boxes" id="adminMain" style="flex-direction:column">
          <div style="display:flex; flex-direction:column; margin:auto; gap:15%;">
       
        
  </div>
        <div class="recent-sales box" style="margin:auto;width:950px">
          <div class="title">Managers</div>
          <div class="sales-details">

          
            <table id="admins" width="auto"; class="table table-striped" >
            <col style="width:10%">
	<col style="width:30%">
	<col style="width:30%">
  <col style="width:30%">
  <col style="width:20%">
            <thead> <tr> <th>ID</th><th>Name</th><th>Email</th><th>Telephone</th><th>Supermarket</th>
  </tr></thead>
  <?php 
          
          $connect=OpenCon();
          $sql = "SELECT ManagerID,Title, Firstname, Lastname ,Email, Phone FROM managersinfo";
              $result = $connect->query($sql);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      $Storename=getStoreName(getstoreID($row["ManagerID"]));
                    echo "<tr><td>".$row["ManagerID"]."</td><td width:'160px'>".$row["Title"]." ".$row["Firstname"]." ".$row["Lastname"]."</td><td>".$row["Email"]."</td><td>".$row["Phone"]."</td><td> $Storename</td><td><span> <a href=''><img src='../images/edit.png' alt='edit manager' title='Edit manager Data'
                    width='30px' height='30px;'></a></span><td><td><a href='managers.php?id=".$sessID."&del=".$row['ManagerID']."'> <img src='../images/delete.png' alt='remove manager' title='delete manager '
                    width='30px' height='30px;'></a> </td>
                    </tr>";
                  }
              } else {
                  echo "0 results";
              }
              $connect->close();

           function   getstoreID($ManagerID)
              {
                
                $stores=array();
                $connect=OpenCon();
                $sql = "SELECT StoreID FROM storemanagers where ManagerID='$ManagerID'";
                    $result = $connect->query($sql);
      
                   if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $StoreID=$row["StoreID"];

                            array_push($stores,$StoreID);
                           
              }}
            return $stores;
            }


    ?>
  </table>

            </div>
            
          </div> 
          
              <!--  <div style="display:flex;flex-direction:row; padding-top:30px; margin:auto; gap:15%; justify-content:flex-end; width:950px;">
                <div class="btn btn-success" width="fit-content" onclick="ShowNewUserForm()">
                Add a Supermarket
                </div>
                </div>-->
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

