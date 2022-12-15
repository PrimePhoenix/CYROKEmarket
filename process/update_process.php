
<?php

require("../database/include/connection.php");


session_start();



//Check if someone is logged in 
if(!isset($_SESSION['ID'])) 
{
	echo "<script>window.location='../process/adminprompts.php?mess=gotosignin'</script>";
   // echo "<script>alert('You are not logged')</script>";
  // echo "<script> window.location='../pages/signin.html'</script>";
}
if($_SESSION['ID']!=$_GET["id"])
{ 

  echo "<script>window.history.back();</script>";


}

$sessID=$_GET["id"];
$uname=$_SESSION['$sessID'];
 
//check if the ubmit button for the update page was pressed
if(isset($_GET['update']))

{
    $connect=OpenCon();



$sql= "UPDATE customers set Telephone='" . $_POST['phone_number'] . "', Town='" . $_POST['town'] . "', Street='" . $_POST['street'] . "',Parish='". $_POST['parish']."'  WHERE UserName='" . $uname . "'";
if(count($_POST)>0) {
  if(mysqli_query($connect,$sql))
		{//$message = " Record was updated successfully";
			echo "<script>window.location='../process/adminprompts.php?id=".$sessID."&mess=successupdate'</script>";

		//echo "<script>alert('$message')</script>";
	//	echo "<script> window.location='../pages/CustomerDashboard.php?id=".$sessID."'</script>";
	
		}
		else
		{
			//echo "<script>alert('$connect->error')</script>";
			echo "<script>window.location='../process/adminprompts.php?id=".$sessID."&mess=successupdateerror'</script>";
			
		}
    
}

    else{
		echo "<script>window.location='../process/adminprompts.php?id=".$sessID."&mess=successupdateerror'</script>";
	
    }
   // echo "<script> window.location='../pages/CustomerDashboard.php?id=".$sessID."'</script>";
    $connect->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYROK E-Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"  media="all">
  <link rel="stylesheet" href="../bootstrapstyles.css"  media="all">
  <link rel="stylesheet" href="../index.css"  media="all">
<script>
	var sessID= '<?=$sessID?>';
  
	</script>
</head>

  <body  class="storespage">
  <div id="cyrokdialog"></div>
    <!--Navigation Bar-->
    <nav class="navbar bg-danger" style="border-radius: 0%;">
        <div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="../homepage.php">CYROK E-Market</a>
				</div>
				<ul class="nav navbar-nav">
					<li ><a href="../homepage.php">Home</a></li>
					<li><?php echo '<a href="../pages/CustomerDashboard.php?id='.$sessID.'">'; ?>Return to Dashboard</a></li>
            </ul>
					<ul class="nav navbar-nav navbar-right">

					
						
					
						<li id="selectlogin"><?php echo '<a href="logout.php?id='.$sessID.'">'; ?><span class="glyphicon glyphicon-log-out" ></span> Log out</a></li>
					</ul>
  
         
        </div>
       
      </nav>
<div style="display:flex; flex-direction:row; width:100%;justify-content:center;">
	<form id= "updateformcontent" class="form" autocomplete="off"  method="post" <?php echo "action='update_process.php?id=".$sessID."'"?>>
		<div id="signupformcontainer" >
					
				<?php echo "<h3>Updating information for ".$uname."</h3>" ?>
				<div class=>
					
					<div class="inputItem"><label class="input labels">First Name:</label><input type="text" name="fname" id="fname" class="form-control"  placeholder="" required="" disabled></div>

					<div class="inputItem"><label class="input labels">Last Name:</label><input type="text" name="lname" id="lname" class="form-control"  placeholder="" required disabled></div>
					 
				</div>
					<div class="inputFormRow">

					<div class="inputItem"><label class="input labels">Email Address:</label><input type="email" required name="email" id="email" class="form-control" placeholder="" disabled></div>
					<div class="inputItem"><label class="input labels">Phone :</label><input style="margin-left: 0px;" type="tel"  name="phone_number" id="phone_number" placeholder="xxx-xxx-xxxx" pattern="^\d{3}-\d{3}-\d{4}$" required="required" class="form-control" ></div>

				</div>

				<div class="inputFormRow">
					

					<div class="inputItem"><label class="input labels">Street:</label><input style="margin-left: 0px;" type="text" name="street" id="street" class="form-control"  placeholder="" ></div>
					<div class="inputItem"><label class="input labels">Town:</label><input type="text" name="town" id="town" class="form-control"  placeholder="" required=""></div>
				</div>
					<div class="inputFormRow">
				
						<div ><label class="input labels" >Parish:</label>
							<select id="parish" name="parish" class="form-control" >
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

						</div>
					</div>
					<b><div  class="pageLabel" style="font-size: 1.5vw;"></div></b>


				<div class="inputFormRow" >
					
					<div class="inputItem"><label class="input labels">Username:</label><input style="margin-left: 0px;" type="text" name="uname" id="uname" class="form-control"  required=""  placeholder="" disabled></div>
				
				</div>


<?php 
				completeForm();
				//populates the form field with data
	function completeForm()
		{

						
			$uname=$_SESSION['$sessID'];
			$connect=OpenCon();
			$sql= "SELECT FirstName,LastName,Email,Telephone,Street,Town,Parish,Username from customers where Username='$uname'";

			

			
			if($result = mysqli_query($connect, $sql))
			{
				if(mysqli_num_rows($result) > 0)
					{
						$pw = mysqli_fetch_array($result);
				
				
						echo "<script>				
										document.getElementById('fname').value ='".$pw['FirstName']."';
										document.getElementById('lname').value ='".$pw['LastName']."';
										document.getElementById('phone_number').value='".$pw['Telephone']."';
										document.getElementById('email').value ='".$pw['Email']."';
										document.getElementById('street').value ='".$pw['Street']."';
										document.getElementById('town').value ='".$pw['Town']."';
										document.getElementById('parish').value ='".$pw['Parish']."';
										document.getElementById('uname').value ='".$pw['Username']."';
										</script>
										";
				
					}
					else {
						echo "<script>window.location='../process/adminprompts.php?id=".$sessID."&mess=successupdateerror'</script>";
							}
			
			
			}else{
				
			}
			
			$connect->close();
		}
?>
					<div style="display:flex; width: 100%;justify-content: center; gap:10%; padding:20px 0px 20px 0px;">
						<?php echo ""?>
						<input type="button" value="Cancel Update"  onclick="confirmDialog('Are you sure you want to cancel?','Cancelupdate','Cancel Update',sessID)"  class="btn btn-danger"  id="cancelUpdate"/>
						
						<input type="button" class="btn btn-success"   name="UpdateAccountBtn"  onclick="confirmDialog('Are you sure you want to submit?','Confirmupdate','Confirm Update',sessID)" value="Update Information" />	
							
					
					</div>
		</div>
	</form>
<div>
<script src="../js/app.js"></script>
   
    </body>
    </html>