

<?php

session_start();
include('includes/config.php');




if(!isset($_SESSION['login'])){
    
    
    
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
header('location:login.php');
}


if(isset($_POST['submit']))
{
//Current Password hashing 

$adminid=$_SESSION['login'];
// new password hashing 
$newpassword=$_POST['newpassword'];
$newhashedpass=md5($newpassword);







 $con=mysqli_query($con,"update users set password='$newhashedpass' where email='$adminid'");
echo "<script>alert('Password Changed Successfully');

window.location='logout2.php';

</script>";
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


<div >
             
                    <div class="container">

<br>
                        



                                  <?php

                                  $id=$_SESSION['login'];
                                  $query=mysqli_query($con,"SELECT * FROM users where email='$id'");
                                  $row=mysqli_fetch_array($query);
                                    ?>
<div style="float:none;margin:auto;" class="col col-md-4">
<div class="card">

<center><div class="card-header md-4" ><h6> Change Passsword</h6> </div></center>
<div class="card-body">
<form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">
  

<input hidden type="text" class="form-control" value="mP5NjCDZxB266gsjqj6w721" name="password" >
  <label style="font-weight:bold;">New Password</label>

  <input type="password" class="form-control" value="" name="newpassword" required>

  <label style="font-weight:bold;">Confirm Password</label>

  <input type="password" class="form-control" value="" name="confirmpassword" required>
<br>
<center>  <button type="submit" class="btn btn-success" name="submit">
                                                      Submit
                                                  </button></center>



</form>



</div>

</div>
</div>
<br><br>


</body>


<?php include("includes/footer.php") ?>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<script src="assets/js/scripts.js"></script>

</html>