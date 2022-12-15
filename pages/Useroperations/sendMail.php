<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="../../index.css">
<body style="background:none">
<div id="cyrokdialog"></div>
<script src="../../js/app.js"  media="all"></script>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require 'PHPMailer-master/src/Exception.php';
//require 'PHPMailer-master/src/PHPMailer.php';
//require 'PHPMailer-master/src/SMTP.php';
//Load Composer's autoloader
require 'vendor/autoload.php';
//Create an instance; passing `true` enables exceptions

//sendMail();
function sendMail($emailAddress,$subject,$mess){$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cyrokemarket@gmail.com';                     //SMTP username
    $mail->Password   = 'tvniyoxedhyawbrm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('cyrokemarket@gmail.com', 'Cyrok E-Market');
    $mail->addAddress($emailAddress);     //Add a recipient
    $mail->addAddress('rohan.powell36@yahoo.com');               //Name is optional
    $mail->addReplyTo('cyrokemarket@gmail.com', 'Information');
    $mail->addCC('rohan.powell36@gmail.com');
    $mail->addBCC('rohan.powell36@yahoo.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $mess;
    $mail->AltBody = $mess;

    $mail->send();
    echo '<div style="width:100%; text-align:center";>Validation Code has been sent to '.$emailAddress.'</div><br>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

function checkEmailValidity($email)
{
    $subject="Verification of email address";
    $Mess=sendEmail($email);
    if($Mess==null)
    {
        echo "<script>window.history.back()</script>";
    }else
    sendMail($email,$subject,$Mess);
    
}

function checkifEmailExists($email,$role)
{
    $connect=OpenCon();
$table="customers";
    if($role=="Admin")
    {
        $table="administrators";
        
    }


    $sql="SELECT email from $table where email='$email'";
    if($result = mysqli_query($connect, $sql))
    {
        if(mysqli_num_rows($result) > 0)

              { 
                return true;
              }else
              {
               echo "<script>window.location='../../process/adminprompts.php?mess=emaildontexist'</script>";
       
               return false;}

              $connect->close();
             
}
}
function resetPassword($password,$email,$role)
{
    $connect=OpenCon();
$table="customers";
    if($role=="Admin")
    {
        $table="administrators";
        
    }

    $passwordHash=password_hash($password,PASSWORD_BCRYPT);

    $sql="UPDATE $table set password='$passwordHash' where email='$email'";
        if(mysqli_query($connect,$sql))
              {

              if(isset($_SESSION["Email"]))
              {
                  unset($_SESSION["Email"]);
              }
              if(isset($_SESSION["role"]))
              {
              unset($_SESSION["role"]);
              }
             // echo "<script> window.location='../signin.html'</script>";
           echo "<script>window.location='../../process/adminprompts.php?mess=passwordchangedsuccess'</script>";
              }
              else
              {
                                 
                  echo "<script>window.location='../../process/adminprompts.php?mess=passwordchangedfail'</script>";
                  
              }
}

function checkCode($code,$email){
    $connect=OpenCon();
    $code=addslashes($code);
    $expire=time();
    $email=addslashes($email);

    $query= "SELECT * FROM codes where code='$code' && email='$email' order by id desc limit 1";
    $result=mysqli_query($connect,$query);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_assoc($result);

            if($row["expires"]>$expire)
            {
            
                return true;
            }
                else{
                   // echo "<script>window.location='../../process/adminprompts.php?mess=expiredcode'</script>";
                    //echo "<script type='text/javascript'>messageDialog('the code is expired','default','../../images/error.png','');</script>";
                  return false;
                }
        }else{
           // echo "<script>alert('the code is incorrect')</script>"; 
           // echo "<script type='text/javascript'>messageDialog('the code is incorrect','default','../../images/error.png','');</script>";
            //echo "<script>window.location='../../process/adminprompts.php?mess=incorrectcode'</script>";
            return false;

        }
    }else{
       // echo "<script>window.location='../../process/adminprompts.php?mess=incorrectcode'</script>";
        return false; }
}


function sendEmail($email){
    $connect=OpenCon();
$expire=time()+(60*10);
$code=rand(10000,99999);
$email=addslashes($email);

$mess="";
   
if ($email==null)
{
    return null;
}

$query= "INSERT INTO codes (email,code,expires)VALUES ('{$email}','{$code}','{$expire}')";
if($connect->query($query)===true)
{
    $mess="Hello, ".$email." your validation code is <b>".$code."</b>.<br>Your code expire in 10 miniutes";
    
  
    
}else{
    echo "error sending code".$code." ".$connect->error;
}
$connect->close();
//send email here
return $mess;

}

?>
</body>
</html>