

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

$title=$_GET['title'];

$id=$_GET['id'];
 header('location: '.$_SESSION['rdrurl']);





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
            <div class="container">
                <div style="float:none;margin:auto" class="col-md-4"><br>
                    <div class="card">
                        <center><div class="card-header"><b>Log In</b></div></center>
                        <form method="post">
                        <div class="card-body">
                            <center><span style="color:purple;font-weight:bold;">Account created Successfully.</span></center>
                                      
                            <label>Email</label>
                            <input type="email" class="form-control" name="email"><br>
                            
                             <label>Password</label>
                            <input type="password" class="form-control" name="password"><br>
                            
                         <center>   <button class="btn btn-primary" name="login">Log In</button></center>
                            
                            
                            </form><br>
                            
                            
                           <center> <a href="forgot_password.php">Forgot Password?</a>&nbsp;&nbsp;&nbsp; <a href="register.php">Sign Up</a></center>
                            
                            
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