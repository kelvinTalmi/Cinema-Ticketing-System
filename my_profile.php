

<?php

session_start();
include('includes/config.php');




if(!isset($_SESSION['login'])){
   
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
header('location:login.php');
}

if(isset($_POST['pay'])){
	$id=$_POST['id'];
$wallet=$_POST['wallet'];
$total_paid=$_POST['total_paid'];

if($wallet<$total_paid){
	echo "<script>
	alert('Insufficient funds,Kindly fill your wallet')

	</script>";
}
else{

$newtotal=$wallet-$total_paid;

	$email=$_SESSION['login'];
	mysqli_query($con, "UPDATE users SET wallet=$newtotal  WHERE email='$email'");




  mysqli_query($con,"UPDATE bookings set  status=1 where id = $id ");


  echo "<script>
	alert('Booking Made Successfully');

	</script>";

}
}
if(isset($_POST['cancel'])){

$id=$_POST['id'];



  mysqli_query($con,"UPDATE bookings set  status=2 where id = $id ");


  echo "<script>
	alert('Booking Canceled Successfully');

	</script>";

}


if(isset($_POST['cancelpaid'])){
$wallet=$_POST['wallet'];
$total_paid=$_POST['total_paid'];
$deduct=(0.9 * $total_paid);
$new_total=$deduct+$wallet;
$id=$_POST['id'];
$email=$_SESSION['login'];

mysqli_query($con, "UPDATE users SET wallet=$new_total WHERE email='$email'");



  mysqli_query($con,"UPDATE bookings set  status=2 where id = $id ");


  echo "<script>
	alert('Booking Canceled Successfully.10% of has been reclaimed as damage fee.The rest has been refunded to your wallet');

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



                    <div class="container">

<br>
                      


<?php




$id=$_SESSION['login'];


$query=mysqli_query($con,"select * from users  where email='$id' ORDER BY id desc ");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>




<?php
} else {
while($row=mysqli_fetch_array($query))
{
?>

<div style="float:none;margin:auto;" class="col col-md-4">
<div class="card">

<center><div class="card-header md-4" ><h6> My Profile</h6> </div></center>
<div class="card-body">


<p> <b> Name:</b><?php echo $row['name'] ?> </p>
<p>  <b>Phone number:</b><?php echo $row['phone_number'] ?> </p>
<p>  <b>Email:</b><?php echo $row['email'] ?> </p>
<p>  <b>Wallet Balance:</b><?php echo $row['wallet'] ?> </p>

<center><a  class="btn btn-danger" href="wallet.php"> Deposit</a>
<a  class="btn btn-success" href="update_profile.php"> Update Profile</a></center>

</div>

</div>
</div>
<br><br>




 </div>
</div>


<?php } }?>


                                    </div>
                           
</body>


<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
