<?php 

require("../pages/Useroperations/sendMail.php");
$mode="entercode";

if(isset($_GET['mode']))
   {
        $mode=$_GET["mode"];
   }

   switch($mode){
case "entercode":
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


 
<style>
        .passwordform{
            width:100%;
            max-width:350px;
            border-radius:10px;
            margin:auto;
            border:1px solid black;
           max-height:200px;
            padding:20px;

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

<br>
 <form method="post" action="signup.php?mode=signup" class="passwordform">
                                <h3>Email Validation</h3>
                                <div style= "text-align:center">Enter the 5 digit code sent to your email</div>
                                <input type="text" name="code" placeholder="12345" class="form-control" />
                                <a href="signup.php?mode=entercode" ><input class="btn btn-danger" type="button" value="back"><input class="btn btn-success" type="submit" value="Next"></input>

                            </form>
<?php
break;

case "checkcode":
    if(isset($_POST["code"]))
    {
         $code=$_POST["code"];
   if(checkCode($code)===false)
   {
    echo("<script>window.location='signup.php?mode=entercode'</script>");
   }
   else{
    echo("<script>window.location='signup.php?mode=signup'</script>");
   }


    }else{
           
   echo("<script>window.location='signup.php?mode=entercode'</script>");
    }
break;

case "signup":}
    ?>
    <script>
        window.history.back();
        </script>
</body>
</html>