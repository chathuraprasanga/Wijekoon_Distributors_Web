<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../../vendor/autoload.php';

    include '../../config/config.php';
    $msg = "";

   if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) >0){
        $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
    } else {

        if ($password === $confirm_password){
            $sql = "INSERT INTO users (name, email, phone, password, code) VALUES ('{$name}','{$email}','{$phone}','{$password}','{$code}')";
            $result = mysqli_query($conn, $sql);

            if ($result){
                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'wijekoondistributor@gmail.com';                     //SMTP username
                    $mail->Password   = 'kqxgwfkumbnuifpi';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('wijekoondistributor@gmail.com');
                    $mail->addAddress($email); 

                    

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'no reply';
                    $mail->Body    = 'Here is the Email verification link <b><a href="http://localhost/pages/signin/?verification='.$code.'">http://localhost/pages/signin/?verification='.$code.'</a></b>';
                   

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
            }else{
                $msg = "<div class='alert alert-danger'>Something went Wrong.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and conform Passweord do not match</div>";
        }
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign Up</title>
   <link rel="stylesheet" href="../../main-css/main/mainstyle.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="icon" type="../../resources/images/image/x-icon" href="../../resources/images/logo1.png">
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
          <div class="login-form-signup">
              
                  <div class="login-content">
                      <h2>Register Now</h2>
                      <p>If you dont have account create one, Please give the real Information.</p>
                      <?php echo $msg; ?>
                      <form action="" method="POST" onsubmit="return ValidateNo();">
                          <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])){echo $name;} ?>" required style="text-transform : none;">
                          <input type="text" id="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])){echo $email;} ?>" required style="text-transform : none;">
                          <input type="text" onkeypress="return isNumber(event)"  id="phone" onekeydown="phoneNumberFormatter()" class="phone" name="phone" placeholder="Enter Your phone number"  required autocomplete="off">
                          <input type="password" class="password" name="password" placeholder="Enter Your Password" required style="text-transform : none;" >
                          <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required style="text-transform : none;">
                          <button name="submit" class="btn" type="submit">Register</button>
                      </form>
                      <div class="social-icons">
                          <p>Have an account! <a href="http://localhost/pages/signin/index.php">Login</a>.</p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- //form -->
      </div>
  </section>

  <!-- //form section end -->

  <!--scrpt starts-->

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

    <!--scrpt ends-->

   <!--Footer start-->

   <?php include '../../includes/footer.php'; ?>
   
   <!--Footer end-->

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   <script src="../../script/script.js"></script>
   <?php include '../../includes/validate.php' ?>

</body>
</html>