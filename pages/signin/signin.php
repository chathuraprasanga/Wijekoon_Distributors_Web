
<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign In</title>
   <link rel="stylesheet" href="../../main-css/main/mainstyle.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../../resources/images/logo1.png">
   <link rel="stylesheet" href="../../main-css/login/login-style.css">
   <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>
<body>

   <!--Header start-->

   <section class="header">
      <div class="logo">
         <a href="../../index.php">wijekoon distributors</a>
      </div>
      <div class="navbar">
         <a href="../../index.php">home</a>
         <a href="../products/products.php">products</a>
         <a href="../aboutus/aboutus.php">about us</a>
         <a href="../contactus/contactus.php">contact us</a>
         <a href="../signin/Signin.php">order</a>
      </div>
      <div id="menu-btn" class="fas fa-bars"></div>
   </section>

   <!--Header end-->
  
   <!-- form section start -->

   <section class="w3l-mockup-form">
      <div class="container">
          <!-- /form -->
          <div class="workinghny-form-grid">
              
                  <div class="content-wthree">
                      <h2>Login Now</h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                      <!--<?php echo $msg; ?>-->
                      <form action="../../includes/login.inc.php" method="post">
                          <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                          <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                          <p><a href="../forgotpassword/forgotpassword.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                          <button name="submit" name="submit" class="btn" type="submit">Login</button>
                      </form>
                      <div class="social-icons">
                          <p>Create Account! <a href="../signup/signup.php">Register</a>.</p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- //form -->
      </div>
  </section>
  
  <!-- //form section end -->

    <!--script starts-->

  <script src="js/jquery.min.js"></script>
  <script>
      $(document).ready(function (c) {
          $('.alert-close').on('click', function (c) {
              $('.main-mockup').fadeOut('slow', function (c) {
                  $('.main-mockup').remove();
              });
          });
      });
  </script>

  <!--script ends-->

   <!--Footer start-->

   <section class="footer">
      <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="../../index.php"> <i class="fas fa-angle-right"></i> home</a>
            <a href="../products/products.php"> <i class="fas fa-angle-right"></i> products</a>
            <a href="../aboutus/aboutus.php"> <i class="fas fa-angle-right"></i> about us</a>
            <a href="../order/order.php"> <i class="fas fa-angle-right"></i> order</a>
         </div>
   
         <div class="box">
            <h3>extra links</h3>
            <a href="..\underconstruction\underconstruction.php"> <i class="fas fa-angle-right"></i> ask questions</a>
            <a href="..\contactus\contactus.php"> <i class="fas fa-angle-right"></i> contact us</a>
            <a href="..\privacypolicy\privacypolicy.php"> <i class="fas fa-angle-right"></i> privacy policy</a>
            <a href="..\termsandcondition\termsandcondition.php"> <i class="fas fa-angle-right"></i> terms of use</a>
         </div>
   
         <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> 077 636 9341 </a>
            <a href="#"> <i class="fas fa-phone"></i> 077 41 39 758 </a>
            <a href="#"> <i class="fas fa-envelope"></i> wijekoondistributor@gmail.com </a>
            <a href="#"> <i class="fas fa-map"></i> BOI junction, Mawathagama, kurunegala. 60060 </a>
         </div>
   
         <div class="box">
            <h3>follow us</h3>
            <a href="..\social\social.php"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="..\social\social.php"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="..\social\social.php"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="..\social\social.php"> <i class="fab fa-linkedin"></i> linkedin </a>
         </div>
   
      </div>
   
   </section>
   
   <!--Footer end-->

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   <script src="../../script/script.js"></script>

</body>
</html>