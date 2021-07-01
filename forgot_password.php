<?php 
// (B1) CONNECT TO DATABASE
  require "2a-common.php";
  
  $result="";
    if (isset($_POST['email'])) {
      
    

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
        $headers = 'From:marsentertainment<reset@marsentertainment.com>'."\r\n";
        $subject = "Password reset";
        $link = "http://mars.talmischool.com/reset_password.php?i=".$user['id']."&h=".$hash;
        $message = "click the link provided to reset your shop with talmi password (The link expires after 10 minutes) :" .$link;
        
        
        
        if (!@mail($user['email'], $subject, $message, $headers)) {
          $result = "Failed to send email!";
        }
      }
      
      // (B5) RESULTS
      if ($result=="") { $result = "Email has been sent - Please click on the link in the email to confirm."; }
     
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
           
                        <div  style="float:none;margin:auto;" class="form-group col-md-4" >

                          <br>
								<div class="card">
								    <center><div class="card-header"><b>Forgot Password</b></div></center>
                               
								<center style="color:red"><?php 


								echo $result ?></center>
								<div class="card-body">
                                    <form  method="post" >

                                       
											<label>Email</label>
                                               <input class="form-control" type="email" name="email" required placeholder="abc@gmail.com" ><br>
                                           
                                        <center>
                                                <button class="btn btn-danger " type="submit" >Submit</button>
                                          
</center>
                                    </form>
									
<center><a href="login.php">Log In</a> &nbsp; &nbsp; &nbsp;  <a href="register.php"> Register</a></center>
                                    
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

	