<?php session_start();
  require("database/include/connection.php");

  if(!isset($_SESSION['ID']))
{

  echo "<script>window.location='process/adminprompts.php?mess=gotosignin'</script>";
  //echo "<script>alert('You are not logged in')</script>";
  //echo "<script>window.location='signin.html'</script>";
  //return;
}
if(isset($_GET['id']))
{
  if($_SESSION['ID']!=$_GET["id"])
{ 

  echo "<script>window.history.back();</script>";


}
$store="";
if(isset($_GET['SN']))
{
  $store=$_GET['SN'];
}
  $sessID=$_GET["id"];
$_SESSION['user']=$_SESSION['$sessID'];

}
else 
{  
  echo "<script>window.history.back();</script>";
  // echo "<script>alert('You are not logged in')</script>";
 // echo "<script>window.location='signin.html'</script>";

}



  $_SESSION['fullname']=$_POST['fullname'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['phone']=$_POST['phone'];
  $_SESSION['street']=$_POST['street'];
  $_SESSION['town']=$_POST['town'];
  $_SESSION['parish']=$_POST['parish'];
  $_SESSION['deliverylocation']=$_POST['street'].",".$_POST['town'].",".$_POST['parish'];
  if(isset($_POST['addresschange']))
  { 
    $_SESSION['phone']=$_POST['phone2'];
    $_SESSION['street']=$_POST['street2'];
    $_SESSION['town']=$_POST['town2'];
    $_SESSION['parish']=$_POST['parish2'];
    $_SESSION['deliverylocation']=$_POST['street2'].",".$_POST['town2'].",".$_POST['parish2'];
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CYROK E-Market</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Price Slider Stylesheets -->
    <link rel="stylesheet" href="https://www.libero.com.tw/vendor/nouislider/nouislider.css">
    <!-- Google fonts - Playfair Display-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700">
    <link rel="stylesheet" href="fonts/hkgrotesk/stylesheet.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="https://www.libero.com.tw/vendor/owl.carousel/assets/owl.carousel.css">
    <!-- Ekko Lightbox-->
    <link rel="stylesheet" href="https://www.libero.com.tw/vendor/ekko-lightbox/ekko-lightbox.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://www.libero.com.tw/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://www.libero.com.tw/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="https://www.libero.com.tw/img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/regular.css" integrity="sha384-avJt9MoJH2rB4PKRsJRHZv7yiFZn8LrnXuzvmZoD3fh1aL6aM6s0BBcnCvBe6XSD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/brands.css" integrity="sha384-7xAnn7Zm3QC1jFjVc1A6v/toepoG3JXboQYzbM0jrPzou9OFXm/fY6Z/XiIebl/k" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">
  </head>
  <body  onload="updatecheckoutdisplay()">

    <!-- Hero Section-->
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><?php echo '<a href="pages/storehome.php?id='.$sessID.'">'?>Home</a></li>
          <li class="breadcrumb-item active">Checkout        </li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">Checkout</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">Choose your delivery method.</p></div>
          </div>
        </div>
      </div>
    </section>
 
    <!-- Checkout-->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <ul class="custom-nav nav nav-pills mb-5">
              <li class="nav-item w-25"><a href="checkout.php" class="nav-link text-sm ">Address</a></li>
              <li class="nav-item w-25"><a href="delivery.php" class="nav-link text-sm active">Delivery Method</a></li>
              <li class="nav-item w-25"><a href="#" class="nav-link text-sm disabled">Payment Method </a></li>
              <li class="nav-item w-25"><a href="#" class="nav-link text-sm disabled">Order Review</a></li>
            </ul>
            <div class="block my-5">
              <div class="block-body">
                <form method="post" id="pickuplocation" class="row">
                  <div class="form-group col-md-6 d-flex align-items-center">
                    <input type="radio" name="deliver" id="option0" value="Pickup at Store">
                    <label for="option0" class="ml-3"><strong class="d-block text-uppercase mb-2">Pickup at Store</strong><span class="text-muted text-sm">Item will be packaged until your arrival</span></label>
                  </div>
                  <div class="form-group col-md-6 d-flex align-items-center">
                    <input type="radio" name="deliver" id="option1" value="Home Delivery">
                    <label for="option1" class="ml-3"><strong class="d-block text-uppercase mb-2">Home Delivery</strong><span class="text-muted text-sm">Items will be delivered to the delivery addres you selected.</span></label>
                  </div>
                  <div class="form-group col-md-6 d-flex align-items-center">
                   
                    
                    <label  class="ml-3"><strong class="d-block text-uppercase mb-2"> Delivery/ Pickup time</strong> 
         
                        <label for="pickuptime">Select a time:</label>
                        <input type="time" id="pickuptime" name="pickuptime" required/><br>
              
                      <span class="text-muted text-sm">Item will be at the delivery location at this time</span></label>
                  </div>

                  <label  class="ml-3"><strong class="d-block text-uppercase mb-2"> Delivery/ Pickup Date</strong> 
         
         <label for="pickuptime">Select a Date:</label>
         <input type="date" id="pickupdate" name="pickupdate" required/><br>

       <span class="text-muted text-sm">Item will be at the delivery location at this time</span></label>
   </div>

</form>
              <div class="mb-5 d-flex justify-content-between flex-column flex-lg-row"><div onclick="window.history.back()" class="btn btn-link text-muted"> <i class="fa fa-angle-left mr-2"></i>Back to the addresses</div><div onclick="gotopayment(sessid)" class="btn btn-dark">Choose payment method<i class="fa fa-angle-right ml-2"></i></div></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block mb-5">
              <div class="block-header">
                <h6 class="text-uppercase mb-0">Order Summary</h6>
              </div>
              <div class="block-body bg-light pt-1">
                
                <ul class="order-summary mb-0 list-unstyled">
                <li class="order-summary-item"><span >Order Subtotal </span><span id="subtotalcheckout">$390.00</span></li>
                  <li class="order-summary-item"><span >Delivery fee</span><span id="subtotaldeliveryfee">$10.00</span></li>
                  
                  <li class="order-summary-item border-0"><span>Total</span><strong class="order-summary-total" id="totalcheckout">$400.00</strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>

var sessid= "<?php echo $sessID ?>";

function gotopayment(sessid){
  
  pickup=document.getElementById('pickuplocation');
  
store=document.getElementById("Store").innerText
  //window.location="payment.php?id="+sessid+"&SN="+store;
  pickup.action="payment.php?id="+sessid+"&SN="+store;
  pickup.submit();
}
</script>
    </section>
    <div id="Store" style="display:none"><?php echo $store?></div>
    <div id="user" style="display:none"><?php echo $_SESSION['$sessID']?></div>
   
      <!-- Copyright section of the footer-->
      <div class="py-4 font-weight-light bg-gray-800 text-gray-300">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left">
              <p class="mb-md-0">&copy; 2022 CYROK E-Market.  All rights reserved.</p>
            </div>
            <div class="col-md-6">
              <ul class="list-inline mb-0 mt-2 mt-md-0 text-center text-md-right">
                <li class="list-inline-item"><img src="https://www.libero.com.tw/img/visa.svg" alt="..." class="w-2rem"></li>
                <li class="list-inline-item"><img src="https://www.libero.com.tw/img/mastercard.svg" alt="..." class="w-2rem"></li>
                <li class="list-inline-item"><img src="https://www.libero.com.tw/img/paypal.svg" alt="..." class="w-2rem"></li>
                <li class="list-inline-item"><img src="https://www.libero.com.tw/img/western-union.svg" alt="..." class="w-2rem"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer end-->
    <div id="scrollTop"><i class="fa fa-long-arrow-alt-up"></i></div>
    <!-- JavaScript files-->
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to Bootstrapious website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://demo.bootstrapious.com/sell/1-2-0/icons/orion-svg-sprite.svg'); 
      
    </script>
    <!-- jQuery-->
    <script src="https://www.libero.com.tw/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap JavaScript Bundle (Popper.js included)-->
    <script src="https://www.libero.com.tw/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Owl Carousel-->
    <script src="https://www.libero.com.tw/vendor/owl.carousel/owl.carousel.js"></script>
    <script src="https://www.libero.com.tw/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <!-- NoUI Slider (price slider)-->
    <script src="https://www.libero.com.tw/vendor/nouislider/nouislider.min.js"></script>
    <!-- Smooth scrolling-->
    <script src="https://www.libero.com.tw/vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
    <!-- Lightbox -->
    <script src="https://www.libero.com.tw/vendor/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
    <script src="https://www.libero.com.tw/vendor/object-fit-images/ofi.min.js"></script>
    <script>
      var basePath = ''
      
    </script>
    <script src="https://www.libero.com.tw/js/theme.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>