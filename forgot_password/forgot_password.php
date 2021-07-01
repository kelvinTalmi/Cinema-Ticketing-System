 <?php 
    if (isset($_POST['email'])) {
      // (B1) CONNECT TO DATABASE
    include('includes/config.php');
      // (B2) CHECK IF VALID USER
      $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `email`=?");
      $stmt->execute([$_POST['email']]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      $result = is_array($user)
              ? "" 
              : $_POST['email'] . " is not registered with us." ;

      // (B3) CHECK PREVIOUS REQUEST (PREVENT SPAM)
      if ($result == "") {
        $stmt = $pdo->prepare("SELECT * FROM `password_reset` WHERE `id`=?");
        $stmt->execute([$user['id']]);
        $request = $stmt->fetch(PDO::FETCH_ASSOC);
        $now = strtotime("now");
        if (is_array($request)) {
          $expire = strtotime($request['reset_time']) + $prvalid;
          if ($now < $expire) { $result = "Please try again later"; }
        }
      }

      // (B4) CHECKS OK - CREATE NEW RESET REQUEST
      if ($result == "") {
        // RANDOM HASH
        $hash = md5($user['email'] . $now);
        
        // DATABASE ENTRY
        $stmt = $pdo->prepare("REPLACE INTO `password_reset` VALUES (?,?,?)");
        $stmt->execute([$user['id'], $hash, date("Y-m-d H:i:s")]);
        
        // SEND EMAIL
        $headers = 'From:Shop With Talmi<reset@marsentertainment.com>'."\r\n";
        $subject = "Password reset";
        $link = "http://mars.talmischool.com/forgot_password/reset_password.php?i=".$user['id']."&h=".$hash;
        $message = "click the link provided to reset your shop with talmi password (The link expires after 10 minutes) :" .$link;
        
        
        
        if (!@mail($user['email'], $subject, $message, $headers)) {
          $result = "Failed to send email!";
        }
      }
      
      // (B5) RESULTS
      if ($result=="") { $result = "Email has been sent - Please click on the link in the email to confirm."; }
     
    }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Shop with Talmi-Get what you want at your budget">
    <meta name="author" content="Shop With Talmi">
     <meta name="keywords" content="shopwithtalmi, talmishop, shop with talmi,budget shopping">


        <!-- App title -->
        <title>Shop With Talmi</title>

        <!-- App css -->
        <link href="../user/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="../user/assets/js/modernizr.min.js"></script>
<style>
h4 {
  color: #ffffff !important;
  font-size: 24px;

  font-family: 'Hind Madurai', sans-serif;
  font-weight: 600;

}
</style>
    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div   class="wrapper-page">

                            <div  class="m-t-40 account-pages">
                                <div style="background-color:#000080; !important" class="text-center account-logo-box">
                                   
                                        <a  href="../index.php" class="text-success">
										 <div style="background-color:#000080; !important"  class="container">
                                            <h4   style="color:white;font-family:sans-serif; !important">Shop With Talmi</h6>
											</div>
                                        </a>
                                 <span style="color:white;font-size:19px;font-weight: 600;"> Forgot Password</span>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
								
                                <div class="account-content">
								<center style="color:red"><?php  echo $result; ?></center>
                                    <form class="form-horizontal" method="post" >

                                        <div class="form-group ">
                                            <div class="col-xs-12">
											<h5>Email</h5>
                                               <input class="form-control" type="email" name="email" required placeholder="abc@gmail.com" autocomplete="off">
                                            </div>
                                        </div>

                                        


                     
                                        <center>
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" >Submit</button>
                                          
</center>
                                    </form>
									<br>
<center><a href="../user/index.php">Log In</a> &nbsp; &nbsp; &nbsp;  <a href="../tae.php"> Register</a></center>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                    

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>