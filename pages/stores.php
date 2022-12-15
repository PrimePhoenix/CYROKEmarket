
   
   <?php
   require("../database/include/connection.php");



   session_start();
   if(!isset($_SESSION['ID'])) 
{
  //echo "<script>alert('You must be logged in as an administrator to access this page   111')</script>";

  echo "<script>window.location='../process/adminprompts.php?mess=unauthorized'</script>";
  //echo "<script type='text/javascript'>messageDialog('You must be logged in as an administrator to access this page','unauthorized','../images/error.png','');</script>";
  // echo "<script> window.location='../pages/signin.html';</script>";
}
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
     // echo "<script>window.location='../pages/signin.html'</script>";
   }

/**

    /**
     * Delete a store based on a specified  id*/
    if(isset($_GET['del'])) 
    {
      delete($_GET['del'],$_GET['id']);
     
    }

   function delete($id,$sessID) {
      $connect=OpenCon();

        $sql = "DELETE FROM stores
                WHERE StoreID= $id";



        $result = $connect->query($sql);

        if ($result) {

          //unlink the manager
          $sql2 = "DELETE FROM storemanagers
          WHERE StoreID= $id";



  $result2 = $connect->query($sql2);

  if ($result2) 
          //delete the coordinates
       {   $sql3 = "DELETE FROM coordinates
          WHERE StoreID= $id";



  $result3 = $connect->query($sql3);

  if ($result3) 
         { 
          echo "<script>window.location='../process/adminprompts.php?mess=deletestoresuccess&id=".$sessID."'</script>";
            
            //echo "<script> window.location='stores.php?id=".$sessID."';</script>";
          }}}else{
            $err= "error deleting entry ".$connect->error;
            //echo '<script>alert("There was an error processing your request");</script>';
          //  echo '<script> alert("'.$err.'")</script>';
            echo "<script>window.location='../process/adminprompts.php?mess=sdberror&id=".$sessID."'</script>";
          }
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
  <script src="../js/app.js"  media="all"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> 



<body >

  <div class="sidebar" class="navbar bg-danger">>
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
        <?php echo '<a href="../pages/stores.php?id='.$sessID.'" class="active">';?>
            <i class='bx bx-box' ></i>
            <span class="links_name">Supermarkets</span>
          </a>
        </li>
        <li>
        <?php echo '<a href="../pages/managers.php?id='.$sessID.'">';?>
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
        <span class="dashboard">Supermarkets</span>
      </div>
     
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Logged in as <b><?php echo $_SESSION['$sessID'] ?></b></span>
        
      </div>
    </nav>

    

    <div class="home-content" >
        <div id="newStore" style="display:none">
            <div style="display:flex;flex-direction:column; width:800px; margin:auto ">
            <h3 >New Store</h3>
                <form class="sform" id="addstore" method="post" <?php echo 'action="../process/addstore.php?id='.$sessID.'" '?>style="margin:auto; width:600px" enctype="multipart/form-data">
                        <h4>Supermarket Information</h4>
                
                <div class="inputline">  <label>StoreName</label><input type="text" class="form-control" name="Sname"></div>

                            <div class="inputline"><label class="input labels" >Parish</label>
							<select class="form-control" id="parish" name="Sparish">
								<option value="Select a Parish">Select a Parish</option>
								<option value="Manchester">Manchester</opton>
								<option value="St. Elizabeth">St. Elizabeth</option>
								<option value="Westmoreland">Westmoreland</option>
								<option value="Hanover">Hanover</option>
								<option value="St. James">St. James</option>
								<option value="Trelawny">Trelawny</option>
								<option value="St. Ann">St. Ann</option>
								<option value="St. Mary">St. Mary</option>
								<option value="Portland">Portland</option>
								<option value="St. Thomas">St. Thomas</option>
								<option value="St. Andrew">St. Andrew</option>
								<option value="Kingston">Kingston</option>
								<option value="St. Catherine">St. Catherine</option>
								<option value="Clarendon">Clarendon</option>

							</select></div>

                            <div class="inputline">  <label>Address</label><input type="text" class="form-control" name="Saddress"/></diV>
                            <div class="inputline">   <label>Telephone</label><input type="tel" class="form-control" name="Sphone"/></div>
                            <div class="inputline">   <label>email</label><input type="email" class="form-control" name="Semail"/></div>
                            <div class="inputline">   <label>Opening Hours</label><input type="text" class="form-control" name="OpeningHours"/></div>
                            <div class="inputline">   <label>photo</label><input type="file" name="upload" class="form-control" required/></div>
                            <div class="inputline">   <label>latitude</label><input type="number" name="latitude" class="form-control" min="-90" max="90" step="0.00000001" required/></div>
                            <div class="inputline">   <label>longitude</label><input type="number" name="longitude" class="form-control" min="-180" max="180" step="0.00000001" required/></div>
                                <h4>Manager Information</h4>
                                <div class="inputline">     <label>ManagerId</label><input type="number" class="form-control" name="SManagerID"/></div>
                                <div class="inputline">    <label>Title</label><input type="text" class="form-control" name="SManagertitle"/></div>
                                <div class="inputline">    <label>FirstName</label><input type="text" class="form-control" name="SManagerfn"/></div>
                                <div class="inputline">     <label>LastName</label><input type="text" class="form-control" name="SManagerln"/></div>
                                <div class="inputline">    <label>Telephone</label><input type="tel" class="form-control" name="SManagertel"/></div>
                                <div class="inputline">    <label>Email</label><input type="email" class="form-control" name="SManageremail"/></div>
                                <div class="inputline"> <div style="display:flex; justify-content:space-between;margin-top:20px; margin-bottom:20px; padding-left:70px;padding-right:70px;"></div>
                                <button name="newstore" class="btn btn-success">submit</button> <button  class="btn btn-danger" id="cancelUpdate">Cancel</button></div>
                </form>
        </div>
	      
     </div>

        
     
        <div class="sales-boxes" id="adminMain" style="flex-direction:column">
   
        <div class="recent-sales box" style="margin:20px;width:auto">
        <div style="display:flex; flex-direction:row; gap:10px;" >
                    <div class="title">Supermarkets</div>
                    <div onclick="ShowNewstoreForm()"><img src="../images/newstore.png" alt="newstore" title=" Add a New Store"
                    width="45px" height="40px;"></div>
             </div>
            
          <div class="sales-details" >

          
            <table id="admins" width="auto"; class="table table-striped" >
                             <col style="width:10%"/>
                            <col style="width:20%"/>
                            <col style="width:20%"/>
                            <col style="width:20%"/>
                            <col style="width:35%"/>
            <thead> 
                <tr> 
                    <th>StoreID</th><th>Store Name</th><th>Store Manager</th><th>Store Email</th><th>Store Address</th>
                 </tr>
            </thead>
  <?php 
          
          function   getManagerID($StoreID)
          {
            
            $ManagerID="";
            $connect=OpenCon();
            $sql = "SELECT ManagerID FROM storemanagers where StoreID='$StoreID'";
                $result = $connect->query($sql);
  
               if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $ManagerID=$row["ManagerID"];

                      
                       
          }}
        return   $ManagerID;
        }

        function getStoreOwner($ManagerID)
        {
            $connect=OpenCon();
            $sql2 = "SELECT Firstname,Lastname FROM managersinfo where ManagerId=$ManagerID";
            
            $manager="";
            
            if($result2 = mysqli_query($connect, $sql2)){
                if(mysqli_num_rows($result2) > 0)
                {
                    $SM = mysqli_fetch_array($result2);
                    $manager=$SM["Firstname"]." ".$SM["Lastname"];
                    
                }else {
                            echo $connect->error;
                            
                        
                        }
                    }else
                    {
                        echo $connect->error;
                    }
                    $connect->close();
                    return $manager;
        }
                            
          $connect=OpenCon();
          $sql = "SELECT storeId, storename,Email, Address,Parish FROM stores";
              $result = $connect->query($sql);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $man=getStoreOwner(getManagerID($row["storeId"]));
                    echo "<tr><td>".$row["storeId"]."</td><td width:'160px'>".$row["storename"]."</td><td> ".$man."</td><td>".$row["Email"]."</td><td>".$row["Address"].",".$row["Parish"]."</td> <td><span> <a href=''><img src='../images/edit.png' alt='edit store' title='Edit store Data'
                    width='30px' height='30px;'></a></span><td><td><a href='stores.php?id=".$sessID."&del=".$row['storeId']."'> <img src='../images/delete.png' alt='remove store' title='delete store '
                    width='30px' height='30px;'></a> </td>
                    </tr>";
                  }
              } else {
                  echo "0 results";
              }
              $connect->close();
        


    ?>
  </table>

            </div>
          </div>
   
          </div> 
          
         
       
        
  </div>
  </div>
  </section>
  <script>
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function() 
            {

                sidebar.classList.toggle("active");
                if(sidebar.classList.contains("active"))
                {
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

