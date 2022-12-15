
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

  <link rel="stylesheet" href="../index.css"  media="all">

 

   </head>


<body>
 

 <script src="../js/app.js"  media="all"></script>

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

        $sql = "DELETE FROM administrators
                WHERE userID= $id";

        $result = $connect->query($sql);

          if ($result) {

            echo "<script>window.location='../process/adminprompts.php?mess=admindeleted'</script>";
            
           // echo "<script> window.location='administrators.php?id=".$sessID."';</script>";
          }else{
            echo "<script>window.location='../process/adminprompts.php?mess=adminerror'</script>";
          }
    }

 

   ?>





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
        <?php echo '<a href="../pages/managers.php?id='.$sessID.'">';?>
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Managers</span>
          </a>
        </li>
    
        <li>
        <?php echo '<a href="../pages/administrators.php?id='.$sessID.'" class="active">';?>
           <!-- <i class='bx bx-book-alt' ></i>-->
            <i class="bi bi-people-fill"></i>
            
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
        <span class="dashboard">Administrators</span>
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
                  <div class="inputline"><label>Firstname</label><input type="text"  class="form-control" name="fname" required/></div>
                    <div class="inputline"><label>Lastname</label><input type="text"  class="form-control" name="lname" required/></div>
                      <div class="inputline"><label>Username</label><input type="text"  class="form-control" name="username" required/></div>
                      <div class="inputline"><label>Email</label><input type="email"  class="form-control" name="e-mail"/ required></div>
                        <div class="inputline"><label>Password</label><input type="password"  class="form-control" name="password" required/></div>
                          <div class="inputline"><label>Re-enter Password</label><input type="password"  class="form-control" required name="cpassword"/></div>
                            <div class="inputline"><button class="btn btn-danger">CANCEL</button><button name='newadmin' class="btn btn-success">CREATE USER</button> </div>

              </form>
            </div>

	      </div>

        
     
        <div class="sales-boxes" id="adminMain" style=' display:flex; flex-direction:column;height:fit-content;'>
      
          
          
          <div class="recent-sales box" style="margin:auto;width:800px">
            
             <div style="display:flex; flex-direction:row; gap:10px;" >
                    <div class="title">Admin Users</div>
                    <div onclick="ShowNewUserForm()"><img src="../images/newUser.png" alt="newUser" title=" Create New Administrator"
                    width="45px" height="40px;"></div>
             </div>
            

              <div class="sales-details"  >

            
                  <table id="admins" width="auto"; class="table table-striped" >
                      <col style="width:10%">
                      <col style="width:35%">
                      <col style="width:20%">
                      <col style="width:35%">
                                <thead> <tr> <th>UserID</th><th>Name</th><th>Username</th><th>Email</th><th></th>
                      </tr></thead>
  



                        <?php 
                                
                                $connect=OpenCon();
                                $sql = "SELECT userID, FirstName, LastName ,Email, UserName FROM administrators";
                                    $result = $connect->query($sql);
                                    
                                                                 

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                        $delete="<a href='administrators.php?id=".$sessID."&del=".$row['userID']."' > <img src='../images/delete.png' alt='remove user' title='delete user '
                                    width='30px' height='30px;'></a> </td>
                                    </tr>";

                                          if($_SESSION['$sessID']==$row['UserName'])

                                          {
                                            $delete="</td>
                                            </tr>";
                                          }
                                          echo "<div ><tr><td>".$row["userID"]."</td><td width:'160px'>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["UserName"]."</td><td>".$row["Email"]."</td> <td><span> <a href=''><img src='../images/edit.png' alt='edit user info icon' title='Edit User info'
                                          width='30px' height='30px;'></a></span><td><td>".$delete."";
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

