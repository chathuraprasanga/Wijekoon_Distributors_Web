
<?php

$msg = "";

include '../../config/config.php';

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, md5($_POST['password']));
            $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));

            if ($password === $confirm_password) {
                $query = mysqli_query($conn, "UPDATE users SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: ../signin/index.php");
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
} else {
    header("Location:../forgotpassword/forgotpassword.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Change Password</title>
   <link rel="stylesheet" href="../../main-css/login/login-style.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../../resources/images/logo1.png">
   <link rel="stylesheet" href="../../main-css/main/mainstyle.css">

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
                        <h2>Change Password</h2>
                        <p>Type your new password and confirm it</p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Change Password</button>
                        </form>
                        <div class="social-icons">
                            <p>Back to! <a href="http://localhost/pages/signin/index.php">Login</a>.</p>
                        </div>
                    </div>
                
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

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
   
   <!--Footer start-->

   <?php include '../../includes/footer.php'; ?>
   
   <!--Footer end-->

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   <script src="../../script/script.js"></script>

</body>
</html>