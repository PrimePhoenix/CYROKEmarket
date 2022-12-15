
<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrapstyles.css">
  <link rel="stylesheet" href="../index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body >


  <div id="cyrokdialog"></div>
<script src="../js/app.js"  media="all"></script>
      <?php
require("../database/include/connection.php");

if(isset($_POST['uname']))
{
            $password=$_POST['pword'];
            $Username=$_POST['uname'];
            $firstName=$_POST['fname'];
            $lastName=$_POST['lname'];
            $phone=$_POST['phone_number'];
            $email=$_POST['email'];
            $street=$_POST['street'];;
            $town=$_POST['town'];

            $parish=$_POST['parish'];

                $connect=OpenCon();
                $Password=password_hash($password,PASSWORD_BCRYPT);
            
            $insert="INSERT INTO customers (FirstName,LastName,Email,Telephone,Street,Town,Parish,UserName,Password)VALUES('{$firstName}','{$lastName}','{$email}','{$phone}','{$street}','{$town}','{$parish}','{$Username}','{$Password}');";
            
            
            
            if($connect->query($insert)===true)
                {
                   // echo '<script> alert("successful signup")</script>';
                    echo "<script type='text/javascript'>messageDialog('Successfully created account for ".$Username." ','loggedout','../images/SUCCESS.png',null);</script>";
                   // echo '<script> window.location="../homepage.php";</script>';
                }else
                    {
                            $err= "error saving information ".$connect->error;
                           // echo '<script> alert("'.$err.'")</script>';
                           // echo '<script> window.history.back()</script>';
                           echo "<script type='text/javascript'>messageDialog(' ".$err." ','sessionerror','../images/error.png',null);</script>";
                    }
                    mysqli_close($connect);
}else { echo '<script> window.history.back()</script>';
}



?>

</body>
</html>
   