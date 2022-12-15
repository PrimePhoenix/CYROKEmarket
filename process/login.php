
<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrapstyles.css">
  <link rel="stylesheet" href="../index.css">

<body >


  <div id="cyrokdialog"></div>
<script src="../js/app.js"  media="all"></script>
    <?php

require("../database/include/connection.php");

if(!(isset($_POST['username'])&&(isset($_POST['password']))))
{
    echo "<script>window.history.back();</script>";
}
$connect=OpenCon();
session_start();
$sessID=session_id();
$uname=$_POST['username'];
$pass=$_POST['password'];
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
$role=$_POST["role"];
$myID="";


$sql= "SELECT Password from customers where Username='$uname'";
if($_POST["role"]=="Admin")
{
    $sql= "SELECT Password from administrators where Username='$uname'";
}

if($result = mysqli_query($connect, $sql)){
    if(mysqli_num_rows($result) > 0)
    {
         $pw = mysqli_fetch_array($result);
         $pass_hash=$pw[0];

        if (password_verify($pass, $pass_hash)) {
           
           
            $_SESSION['ID']=$sessID;
            $_SESSION['$sessID']=$uname;
            $_SESSION['$uname']=$role;
           

            echo "<script type='text/javascript'>messageDialog('Welcome ". $_SESSION['$sessID']."','". $_SESSION['$uname']."','../images/SUCCESS.png','".$sessID."');</script>";
          //  if($_SESSION['$uname']=="Admin")
  /* {
      // echo "<script> window.location='../pages/admin.php?id=".$sessID."';</script>";
   }
   else
   {
    //echo "<script> window.location='../pages/storehome.php?id=".$sessID."';</script>";
   }
    */
        }
        else {

            echo "<script type='text/javascript'>messageDialog('Password or username is incorrect','wrongsignin','../images/error.png',null);</script>";
            
        }

   
}else{
    echo "<script type='text/javascript'>messageDialog('Password or username is incorrect','wrongsignin','../images/error.png',null);</script>";


}}
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
$connect->close();



?>

</body>
</html>