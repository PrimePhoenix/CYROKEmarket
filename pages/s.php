

<?php
$MyName="Rohan";

echo '<script>var name2="'.$MyName.'yes";console.log(name2);</script>';

$tester=
?>
<script>true</script>
<?php

;
echo $tester;?>
<script>
var name="<?php echo $MyName?>";
console.log(name);
name+=" Anthony Powell";

  </script><script src="../index.js"></script>
<?php



echo "it worked. my name is ".$MyName."";


function orders($storename,$uname)
{
  $OID=$uname."".$storename;
  $connect=OpenCon($OID);
  $sql2 = "SELECT Data FROM customerorder where OrderId=$OID";
  
  if($result = mysqli_query($connect, $sql2)){
    if(mysqli_num_rows($result) > 0)
    {

  //$result = $connect->query($sql2);
 // if ($result->num_rows > 0) {
    // output data of each row
   // while($row = $result->fetch_assoc())  {

    $data = mysqli_fetch_array($result);

                echo $data[0];
                //echo json_encode($product);
                $prodJSON=fopen('orders/$storename/orderdata.json','w');
                fwrite($prodJSON,json_encode($data[0]));

     echo $data[0];
        
             }
             echo "<script>alert('nothing found')</script>";

            }

  
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<script>

  </script>

</head>
<script>
    var x = document.getElementById("Main-container");
function getLocation() {
  if (navigator.geolocation) {
 
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {

  var geo=document.getElementById("geo");
  var distance=document.getElementById("dis").value;
 window.location="../process/findnearbystore.php?longitude="+position.coords.longitude+"&&latitude="+position.coords.latitude+"&&distance="+distance;



  
}
</script>

  <body  class="storespage">
    <div id="productPge">

    <nav class="navbar navbar-inverse" style="border-radius: 0%;">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../homepage.php">CYROK E-Market</a>
          </div>
          <ul class="nav navbar-nav">
            <li ><a href="../homepage.php">Home</a></li>
            <li><a href="storehome.php?id=".$sessID>Change Store</a></li>
            <li><a ><div onclick="getLocation()" style="display:flex; flex-direction:row; width:150px; margin:auto; align-items:center; justify-content:flex-end; gap:3%;" @click="stopshowCartItems()">Find a nearby store <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg></span></div></a></li><div style="display:flex;flex-direction:row; margin-top:10px;width:80px;padding:0px" class="form-control" >
<select name="distance_km" id="dis" onchange="getLocation()" >
        <option value="">Distance</option>
        <option value="5">+5 KM</option>
        <option value="10" >+10 KM</option>
        <option value="15" >+15 KM</option>
        <option value="20" >+20 KM</option>
    </select>
            </div>
          </ul>
          <ul class="nav navbar-nav navbar-right">

               
               <li><a>
                <div id="shop" style="display:flex; flex-direction:row; width:90px; margin-top:-10px; align-items:center; justify-content:flex-end; gap:3%;"><!--<div class="btn btn-primary" @click="SaveCart()">save cart</div> <div class="btn btn-primary" @click="retrieveCart(myJSONString)">retrieveCart</div>-->
               <div style="display:flex; flex-direction:row;width:100px;" @click="showCartItems()"> <span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></span>

                   <div id="showMyCart" style="display:flex; flex-direction:column; min-width:80px;">

                   <div id="icount"> {{itemCount}} items</div>
                   <div id="icost">${{cartTotals}}</div>
                   </div>
            </div>
</div>
<li id="selectlogin"><a href="../process/logout.php?id=".$sessID><span class="glyphicon glyphicon-log-out" ></span> Log out</a></li>

               </a></li>
               <li id="selectlogin"><a href="../process/logout.php?id=".$sessID><span class="glyphicon glyphicon-log-out" ></span> Log out</a></li>
            
          </ul>
  
         
        </div>
       
      </nav>
      <div class="status greeting"><span><b>Hello</b></span>
          
        
      </div>
      <form>
    <div class="sbar">
      
      <input class="col-md-8" type="search" style="height:45px; max-width: 500px; border-radius: 8px;" placeholder="Search for an item..."/>
      <button class="btn btn-success"> SEARCH</button>
  
    </div>  </form>
    
 <div style=" display:flex;height:500px;">
<div id="allproducts" class="store-content"  >


<div id="products" style=" height:70vh; " >
        <ul v-for="product in items">  
          <div >        
                <div id="productcard" class="store" style="width: 18rem;">
               
                       <div id="productimg"> <img class="product-img"  style="height:80px; width:auto;" v-bind:src="product.srcImg" title=srcImg alt="Card image cap"/></div>
                      <div id="productbody">
                          <span><b>{{product.Name}}</b></span>
                          <span>Price: ${{product.UnitPrice}}</span>
                          <span>3 for ${{Math.floor((product.UnitPrice*product.pricefor3)*100)/100}}</span>
                          <div style="display:flex; flex-direction:row; justify-content:space-between;margin-bottom:10px;" v-show="product.instock"> 
                             
                          <span>Quantity:</span><span><button  v-on:click="reduceQuantity(product)">-</button>  {{product.quantity}}  <button   v-on:click="addQuantity(product)">+</button></span>
                          </div>
                          <div style="display:flex; flex-direction:row; justify-content:space-between;margin-bottom:10px;" v-show="!product.instock"> 
                             
                          <span>Out of stock</span>
                </div>
                          <button class="btn btn-success" @click="addToCart(product)">Add to Cart</button>
                      </div>
                </div>
                </div>
         </ul>
  </div>


</div>
       <div id="myitems" style="width:400px;" >
      <h3 margin="auto">My cart Items</h3>
   
      <div id="theItems">
   
      <div>
       
                </div>       

</div>
                </div>

                <div id="overlay">
		<dialog class="dialogs" open>
      <div   style="display:flex; flex-direction:column; align-items: center;max-height:500px;">
      <div style="width:100%;"><button class="btn btn-danger" @click="stopshowCartItems()" style="float:right;" >X</button></div>
			<h3>My Cart Items</h3>
      <div id="cartItemsDialog">
			
	
                </div>
                <div style="width100%; display:flex; flex-direction:row;font-size:20px"><div id="cartTotal"></div></div>
   <div style="display:flex; flex-direction:row; align-items:center; gap:40%; width:100%; margin-top:10px;" ><button id="clearcart" class="btn btn-danger" @click="checkout()" style="margin-left:10px;">Clear Cart</button><a id="checkout" class="btn btn-success" href="../checkout.php">GO to Checkout</a></div>
         </div>       
		</dialog>
			
			<div class="loader"></div>	
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../index.js"  media="all"></script>
  
  </body>
</html>