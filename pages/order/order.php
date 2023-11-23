<?php
   $status ="";
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
       
       
    }

    include '../../config/config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        $status = "<h3>Welcome " . $row['name'] . " <a class='logout' href='logout.php'>Logout</a>";
    }

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
         $useracname = $row['name'];
         $useremail = $row['email'];
         $userphone = $row['phone'];
         $hardwarename = $_POST['hardwarename'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $superlime15 = $_POST['superlime15'];
         $superlime20 = $_POST['superlime20'];
         $skimcoat = $_POST['skimcoat'];
         $tilemaster = $_POST['tilemaster'];
         $dollamite = $_POST['dollamite'];

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
            $mail->Subject = 'NEW ORDER';
            $mail->Body = "<h2>User Account Details</h2><br><h3>User Account Name : $useracname <br>User Acount email : $useremail <br>User Account Phone : $userphone <br><h2>Order Details</h2><br>Hardware Name : $hardwarename <br>Phone number : $phone <br> Address : $address <br>Order Amounts <br></h3> <h4>Keshara Super Lime 15kg : $superlime15<br>Keshara Super Lime 20kg : $superlime20 <br>Keshara Skim Coat 20kg : $skimcoat<br>Keshara Tile Master 25kg : $tilemaster<br>Keshara Dollamite f. 25kg : $dollamite<br></h4> <h3>Please Contact the Hardware and Confirm the order Before the Dispute.</h3>";

            $mail->send();
            $msg = "<div class='alert alert-info'>Order Has been Placed.</div>";
         } catch (Exception $e) {
            $msg = "<div class='alert alert-danger'>Something Went Wrong. Mailer Error: {$mail->ErrorInfo}</div>";
         }
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order</title>
   <link rel="stylesheet" href="../../main-css/main/mainstyle.css">
   <link rel="stylesheet" href="order-style.css">
   
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../../resources/images/logo1.png">

</head>
<body>

   <!--Header start-->

   <?php include '../../includes/header.php'; ?>

   <!--Header end-->

   <!--form section starts-->

   <section class="order-form">
    <div class="container">
        <!-- /form -->
        <div class="order-form-grid">
            
          <div class="order-form-main">
             
             <div class="order-form-application">
                 <div class="order-form-left">
                  <?php echo $status;?>
                  
                   <h3 class="title"><br>When you are Make an order</h3>
                   <p class="text"><i>
                   Please Fill the fields correctly. After the submission 
                   we will call you for the confirmation, so please give working 
                   phone number. Currently we only distribute to the hardware 
                   stores only, so you don’t hardware owner please find 
                   the nearest hardware store and contact us.</i>
                   </p>

                   <p>wijekoondistributor@gmail.com</p>
                   <p>Tel : 077-41-39-758 </p>
                   <p>Tel : 077-30-23-238 </p>
                   <p>Tel : 077-63-69-341 </p>


                   <div class="info">
                      <div class="information">
                        
                        <p>Keshara Super lime 15kg – Rs.475.00/=</p>
                      </div>
                      <div class="information">
                        
                        <p>Keshara Super lime 20kg – Rs.575.00/=</p>
                      </div>
                      <div class="information">
                        
                        <p>Keshara Skim Coat 20kg – Rs.1150.00/=</p>
                      </div>
                      <div class="information">
                        
                        <p>Keshara Tile master 25kg – Rs.1500.00/= </p>
                      </div>
                      <div class="information">
                    
                        <p>Keshara dolomite f. 25kg – Rs.375.00/= </p>
                      </div>
                      <div class="information">
                        
                      </div>
                    </div>

                 </div>
             </div>
                <div class="order-form-right">
                    <h2>order</h2>
                    <?php echo $msg; ?>
                    <form action="" method="post" onsubmit="return doValidate();">
                        <input type="hardwarename" class="username" name="hardwarename" placeholder="Enter Hardware name" required>
                        <input type="phone" onkeypress="return isNumber(event)" id="phone" class="phone" name="phone" placeholder="Enter Hardware phone number" required>
                        <div class="selection-area">
                           <h2>select amounts of products</h2>
                           <div class="line">
                           <div class="left"><h3>keshara super lime 15kg</h3></div>
                           <div class="right"><input type="number" class="amount" name="superlime15" placeholder="amount" min="0"></div>
                           </div>
                           <div class="line">
                           <div class="left"><h3>keshara super lime 20kg</h3></div>
                           <div class="right"><input type="number" class="amount" name="superlime20" placeholder="amount" min="0"></div>
                           </div>
                           <div class="line">
                           <div class="left"><h3>keshara skim coat 20kg</h3></div>
                           <div class="right"><input type="number" class="amount" name="skimcoat" placeholder="amount" min="0"></div>
                           </div>
                           <div class="line">
                           <div class="left"><h3>keshara tile master 25kg</h3></div>
                           <div class="right"><input type="number" class="amount" name="tilemaster" placeholder="amount" min="0"></div>
                           </div>
                           <div class="line">
                           <div class="left"><h3>keshara dollamite f. 25kg</h3></div>
                           <div class="right"><input type="number" class="amount" name="dollamite" placeholder="amount" min="0"></div>
                           </div>
                        </div>
                        <br>
                        <input type="address" name="address" class="address" name="address" placeholder="Enter Hardware address" style="margin-bottom: 2px; min-height: 120px;" required autocomplete="off">
                        <button name="submit" name="submit" class="btn" type="submit">Send</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- //form -->
    </div>
    </section>

    <!--form section ends-->

    <script src="app.js"></script>
   
   <!--Footer start-->

   <?php include '../../includes/footer.php'; ?>
   
   <!--Footer end-->

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   <script src="../../script/script.js"></script>
   <?php include '../../includes/validate.php' ?>
</body>
</html>