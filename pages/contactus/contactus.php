<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

  // Include autoload.php file
  
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $msg = '';

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'wijekoondistributor@gmail.com';
      // Gmail Password
      $mail->Password = 'kqxgwfkumbnuifpi';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('wijekoondistributor@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('wijekoondistributor@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Contact Form Submission';
      $mail->Body = "<h3>Name : $username <br>Email : $email <br> Phone : $phone <br>Message : $message</h3>";

      $mail->send();
      $msg = "<div class='alert alert-info'>Message has been sent</div>";
    } catch (Exception $e) {
        $msg = "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>
   <link rel="stylesheet" href="../../main-css/main/mainstyle.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../../resources/images/logo1.png">
   <link rel="stylesheet" href="contactus-style.css">
   <script src="https://liy.fontawesome.com/6458efce2.js" crossorigin="anonymous">
   </script>

</head>
<body>

   <!--Header start-->

   <?php include '../../includes/header.php'; ?>

   <!--Header end-->

    <!--form section starts-->

   <section class="contact-form">
      <div class="container">
          <!-- /form -->
          <div class="contact-form-grid">
              
            <div class="contact-form-main">
               
               <div class="contact-form-w align-self">
                   <div class="contact-form-left">
                     <h3 class="title">Let's get in touch</h3>
                     <p class="text">
                     If you have any inquiry or question, don’t hesitate to contact us. 
                     There are many ways to contact us. When you come 
                     our location about 150m away from the Mawathagama to Kandy side.
                     </p>

                     <div class="info">
                        <div class="information">
                          <img src="../../resources/images/location.png" class="icon" alt="" />
                          <p>BOI Junction, Mawathagama, Kurunegala. 60060</p>
                        </div>
                        <div class="information">
                          <img src="../../resources/images/email.png" class="icon" alt="" />
                          <p>wijekoondistributor@gmail.com</p>
                        </div>
                        <div class="information">
                          <img src="../../resources/images/phone.png" class="icon" alt="" />
                          <p>077-636-9341</p>
                        </div>
                      </div>

                   </div>
               </div>
                  <div class="contact-form-right">
                      <h2>Contact us</h2>
                      <?php echo $msg; ?>
                      <form action="" method="post" onsubmit="return ValidateNo();">
                          <input type="username" class="username" name="username" placeholder="Enter Your username" required autocomplete="off" >
                          <input type="text" id="email" class="email" name="email" placeholder="Enter Your email" required autocomplete="off" style="text-transform : none;">
                          <input type="text" onkeypress="return isNumber(event)"   id="phone" onekeydown="phoneNumberFormatter()" class="phone" name="phone" placeholder="Enter Your phone number"  required autocomplete="off">
                          <input type="text" name="message" class="message" name="message" placeholder="Enter Your message" style="margin-bottom: 2px; min-height: 120px;" required autocomplete="off">
                          <button name="submit" class="btn"  type="submit" >Submit</button>
                      </form>
                      
                  </div>
              </div>
          </div>
          <!-- //form -->
      </div>
  </section>

    <!--form section ends-->

    <script src="app.js"></script> <!--javascript-->

   <!--Footer start-->

   <?php include '../../includes/footer.php'; ?>
   
   <!--Footer end-->

   <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   <script src="../../script/script.js"></script>
   <script src="../../script/app.js"></script>
   <?php include '../../includes/validate.php' ?>
   

</body>
</html>