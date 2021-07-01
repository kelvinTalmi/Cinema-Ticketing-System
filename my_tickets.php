

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
$deduct2=(0.1 * $total_paid);
$new_total=$deduct+$wallet;
$id=$_POST['id'];
$show_title=$_POST['show_title'];
$email=$_SESSION['login'];

mysqli_query($con, "UPDATE users SET wallet=$new_total WHERE email='$email'");

  mysqli_query($con,"UPDATE bookings set  status=2 where id = $id ");

mysqli_query($con, "INSERT INTO  cancelled_shows(show_title,user_email,penalty_fee)VALUES('$show_title','$email','$deduct2')");

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


<center><p style="font-size:20px;font-weight:bold;color:green;">My Tickets</p></center>


<?php


$id=$_SESSION['login'];


$query=mysqli_query($con,"select * from bookings  where email='$id' ORDER BY id desc ");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>



<tr>

<center><td colspan="4" align="center"><h6 style="color:red">No record found</h6></td></center>
<tr>
</table>
<?php
} else {
while($row=mysqli_fetch_array($query))
{
?>

<input hidden name="total_paid" value="<?php echo $row['total_paid'];?>">


<div style="float:none;margin:auto;" class="col-md-4">
 <div style="font-size:14px;" class="card mb-4" >
 <center><div class="card-header "><b>Ticket Number:</b><?php echo $row['id'];?>  </div> </center>
  <div class="card-body"><p><b>Show:</b><?php echo $row['shows'];?>  </p>
   <p><b>Seat type:</b><?php echo $row['seat_type'];?>  </p>
    <p><b>No of seats :</b><?php echo $row['no_of_seats'];?>  </p>
	<p><b>Snacks/drinks :</b><?php echo $row['snacks_drinks'];?>  </p>
	<p><b>Total  : </b>ksh<?php echo $row['total_paid'];?>  </p>
	<p><b>Status :</b><?php

if($row['status']==0){
echo "pending";
}
elseif($row['status']==1){
	echo "paid";
}

	elseif($row['status']==2){
	echo "canceled";
}

	else{
		echo "used";
	}

	?>

	  </p>




<form method="post">

<input hidden name="total_paid"  value="<?php echo $row['total_paid']?>" >
<input hidden name="show_title"  value="<?php echo $row['shows']?>" >

<input hidden name="id"     value="<?php echo $row['id'];?>"  >
<?php
$email=$_SESSION['login'];
$usersinfo=mysqli_query($con ,"SELECT * FROM users WHERE email='$email'");
while ($details=mysqli_fetch_array($usersinfo)){
?>

<input hidden name="wallet" value= "<?php echo $details['wallet'] ?>" >

<?php }?>


<center><button class='btn btn-success' name="pay" <?php if ($row['status']!=0){ echo 'style=display:none;"'; } ?> >Pay Now </button>


	<button  name="cancel"   <?php if ($row['status']!=0){ echo 'style="display:none;"'; } ?> class="btn btn-danger">Cancel </button>

	<button name="cancelpaid"   <?php if ($row['status']!=1){ echo 'style="display:none;"'; } ?> class="btn btn-danger">Cancel </button>


	</form>


</center>




 </div>
</div>
</div>
</div>

<?php } }?>


                                    </div>
                                </div>















































</body>





<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script></html>
