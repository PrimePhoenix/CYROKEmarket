

<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrapstyles.css">
  <link rel="stylesheet" href="../index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body >


  <div id="cyrokdialog"></div>
<script src="../js/app.js"  media="all"></script>
<?php
session_start();

/*if(!isset($_GET['id']))
{
 
      echo"<script>window.location='../homepage.php'</script>";
} 
else*/
if(!isset($_SESSION['ID'])) 
       {
             
             echo "<script type='text/javascript'>messageDialog('Session Problem ','sessionerror','../images/Error.png',null);</script>";

       }else{

 $_SESSION['ID']=$_GET['id'];
$sessID=$_SESSION['ID'];
 

unset($_SESSION["ID"]);
unset($_SESSION["uname"]);
unset($_SESSION["role"]);
session_destroy();
   
//session_destroy();
echo "<script type='text/javascript'>messageDialog('Logged out successfully','loggedout','../images/SUCCESS.png',null);</script>";

    }
ini_set('error_reporting', 0);
ini_set('display_errors', 0);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>