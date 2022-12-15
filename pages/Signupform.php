
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYROK E-Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="../index.css"  media="all">

</head>
<div id="cyrokdialog"></div>

<body id="signupbody">
    
    <nav class="navbar bg-danger">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../homepage.php">CYROK E-Market</a>
        </div>
        <ul class="nav navbar-nav">
          <li ><a href="../homepage.php">Home</a></li>
          <li><a href="../About.html">About CYROK E-Market</a></li>
          <li><a href="../Contact.html">Contact us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="Signupform.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li id="selectlogin"><a href="signin.html"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
        </ul>

       
      </div>
    </nav>
    
<style>
        .passwordform{
            width:100%;
            max-width:350px;
            border-radius:10px;
            margin:auto;
           
           max-height:200px;
            padding:20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
background:white;
        }
        .passwordform h3{
            margin:auto;
            width:inherit;
            text-align:center;
            margin-bottom:10px;
        }
        .passwordform .btn-success{
            float:right;
            margin-top:10px;
            
        }
        .passwordform .btn-danger{
            
            margin-top:10px;
            
        }
        </style>
<?php 

require("../pages/Useroperations/sendMail.php");
require("../database/include/connection.php");
$mode="enteremail";

if(isset($_GET['mode']))
   {
        $mode=$_GET["mode"];
   }

   switch($mode){

   
    case "enteremail": 
      
      if (isset($_SESSION['email']))
    {
      unset($_SESSION['email']);
    }
?>
<br>
<form method="post" action="Signupform.php?mode=entercode" class="passwordform">
                                <h3>Signup a Customer</h3>
                                
                                <div style= "text-align:center">Enter your email address</div>
                                <input type="email" name="e-mail" placeholder="e.g username@gmail.com" class="form-control" required/>
                                <input class="btn btn-danger" onclick="window.location='../homepage.php'" type="button" value="back"><input class="btn btn-success" type="submit" value="Next"></input>

                            </form>


<?php
break;
case "entercode":
  if(isset($_POST["e-mail"]))
  {
    $_SESSION['email']=$_POST["e-mail"];
    $email= $_SESSION['email'];
    //end email with code
    checkEmailValidity($email);

  }
  if(!isset($_SESSION["email"])){

 echo("<script>window.location='Signupform.php?mode=enteremail'</script>");
  }

?>



<br>
 <form method="post" action="Signupform.php?mode=checkcode" class="passwordform">
                              <h3>Signup a Customer</h3>
                                
                                <div style= "text-align:center">Enter the 5 digit code sent to your email</div>
                                <input type="text" name="code" placeholder="12345" class="form-control" required/>
                                <input class="btn btn-danger" onclick="window.location='Signupform.php?mode=enteremail'" type="button" value="back"><input class="btn btn-success" type="submit" value="Next"></input>

                            </form>
<?php

break;

case "checkcode":
    if(isset($_POST["code"]))
    {
         $code=$_POST["code"];
   if(checkCode($code,$_SESSION['email'])===false)
   {
    echo "<script>window.location='../process/adminprompts.php?mess=incorrectcodesignup'</script>";
    //echo("<script>window.location='Signupform.php?mode=entercode'</script>");
   }
   else{
    echo("<script>window.location='Signupform.php?mode=signup'</script>");
   }


    }else{
           
   echo("<script>window.location='Signupform.php?mode=entercode'</script>");
    }
break;

case "signup":
  
    ?>



    <div id="overlay"></div>
    <div style="display:flex;">
    <div id="passwordcriteria">
				<h3>Signup Fields Criteria</h3>
		
					<div class="Mandatory">
				Telephone format {xxx-xxx-xxxx}					
				</div>
				<div class="Mandatory">

				Passwords must contain at least :<br/>One(1) UPPERCASE Character 			
				</div>
				<div class="Mandatory">
				One (1) lowercase letter 				
				</div>
				<div class="Mandatory">
				Eight (8) characters				
				</div>
				<div class="Mandatory">
				One (1) numeric character 					
				</div>
				<div class="Mandatory">
				One (1) special character e.g(%$#)				
				</div>
				
				
			</div>	
    <div class="form" id="customersignup" > <div style="display:flex;flex-direction:row;justify-content: flex-end; width:100%;" ><button class="btn btn-danger" style="width:fit-content;justify-self: flex-end; align-self: flex-end; " ><b>X</b></button></div>
        <h3>CUSTOMER SIGN UP</h3>
        <form  id="customersignupform"  method="post">
            
           
            <label>Firstname</label><input class="form-control" type="text" name="fname" required/>
            <label>Lastname</label><input class="form-control" type="text" name="lname" required/>
            <label>Email</label><input class="form-control" type="email" name="email" <?php echo "value= '".$_SESSION['email']."'"?> readonly/>
            <label>Telephone</label><input class="form-control" type="tel" name="phone_number" pattern="^\d{3}-\d{3}-\d{4}$" required/>
            <label>Street</label><input class="form-control" type="text" name="street" required/>
            <label>Town</label><input class="form-control" type="text" name="town" required/>
            <label>Parish</label><select class="form-control" type="text" name="parish" required>
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
            </select>
            <label>Username</label><input class="form-control" type="text" name="uname" required/>
            <label>Password</label><input class="form-control" type="password" required  name="pword"/>
            
            <label>Confirm Password</label><input class="form-control" type="password" name="pword2" required/>
           <div style="display:flex; justify-content: space-between; margin-bottom: 1%;margin-top: 3.5%;"><input type="button" onclick= "confirmDialog('Are you ure you want to cancel signing up?','Cancelsignup','Cancel Signup')" class="btn btn-danger" value="CANCEL SIGNUP"/><input type ="submit" id="CreateAccountBtn" class="btn btn-success" value="CREATE ACCOUNT"/> </div> 
        </form>
      
</div> 

    </div>
    <script src="../js/app.js"  media="all"></script>
    <script src="../index.js"></script>
  </body>
  <?php
  break;
   }
  ?>
</html>

