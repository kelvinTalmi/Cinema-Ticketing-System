

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
    echo "<script type='text/javascript'> document.location = 'update_profile.php'; </script>";
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

<! DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">
  <meta name="description" content="Mars Entertainment Ticketing System">
  <meta name="keywords" content="Mars,Entertainment,movies,shows,ticketing">
  <meta name="author" content="Stanley">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	
	
	
	
	

</head>

<body>




<?php include('includes/header.php');?>



<section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div   class="wrapper-page">

                            <div  class="m-t-40 account-pages">
                                <div   class="text-center account-logo-box">
                                   
                                       <br>
                                 <div style="color:green;font-size:19px;font-weight: 600;"> Log In </div>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
								
                                <div class="account-content">
								
                                    <form  method="post" style="float:none;margin:auto;" class="form-group col-md-3" >

                                        <div class="form-group ">
                                            <div class="col-xs-12">
											<h6>Email</h6>
                                                <input class="form-control" type="text" required="" name="email" placeholder="email" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
											<h6>Password</h6>
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                            </div>
                                        </div>


                     
                                        <center>
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Log In</button>
                                          
</center>
                                    </form>
									<br>
<center><a href="forgot_password.php">Forgot Password?</a> &nbsp; &nbsp; &nbsp;  <a href="register.php"> Register</a></center>
                                    <div class="clearfix"></div>

                                </div>
                            </div><br>
                            <!-- end card-box-->


                    

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>






















</body>



<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
	