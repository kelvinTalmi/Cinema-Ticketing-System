<?php
 session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if(isset($_POST['login']))
  {
 
    // Getting username/ email and password
     $email=$_POST['email'];
    $password=md5($_POST['password']);
    // Fetch data from database on the basis of username/email and password
$sql =mysqli_query($con,"SELECT email,password FROM users WHERE (email='$email')");
 $num=mysqli_fetch_array($sql);
if($num>0)
{
$hashpassword=$num['password']; // Hashed password fething from database
//verifying Password
if ($password==$hashpassword) {
$_SESSION['login']=$_POST['email'];
    echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
  } else {
echo "<script>alert('Wrong Password or email');</script>";
 
  }
}
//if username or email not found in database
else{
echo "<script>alert('Email not registered with us');</script>";
  }
 
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
        <title>Mars Entertainment</title>

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

<?php include('includes/header.php');?>
    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div  " class="wrapper-page">

                            <div  class="m-t-40 account-pages">
                                <div style="background-color:#000080; !important" class="text-center account-logo-box">
                                   
                                        <a  href="../index.php" class="text-success">
										 <div style="background-color:#000080; !important"  class="container">
                                            
											</div>
                                        </a>
                                 <span style="color:white;font-size:19px;font-weight: 600;"> Log In </span>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
								
                                <div class="account-content">
								
                                    <form class="form-horizontal" method="post" >
									<center>
<?php 
  $result = "";
  if (isset($_GET['i']) && isset($_GET['h'])) {
    // (A) CONNECT TO DATABASE
    require "2a-common.php";
    
    // (B) CHECK IF VALID REQUEST
    $stmt = $pdo->prepare("SELECT * FROM `password_reset` WHERE `id`=?");
    $stmt->execute([$_GET['i']]);
    $request = $stmt->fetch(PDO::FETCH_ASSOC);
    if (is_array($request)) {
      if ($request['reset_hash'] != $_GET['h']) { $result = "Invalid request"; }
    } else { $result = "Invalid request"; }

    // (C) CHECK EXPIRED
    if ($result=="") {
      $now = strtotime("now");
      $expire = strtotime($request['reset_time']) + $prvalid;
      if ($now >= $expire) { $result = "Request expired"; }
    }

    // (D) PROCEED PASSWORD RESET
    if ($result=="") {
      // RANDOM PASSWORD
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $password = substr(str_shuffle($chars),0 ,6); // 8 characters
      
      // UPDATE DATABASE
      $stmt = $pdo->prepare("UPDATE `users` SET `password`=? WHERE `id`=?");
      $stmt->execute([md5($password), $_GET['i']]);
      $stmt = $pdo->prepare("DELETE FROM `password_reset` WHERE `id`=?");
      $stmt->execute([$_GET['i']]);
      
      // SHOW RESULTS (UPDATED PASSWORD)
      $result = "Password has been updated to <span style='color:red'>$password </span>Please login and change it.";
    }
  }

  // (E) INVALID REQUEST
  else { $result = "Invalid request"; }
  
  // (F) OUTPUT RESULTS
  echo "<div>$result</div>";
  ?></center>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
											<h5>Email</h5>
                                                <input class="form-control" type="text" required="" name="email" placeholder="email" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
											<h5>Password</h5>
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                            </div>
                                        </div>


                     
                                        <center>
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Log In</button>
                                          
</center>
                                    </form>
									<br>
<center><a href="../forgot_password/forgot_password.php">Forgot Password?</a> &nbsp; &nbsp; &nbsp;  <a href="../tae.php"> Register</a></center>
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