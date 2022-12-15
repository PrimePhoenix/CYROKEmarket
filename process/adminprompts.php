<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrapstyles.css">
  <link rel="stylesheet" href="../index.css">

<div id="cyrokdialog"></div>
<script src="../js/app.js"  media="all"></script>
<?php
  session_start();
  $sessID="";
if(isset ($_SESSION['ID']))
{
  $_GET['id']=$_SESSION['ID'];

  $sessID=$_GET['id'];
}


if(!isset($_GET['mess']))
{
    echo "<script type='text/javascript'>messageDialog('Invalid request','wrongsignin','../images/error.png',null);</script>";
}
if(isset($_GET['mess']))
{
    //unathorized
    switch($_GET['mess'])
    {

  case "sdberror":
  //db error cases return to the page before the prompt was triggered 
    echo "<script type='text/javascript'>messageDialog('There was an error while processsing ','sdberror','../images/error.png','".$_GET['id']."');</script>";
   break;
   case "unauthorized":
    ////alo return to the page before the prompt
    echo "<script type='text/javascript'>messageDialog('You are not logged in as an Administrator ','unauthorizedadmin','../images/error.png',null);</script>";
break;

  case "deletestoresuccess":
    echo "<script type='text/javascript'>messageDialog('Store successfully deleted ','storecreated','../images/SUCCESS.png','".$_GET['id']."');</script>";
   break;
case "gotosignin":
         echo "<script type='text/javascript'>messageDialog('You are not logged in ','gotosignin','../images/error.png','null');</script>";
break;
         case "successupdate":
          echo "<script type='text/javascript'>messageDialog('You successfully updated your account ','successupdate','../images/SUCCESS.png','".$_GET['id']."');</script>";
break;
case "successupdateerror":
  echo "<script type='text/javascript'>messageDialog('There was an error procesing you request ','successupdate','../images/error.png','".$_GET['id']."');</script>";

  break;
  case "adminerror":
    "<script type='text/javascript'>messageDialog('There was an error procesing you request ','adminactioned','../images/error.png','".$_GET['id']."');</script>";

    case "admindeleted":
      echo "<script type='text/javascript'>messageDialog('Record removed succesfully','adminactioned','../images/SUCCESS.png','".$sessID."');</script>";
      break;
      case "admincreated":
        echo "<script type='text/javascript'>messageDialog('Record created succesfully','adminactioned','../images/SUCCESS.png','".$sessID."');</script>";
        break;
        case "managererror":
          "<script type='text/javascript'>messageDialog('There was an error procesing you request ','manageractioned','../images/error.png','".$_GET['id']."');</script>";
      
          case "managerdeleted":
            echo "<script type='text/javascript'>messageDialog('Record removed succesfully','manageractioned','../images/SUCCESS.png','".$sessID."');</script>";
            break;
            case "managercreated":
              echo "<script type='text/javascript'>messageDialog('Record created succesfully','manageractioned','../images/SUCCESS.png','".$sessID."');</script>";
              break;

        case "confirmpassworderror":
          echo "<script type='text/javascript'>messageDialog('Mismatched passwords','confirmpassworderror','../images/error.png','');</script>";
          break;
         case "emaildontexist":
          echo "<script type='text/javascript'>messageDialog('That email is not registered','emaildontexist','../images/error.png','');</script>";
          break;
          case 'passwordchangedsuccess':
          echo "<script type='text/javascript'>messageDialog('Password was changed succesfully','passwordchangedsuccess','../images/SUCCESS.png','');</script>";
            break;
            case 'passwordchangedfail':
              echo "<script type='text/javascript'>messageDialog('There was an error while processing','passwordchangedsuccess','../images/error.png','');</script>";
        
break;
case 'incorrectcode':
  echo "<script type='text/javascript'>messageDialog('Incorrect code','expiredcode','../images/error.png','');</script>";

     break;
     case 'mismatchedpassword':
      echo "<script type='text/javascript'>messageDialog('Mismatched passwords','resetmismatchedpassword','../images/error.png','');</script>";
          break;
          case 'passwordresetfromlogin':
            echo "<script type='text/javascript'>messageDialog('Password successfully changed','resetpasswordsuccess','../images/SUCCESS.png','".$sessID."');</script>";
            break;
            case 'errorresetfromlogin':
              echo "<script type='text/javascript'>messageDialog('There was an error while processing','resetpasswordsuccess','../images/error.png','".$sessID."');</script>";
break;
case 'mismatchedpasswordforgot':
  echo "<script type='text/javascript'>messageDialog('Mismatched passwords','mismatchedpasswordforgot','../images/error.png','".$sessID."');</script>";

break;
case 'incorrectcodesignup':
  echo "<script type='text/javascript'>messageDialog('Expired / Incorrect code','incorrectcodeignup','../images/error.png','".$sessID."');</script>";



}
}
?>

  
<body style="background:none">


 
    <?php

require("../database/include/connection.php");

if(!(isset($_POST['username'])&&(isset($_POST['password']))))
{
   // echo "<script>window.history.back();</script>";
}


?>

</body>
</html>