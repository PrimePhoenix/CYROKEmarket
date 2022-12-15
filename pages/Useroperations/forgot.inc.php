<?php 
session_start();
$mode="role";
require("../../database/include/connection.php");
require("sendMail.php");
/*require("../../database/include/connection.php");
require ("sendMail.php");*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYROK E-Market Reset Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="../../index.js"></script>
</head>


    <style>
        #signinpage{
            background:none;
        }
        .passwordform{
            width:100%;
            max-width:350px;
            border-radius:10px;
            margin:auto;
            border:1px solid black;
           max-height:200px;
            padding:20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);

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

   
  <body id="signinpage" style="background:none">
   
 <div>
    
 <nav class="navbar bg-danger" style="border-radius: 0%;">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="../../index.html">CYROK E-Market</a>
       </div>
       <ul class="nav navbar-nav">
         <li ><a href="../../homepage.php">Home</a></li>
         <li><a href="../../About.html">About CYROK E-Market</a></li>
         <li><a href="../..Contact.html">Contact us</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
        
       </ul>

      
     </div>
   </nav>


<?php

if(isset($_GET["mode"]))
{
    $mode=$_GET["mode"];

}

if($mode=='loggedinreset')
{
    $username=  $_SESSION['$sessID'];
     $role=  $_SESSION['$uname'];

  
$table="customers";
    if($role=="Admin")
    {
        $table="administrators";
        
    }

    if(isset($_POST["pword"])&&(isset($_POST["pword2"])))
    {
        $pass=$_POST["pword"];
        $pass2=$_POST["pword2"];
        
        

        if($pass!=$pass2)
        {
            echo "<script>window.location='../../process/adminprompts.php?mess=mismatchedpassword'</script>";
         //   echo "<script>messageDialog('Passwords Mismatch','default','../../images/error.png');</script>";
          //  echo "<script>window.location='forgot.inc.php?mode=loggedinreset';</script>";
        }else{
            Reset_password($username,$table,$pass);
          
        }
    }
    

}
  

    //set password
    function Reset_password($username,$table,$password)
    {

       ?> <script> 
        var pass="<?php echo $password?>";
        checkPassword(pass);
     
     
     </script>
         <?php
echo "<script>checkPassword(pass)</script>";
        $connect=OpenCon();
    $passwordHash=password_hash($password,PASSWORD_BCRYPT);

    $sql="UPDATE $table set password='$passwordHash' where username='$username'";
        if(mysqli_query($connect,$sql))
              {$message = " Password was changed successfully";
      
            //  echo "<script>alert('$message')</script>";
             // echo "<script>messageDialog('".$message."','default','../../images/SUCCESS.png','');</script>";
             echo "<script>window.location='../../process/adminprompts.php?mess=passwordresetfromlogin'</script>";
             // echo "<script> window.location='../CustomerDashboard.php?id=".$_SESSION['ID']."'</script>";
          
              }
              else
              {
                echo "<script>window.location='../../process/adminprompts.php?mess=errorresetfromlogin'</script>";
              }

            }
        
if(isset($_SESSION['ID']))
{
    $mode="loggedinreset";
 
     
    ?><form style="max-height:fit-content" method="post" action='forgot.inc.php?mode=loggedinreset' class="passwordform">
    <h3>Reset Password for <?php echo $_SESSION['$sessID']?></h3>
    
    <input type="password" name="pword" placeholder="Enter new password" class="form-control" required/>
    <br>
    <input type="password" name="pword2" placeholder="Re-enter new password" class="form-control" required />
    <a <?php echo "href='../CustomerDashboard.php?id=".$_SESSION["ID"]."'"?>><input class="btn btn-danger" type="button" value="back"></input></a><input class="btn btn-success" type="submit" value="Next"></input>

</form>
<?php
}
else

   if(isset($_GET['mode']))
   {
        $mode=$_GET["mode"];
   }

   
function checkPassword($password){

    $number=preg_match('@[0-9]@',$password);
    $lowercase=preg_match('@[a-z]@',$password);
    $Uppercase=preg_match('@[A-Z]@',$password);
    $specialCharacter=preg_match('@[^\w]@',$password);

    if(strlen($password)<8 || !$number || !$lowercase || !$Uppercase || !$specialCharacter )
    {
        return false;
    }
    return true;
}



?>

        <?php
      
      
        switch($mode)
            {
              case 'role':
                unset($_SESSION["role"]);


              ?> <form method="post" action="forgot.inc.php?mode=enteremail" class="passwordform">
                    <h3>Reset Password</h3>
                    <div>I am :
                <div style="display:flex;gap:10%;">
                <label for ="Customer">a Customer</label> 
                <input type="radio" value="Customer" name="role" id="Customer"  checked>
            </input><label for="Admin">an Administrator</label><input type="radio" id="Admin" value= "Admin" name="role">
        </input>
    </div>
    <a href="../signin.html" ><input class="btn btn-danger" type="button" value="Cancel"></a></input><input class="btn btn-success" type="submit" value="Next"></input>
              </form>
<?php
break;
            case 'enteremail':
                unset($_SESSION["Email"]);
                   //echo "<script>document.getElementById('email').value=null;</script>";

//if the uer did not come here directly from the role page end them back
                    if(!isset($_POST["role"]))
                    {
                        echo("<script>window.location='forgot.inc.php?mode=role'</script>");
                    }
                    else
                        {
                            $_SESSION["role"]=$_POST["role"];
                        }

        ?>
             <form method="post" action="forgot.inc.php?mode=entercode" class="passwordform">
                 <h3>Reset Password</h3>
                 
                 <input id="email" type="email" name="Email" placeholder="Enter your email address" class="form-control" required />
                 <a href="forgot.inc.php?mode=role" ><input class="btn btn-danger" type="button" value="Back"></a></input><input class="btn btn-success" type="submit" value="Next"></input>

            </form>
            <?php
                     break;

                    case "entercode":

                       if (isset($_POST["Email"]))
                        { 
                            $email=$_POST["Email"];
                             $_SESSION["Email"]=$email;

                            if(checkifEmailExists($email,$_SESSION["role"]))
                             {  $subject="CYROK E-Market Password Reset Code";
                                $Mess=sendEmail($email);
                                if($Mess==null)
                                {
                                    echo("<script>window.location='forgot.inc.php?mode=enteremail'</script>");
                                }else{
                                sendMail($email,$subject,$Mess);
                                }
                             }else{
                               //  echo "<script>alert('That email does'nt exit')</script>";
                                // echo "<script>messageDialog('That email does'nt exit','default','../../image/error.png','')</script>";
                                echo "<script>window.location='../../process/adminprompts.php?mess=emaildontexist'</script>";
                               //  echo("<script>window.location='forgot.inc.php?mode=enteremail'</script>");
                             }
                           
                        }
                        if(!isset($_SESSION["Email"])){
                            
                            echo("<script>window.location='forgot.inc.php?mode=enteremail'</script>");
                }
                ?>

                <form method="post" action="forgot.inc.php?mode=reset" class="passwordform">
                                <h3>Reset Password</h3>
                                <div style= "text-align:center">Enter the 5 digit code sent to your email</div>
                                <input type="text" name="code" placeholder="12345" class="form-control" required />
                                <a href="forgot.inc.php?mode=enteremail" ><input class="btn btn-danger" type="button" value="back"><input class="btn btn-success" type="submit" value="Next"></input>

                            </form>
                            <?php
                    break;

                    case "reset":

                        if(!isset($_GET["error"]))
                        {
                           
                           
                        if(isset($_SESSION["Email"])&& isset($_POST["code"]))
                       {
                            $code=$_POST["code"];
                      if(checkCode($code,$_SESSION["Email"])===false)
                      {
                       //echo("<script>window.location='forgot.inc.php?mode=entercode'</script>");
                       echo "<script>window.location='../../process/adminprompts.php?mess=incorrectcode'</script>";
                      }
                       }else{
                              
                      echo("<script>window.location='forgot.inc.php?mode=entercode'</script>");
                       }}
                ?>

                <form method="post" action='forgot.inc.php?mode=doreset' class="passwordform">
                                <h3>Reset Password</h3>
                                
                                <input type="password" name="pword" placeholder="Enter new password" class="form-control" required/>
                                <br>
                                <input type="password" name="pword2" placeholder="Re-enter new password" class="form-control" required />
                                <a href="forgot.inc.php?mode=entercode" ><input class="btn btn-danger" type="button" value="back"></input></a><input class="btn btn-success" type="submit" value="Next"></input>

                            </form>

                            <?php
                    break;
                
                case "doreset":
                    if(isset($_POST["pword"])&&(isset($_POST["pword2"])))
                    {
                        $pass=$_POST["pword"];
                        $pass2=$_POST["pword2"];
                        
                        

                        if($pass!=$pass2)
                        {
                            echo "<script>window.location='../../process/adminprompts.php?mess=mismatchedpasswordforgot'</script>";
                          //  echo"<script> messageDialog('Passwords Mismatch','default','../../images/error.png');</script>";
                           // echo "<script> window.location='forgot.inc.php?mode=reset&error=yes';</script>";
                        }else{
                        
                          /*  if(!checkPassword($password))
                           {
                            echo "<script>alert('Password does not meet minimum criteria'); window.location='forgot.inc.php?mode=reset&error=yes';</script>";
                           } else{*/
                            ?>
                           <script> 
                           var pass="<?php echo $password?>";
                           checkPassword(pass);
                        
                        
                        </script>
                            
                            
                            <?php

                            echo "<script>checkPassword(pass)</script>";
                               resetPassword($pass,$_SESSION['Email'],$_SESSION['role']);
                               if(isset($_SESSION['role']))
                               {
                                unset($_SESSION["role"]);
                               }
                               if(isset($_SESSION['Email']))
                               {
                                unset($_SESSION["Email"]);

                               }
                           //}
                        }
                    }else{
                      //  echo"<script> messageDialog('Passwords field cannot be empty','default','../../images/error.png');</script>";
                       echo "<script>window.location='forgot.inc.php?mode=reset&error=yes';</script>";
                    }
                    
                
                }
                   
                   
                
                ?>
</div>

</body>
</html>