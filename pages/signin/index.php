<?php

    
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../order/order.php");
        die();
    }

    include '../../config/config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
            #header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                header("Location: ../order/order.php");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>

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

   <?php include '../../includes/header.php'; ?>

   <!--Header end-->
  
   <!-- form section start -->

   <section class="login-form">
      <div class="container">
          <!-- /form -->
          <div class="login-form-login">
              
                  <div class="login-content">
                      <h2>Login Now</h2>
                      <p>Please log in to your Account for the Order</p>
                      <?php echo $msg; ?>
                      <form action="" method="post" >
                          <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])){echo $email;} ?>" required style="text-transform : none;">
                          <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required style="text-transform : none;">
				
                          <p><a href="../forgotpassword/forgotpassword.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                          <button name="submit" name="submit" class="btn" type="submit">Login</button>
                      </form>
                      <div class="">
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

   <?php include '../../includes/footer.php'; ?>

   <!--Footer end-->

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   <script src="../../script/script.js"></script>
   

</body>
</html>