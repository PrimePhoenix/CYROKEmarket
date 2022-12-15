<?php session_start();
  require("database/include/connection.php");
$sessID="";
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

if(!isset($_SESSION['deliverylocation']))
{
    echo "<script> window.location='storehome.php?id=".$sessID."'</script>";
}
}
else 
{  
  echo "<script>window.history.back();</script>";
  // echo "<script>alert('You are not logged in')</script>";
 // echo "<script>window.location='signin.html'</script>";

}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CYROK E-Market Checkout</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Price Slider Stylesheets -->
    <link rel="stylesheet" href="https://www.libero.com.tw/vendor/nouislider/nouislider.css">
    <!-- Google fonts - Playfair Display-->
    <link rel="stylesheet" href="https://www.libero.com.tw/https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700">
    <link rel="stylesheet" href="https://www.libero.com.tw/fonts/hkgrotesk/stylesheet.css">
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
  <body>

    <!-- Hero Section-->
    <section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><?php echo '<a href="pages/storehome.php?id='.$sessID.'">'?>Home</a></li>
          <li class="breadcrumb-item active">CHECKOUT COMPLETE        </li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">Checkout Complete</h1>
        </div>
      </div>
    </section>
    <section class="pb-5">
      <div class="container text-center">
        <div class="icon-rounded bg-primary mb-3 mx-auto text-white">
          <svg class="svg-icon w-2rem h-2rem align-middle">
            <use xlink:href="#checkmark-1"> </use>
          </svg>
        </div>
        <h4 class="mb-3 ff-base">Thank you, <?php echo $_SESSION['$sessID']?> for your purchase.</h4>
        <p class="text-muted mb-5">You will be sent an email as soon as your order is delivered</p>
        <p> <?php echo '<a href="pages/cashout.php?SN='.$store.'&id='.$sessID.'" class="btn btn-outline-dark">'?>Return to Stores </a></p>
      </div>
      <div id="Store" style="display:none"><?php echo $store?></div>
      <div id="user" style="display:none"><?php echo $_SESSION['$sessID']?></div>
    </section>
    <!-- Footer-->
    <footer class="main-footer">
      
      <!-- Main block - menus, subscribe form-->
 
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