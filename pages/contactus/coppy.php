<?php
  use PHPMailerPHPMailerPHPMailer;
  use PHPMailerPHPMailerException;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
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
      $mail->setFrom($mail.'@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('wijekoondistributor@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>Name : $username <br>Email : $email <br> Phone : $phone <br>Message : $message</h3>";

      $mail->send();
      $msg = "<div class='alert alert-info'>Message has been sent</div>";
    } catch (Exception $e) {
        $msg = "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
  }

?>


<!--my creation-->
<?php
$msg = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

   if(isset($_POST['submit'])){
      //require 'PHPMailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;

   $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'wijekoondistributor@gmail.com';                    
    $mail->Password   = 'kqxgwfkumbnuifpi';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;  

    $mail->setFrom($_POST['email'], 'Web site Contact Form');
    $mail->addAddress('wijekoondistributor@gmail.com', );

    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $subject = "Web site Contact Form"; 
    $message = "Name: {$username} "."<br>"." Email: {$email}"."<br>"." Phone: {$phone} "."<br>"." Message: " . $message;

    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()){
      $msg = "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
    else{
      $msg = "<div class='alert alert-info'>Message has been sent</div>";
    }

   }
?>
