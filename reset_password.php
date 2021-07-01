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
    echo "<script type='text/javascript'> document.location = 'change_password.php'; </script>";
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

<div class="container">
    <div class="col-md-4" style="margin:auto;float:none"><br>
    <div class="card">
       <center> <div class="card-header"><b>Reset Password</b></div></center>
                                   <form  method="post"  class="form-group " >
                                       <div class="card-body">

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
                         





											<label>Email</label>
                                                <input class="form-control" type="text" required="" name="email" placeholder="email" autocomplete="off">
                                          

                                     
											<label>Password</label>
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                            
<br>


                                        <center>
                                                <button class="btn btn-danger"  name="login">Log In</button>

</center>
                                    </form>
                           </div>
                           </div>
                                   </div>
                                   </div>
                                   </div><br>
















</body>





<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
	