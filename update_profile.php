

<?php

session_start();
include('includes/config.php');


if(!isset($_SESSION['login'])){
    
    
    
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
header('location:login.php');
}




if(isset($_POST['submit']))
{
  $id=$_SESSION['login'];
 $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];

      $query = "UPDATE users SET name = '$name',
                      phone_number = '$phone_number'
                      WHERE email = '$id'";

                    $result = mysqli_query($con, $query);


                    ?>

 <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "update_profile.php";
        </script>
<?php }?>


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

<br>
                  


                                  <?php

                                  $id=$_SESSION['login'];
                                  $query=mysqli_query($con,"SELECT * FROM users where email='$id'");
                                  $row=mysqli_fetch_array($query);
                                    ?>
<div style="float:none;margin:auto;" class="col col-md-4">
<div class="card">

<center><div class="card-header md-4" ><h6> Update Profile</h6> </div></center>
<div class="card-body">
<form method="post" action="">
  <label style="font-weight:bold;" >Name</label>

  <input  type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" >

  <label style="font-weight:bold;">Phone No</label>

  <input  type="text" class="form-control" value="<?php echo $row['phone_number']; ?>" name="phone_number" >

  <label style="font-weight:bold;">Email</label>

  <input  type="text" disabled  class="form-control" value="<?php echo $row['email']; ?>" name="email" >
<br>
<center>  <button type="submit" class="btn btn-success" name="submit">
                                                      Submit
                                                  </button></center>



</form>

<center><a href="change_password.php">Change Password</a></center>

</div>

</div>
</div>
<br><br>

 </div>


















































</body>



<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
