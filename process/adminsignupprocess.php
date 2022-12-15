

<?php
   require("../database/include/connection.php");

   session_start();

   if(!isset($_POST["newadmin"]))
   {
      
      echo "<script>window.history.back();</script>";
   }

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
   ?>

<?php



$password=$_POST['password'];
$password2=$_POST['cpassword'];
$Username=$_POST['username'];
$firstName=$_POST['fname'];
$lastName=$_POST['lname'];
$email=$_POST['e-mail'];


if($password!=$password2)
{
   // echo'<script>alert("Passwords mismatch")</script>';
  

    echo "<script>window.location='../process/adminprompts.php?mess=confirmpassworderror'</script>";
    
}
 else{
       $connect=OpenCon();
    $Password=password_hash($password,PASSWORD_BCRYPT);
 
$insert="INSERT INTO administrators (FirstName,LastName,username,Email,Role,Password)VALUES('{$firstName}','{$lastName}','{$Username}','{$email}','ADMIN','{$Password}');";
 

if($connect->query($insert)===true)
{
   echo "<script>window.location='../process/adminprompts.php?mess=admincreated'</script>";
}else{
    $err= "error saving information ".$connect->error;
   // echo '<script> alert("'.$err.'")</script>';
   echo "<script>window.location='../process/adminprompts.php?mess=adminerror'</script>";

   // echo '<script> window.location="../pages/administrators.php?id='.$sessID.'";</script>';
    //echo '<script> window.history.back()</script>';
}


mysqli_close($connect);
 }
        
?>
