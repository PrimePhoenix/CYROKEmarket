
<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrapstyles.css">
  <link rel="stylesheet" href="../index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body >


  <div id="cyrokdialog"><div>
<script src="../js/app.js"  media="all"></script>

<?php

   require("../database/include/connection.php");
   session_start();
   if(!isset($_SESSION['ID'])) 
{
  //echo "<script>alert('You must be logged in as an administrator to access this page')</script>";
  echo "<script type='text/javascript'>messageDialog('You must be logged in as an administrator to access this page','unauthorized','../images/error.png','');</script>";
    
  // echo "<script> window.location='../pages/signin.html';</script>";
}




  
    //storind the data in your database
    if(isset($_POST['newstore']))
    {
        $sessID=$_GET["id"];
    $uname=$_SESSION['$sessID'];
    $role=$_SESSION['$uname']; 
    
    
    if($role!="Admin")
   {
   
      echo "<script type='text/javascript'>messageDialog('You must be logged in as an administrator to access this page','unauthorized','../images/error.png','');</script>";
   }

        $img_ex=pathinfo($_FILES["upload"]["name"],PATHINFO_EXTENSION);
        $img_ex_lc=strtolower($img_ex);

        $allowed_exs=array("jpg","jpeg","png");
        $new_img_name="";
        if(in_array($img_ex_lc,$allowed_exs))
        {
            //prepare file 
            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path="uploads/".$new_img_name;
            $tmp_name=$_FILES["upload"]["tmp_name"];
            move_uploaded_file($tmp_name,$img_upload_path);  
        }
    

    $Storename=$_POST['Sname'];
    $Email=$_POST['Semail'];
    $Parish=$_POST['Sparish'];
    $Address=$_POST['Saddress'];
    $Phone=$_POST['Sphone'];
    $ManagerID=$_POST['SManagerID'];
    $MTitle=$_POST['SManagertitle'];
   
    $ManagerFName=$_POST['SManagerfn'];
    $ManagerLName=$_POST['SManagerln'];
    $Managerphone=$_POST['SManagertel'];
    $Manageremail=$_POST['SManageremail'];
    $OpeningHours=$_POST['OpeningHours'];
    $lattitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];


createManagerProlie($ManagerID,$MTitle,$ManagerFName,$ManagerLName,$Managerphone,$Manageremail);
createstore($Storename,$Email,$Parish,$Address,$Phone,$OpeningHours,$new_img_name,$ManagerID,$lattitude,$longitude,$sessID);
    }else{
        echo "<script type='text/javascript'>messageDialog('You must be logged in as an administrator to access this page','unauthorized','../images/error.png','');</script>";
        
        
    }


    function createstore($Storename,$Email,$Parish,$Address,$Phone,$OpeningHours,$filename,$ManagerID,$lattitude,$longitude,$sessID){
        $connect=OpenCon();
        $insert2="INSERT INTO stores (Storename,Email,Parish,Address,OpeningHours,StoreImage)VALUES('{$Storename}','{$Email}','{$Parish}','{$Address}','{$OpeningHours}','{$filename}');";
      if($connect->query($insert2)===true)
      {
          //echo "<script>alert('Store profile created ')</script>";
            
          $select="SELECT StoreID from stores where Storename='$Storename'";

          
          
if($result = mysqli_query($connect, $select)){
    if(mysqli_num_rows($result) > 0)
    {
         $res= mysqli_fetch_array($result);
         $SID=$res[0];
         
         AssignManagers($ManagerID,$SID);
         saveStoreCoordinates($lattitude,$longitude,$SID);
            
      }}
      echo "<script type='text/javascript'>messageDialog('Store Profile added successfully','storecreated','../images/SUCCESS.png','".$sessID."');</script>";
   // echo "<script>alert('this should be final');</script>";
    }
      
   
else{
        $err= "error saving information ".$connect->error;
     //  echo '<script> alert("'.$err.'")</script>';
        echo "<script type='text/javascript'>messageDialog('".$err."','storecreated','../images/error.png','".$sessID."');</script>";
        
    }
    mysqli_close($connect);
}
      
function createManagerProlie($ManagerID,$MTitle,$ManagerFName,$ManagerLName,$Managerphone,$Manageremail)
{$connect=OpenCon();
    $insert="INSERT INTO managersinfo (ManagerID,Title,Firstname,Lastname,Email,phone)VALUES('{$ManagerID}','{$MTitle}','{$ManagerFName}','{$ManagerLName}','{$Manageremail}','{$Managerphone}');";
     

    if($connect->query($insert)===true)
    {
      //  echo('<script>alert("Store Manager added")</script>');
        //echo '<script> window.location="../pages/administrators.php?id='.$sessID.'"</script>';
       // echo "<script type='text/javascript'>messageDialog('".$err."','dberror','../images/error.png','');</script>";
      
    }else{
        $err= "error saving information ".$connect->error;
     //  echo '<script> alert("'.$err.'")</script>';
       // echo $err;
        echo "<script type='text/javascript'>messageDialog('".$err."','dberror','../images/error.png','');</script>";
       //echo '<script> window.location="../pages/stores.php?id='.$sessID.'"</script>';
      
    }
    mysqli_close($connect);
  
}

function AssignManagers($ManagerID,$storeID)
{$connect=OpenCon();
    $insert="INSERT INTO storemanagers (ManagerID,StoreID)VALUES('{$ManagerID}','{$storeID}');";
     

    if($connect->query($insert)===true)
    {
       // echo('<script>alert("Store Manager linked to store")</script>');
      // echo "<script type='text/javascript'>messageDialog('".$err."','storecreated','../images/SUCCESS.png','".$sessID"');</script>";
       // echo '<script> window.location="../pages/stores.php?id='.$sessID.'"</script>';
      
    }else{
        $err= "error saving information ".$connect->error;
     //  echo '<script> alert("'.$err.'")</script>';
        echo "<script type='text/javascript'>messageDialog('".$err."','dberror','../images/error.png','');</script>";
      //  echo $err;
      //echo '<script> window.location="../pages/stores.php?id='.$sessID.'"</script>';
      
    }
    mysqli_close($connect);
  
}
   
function saveStoreCoordinates($lattitude,$longitude,$storeID)
{$connect=OpenCon();
    $insert="INSERT INTO coordinates (StoreID,Longitude,Lattitude)VALUES('{$storeID}','{$longitude}','{$lattitude}');";
     

    if($connect->query($insert)===true)
    {
       // echo('<script>alert("coordinates stored for store")</script>');
       // echo '<script> window.location="../pages/stores.php?id='.$sessID.'"</script>';
      
    }else{
        $err= "error saving information ".$connect->error;
      //  echo '<script> alert("'.$err.'")</script>';
        echo "<script type='text/javascript'>messageDialog('".$err."','dberror','../images/error.png','');</script>";
        //echo $err;
      
      
    }
    mysqli_close($connect);
  
}
    


    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
 