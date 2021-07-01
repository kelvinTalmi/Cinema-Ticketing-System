
<?php
include('includes/config.php');
 include('process.php');
 
if(!isset($_SESSION['login'])){
    
    
    
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

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

 <script>
        function validate(){

            var a = document.getElementById("pass").value;
            var b = document.getElementById("confirm_pass").value;
            if (a!=b) {
               alert("Passwords do no match");
               return false;
            }
        }
     </script>


           
                                   <br>
                                <div class="col-md-4" style="margin:auto;float:none">
                                    <div class="card">
                                        <center><div class="card-header"><b>Sign Up</b></div></center>
                                        <div class="card-body">
                                    
								
                                    <form onSubmit="return validate()"  method="post" action="register.php">

                                       
											<label>Full Name</label>
                                                <input class="form-control" type="text" required="" name="name" placeholder ="E.g Lucy Kinyua" >
                                           
										
										
										
										
										
										
											<label>Phone Number</label>
                                             
											  <input class="form-control" id="number" maxlength="10" pattern="\d{10}" required="" name="phone_number" placeholder="E.g 0712345678" >
                                           
										
									
											<label>Email</label>
											
                                                <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >

		<input class="form-control" type="text" name="id" value="<?php echo $id; ?>" placeholder="E.g abc@gmail.com" required autocomplete="off">
		  <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
	</div>
												
												
                                           
										
										

                                      
											<label>Password</label>
                                                <input class="form-control" type="password" id="pass" name="pass" required placeholder="Password" autocomplete="off">
                                           

											<label>Confirm Password</label>
                                                <input class="form-control" type="password" id="confirm_pass" name="confirm_pass" required placeholder="Confirm password" autocomplete="off">
                                           
					 <br>
					 <center>


					 
                                        <center>
                                        <button class="btn btn-danger" type="submit" name="save">Register</button>
                                        <button class="btn btn-success" type="reset" >Discard</button>
                                                
												 
                                          
</center>
                                    </form>
									<br>
<center><a href="login.php">Log In </center>
                                    
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
	