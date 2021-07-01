

<?php
session_start();

if(!isset($_SESSION['login'])){

    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
header('location:login.php');
}
include('includes/config.php');







$title=$_GET['title'];
$id=$_GET['id'];


if(isset($_POST['save'])){
	$title=$_GET['title'];
	$nameb=$_POST['nameb'];
	$emailb=$_POST['emailb'];
	$phone=$_POST['phone'];


	$balance=$_POST['balance'];

$type=$_POST['type'];
$number=$_POST['number'];
$snacks=$_POST['snacks'];
$total_paid=$_POST['total_paid'];
$status=0;

$type2=substr("$type",0,2);



//regular

	  $stmt=mysqli_query($con ,"SELECT * FROM seats WHERE seat='regular' ");
$row1=mysqli_fetch_array($stmt);

			$count=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'regular%'");
$rows3=mysqli_num_rows($count);
$regular= $row1['total_seats']-$rows3;

	//vip

	$stmtvi=mysqli_query($con ,"SELECT * FROM seats WHERE seat='vip'");
$rowvi=mysqli_fetch_array($stmtvi);

			$countvi=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'vip%'");
$rowsvii=mysqli_num_rows($count);
$vip=$rowvi['total_seats']-$rowsvii;

//vvip


$stmtvv=mysqli_query($con ,"SELECT * FROM seats WHERE seat='vvip'");
$rowvv=mysqli_fetch_array($stmtvv);

			$countvv=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'vvip%' ");
$rowsvv1=mysqli_num_rows($countvv);
	$vvip=$rowvv['total_seats']-$rowsvv1;



if ($type==""){
	echo "<script>alert('Select Seat Type') </script>";
}



if($type2=="vv" and $number>$vvip ){
   echo "<script>alert('Sorry! Only  $vvip  vvip seats remaining') </script>";

}


else if($type2=="vi" and $number>$vip ){
   echo "<script>alert('Sorry! Only  $vip  vvip seats remaining') </script>";

}


else if($type2=="re" and $number>$regular ){
   echo "<script>alert('Sorry! Only  $regular  vvip seats remaining') </script>";

}






else{



$result="INSERT INTO bookings(shows,name,email,phone_number,seat_type,no_of_seats,snacks_drinks,total_paid,status)VALUES('$title','$nameb','$emailb','$phone','$type','$number','$snacks','$total_paid','$status')";






	if(mysqli_query($con,$result)){
// $headers = 'From:marsentertainment<tickets@marsentertainment.com>'."\r\n";
// $headers .= "MIME-Version: 1.0\r\n";

// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//         $subject = "Ticket";

//         $message = '<html><body>';
// $message .= 'Your booking for the show <b>'.$title.' </b>has been successful.<p>Pay your ticket in the next one hour.</p>Visit mars.talmischool.com/my_tickets.php to view the status of your ticket and also download it. ';

// $message .= '</body></html>';

//         mail($emailb, $subject, $message, $headers);

	echo "<script>alert('Booking done successfully.Ensure you pay within the next one hour')
window.location.href='my_tickets.php';

  </script>";

	}

}

}




// pay
if(isset($_POST['pay'])){
	$title=$_GET['title'];
	$nameb=$_POST['nameb'];
	$emailb=$_POST['emailb'];
	$phone=$_POST['phone'];


	$balance=$_POST['balance'];

$type=$_POST['type'];
$number=$_POST['number'];
$snacks=$_POST['snacks'];
$total_paid=$_POST['total_paid'];
$status=1;

$type2=substr("$type",0,2);
//regular

	  $stmt=mysqli_query($con ,"SELECT * FROM seats WHERE seat='regular' ");
$row1=mysqli_fetch_array($stmt);

			$count=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'regular%'");
$rows3=mysqli_num_rows($count);
$regular= $row1['total_seats']-$rows3;

	//vip

	$stmtvi=mysqli_query($con ,"SELECT * FROM seats WHERE seat='vip'");
$rowvi=mysqli_fetch_array($stmtvi);

			$countvi=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'vip%'");
$rowsvii=mysqli_num_rows($count);
$vip=$rowvi['total_seats']-$rowsvii;

//vvip


$stmtvv=mysqli_query($con ,"SELECT * FROM seats WHERE seat='vvip'");
$rowvv=mysqli_fetch_array($stmtvv);

			$countvv=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'vvip%' ");
$rowsvv1=mysqli_num_rows($countvv);
	$vvip=$rowvv['total_seats']-$rowsvv1;




if($type2=="vv" and $number>$vvip ){
   echo "<script>alert('Sorry! Only  $vvip  vvip seats remaining') </script>";

}


else if($type2=="vi" and $number>$vip ){
   echo "<script>alert('Sorry! Only  $vip  vvip seats remaining') </script>";

}


else if($type2=="re" and $number>$regular ){
   echo "<script>alert('Sorry! Only  $regular  vvip seats remaining') </script>";

}
else{

if($balance<$total_paid){
	echo "<script>
	alert('Insufficient funds,Kindly fill your wallet')

	</script>";
}

else{
$result="INSERT INTO bookings(shows,name,email,phone_number,seat_type,no_of_seats,snacks_drinks,total_paid,status)VALUES('$title','$nameb','$emailb','$phone','$type','$number','$snacks','$total_paid','$status')";

if(mysqli_query($con,$result)){


	$newtotal=$balance-$total_paid;


	$sql = "UPDATE users SET wallet=$newtotal ";



	if(mysqli_query($con,$sql)){
// $headers = 'From:marsentertainment<tickets@marsentertainment.com>'."\r\n";
// $headers .= "MIME-Version: 1.0\r\n";

// $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//         $subject = "Ticket";

//         $message = '<html><body>';
// $message .= 'Your booking for the show <b>'.$title.'  </b>has been successful.<p>Visit mars.talmischool.com/my_tickets.php to view the status of your ticket and also download it </p>';

// $message .= '</body></html>';

//         mail($emailb, $subject, $message, $headers);

	echo "<script>alert('Booking done successfully.')
window.location.href='my_tickets.php';

  </script>";

	}

}

}
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
<br>
<div>
<?php
$ret=mysqli_query($con,"select * from shows WHERE id=$id");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret))
{?>

<form style="float:none;margin:auto;" class="form-group col-md-3" method="post" action="">

<?php
$email=$_SESSION['login'];
$usersinfo=mysqli_query($con ,"SELECT * FROM users WHERE email='$email'");
while ($details=mysqli_fetch_array($usersinfo)){
?>

<input hidden name="nameb" value= "<?php echo $details['name'] ?>" >
<input hidden name="emailb" value= "<?php echo $details['email'] ?>" >
<input hidden name="phone" value= "<?php echo $details['phone_number'] ?>" >
<center><h5>Balance: ksh <input style="border:none;width:60px;font-weight:bold" name="balance" value="<?php echo $details['wallet'] ?>"></h5> </center>




<?php }?>



<script>
function myFunction() {
	var a=document.getElementById("type").value;
	 var a2 = Number(a.replace(/[^0-9]/g,''));


	var b=Number(document.getElementById("number").value);
	var c=document.getElementById("snacks").value;
	 var c2 = Number(c.replace(/[^0-9]/g,''));





  document.getElementById("demo").value = (a2*b)+c2;
}
</script>




<center><h5 style="color:purple"> <?php echo $title ?></h5></center>
<div class="form-group m-b-20">
<label style="font-size:13px;font-weight:bold">Select Seat Type <span style="color:red">*</span></label><br>
<select name="type"  id="type" class="form-control" onchange="myFunction()"  required >


<?php






	$sql="select seat,price from seats";

	foreach ($con->query($sql) as $r)
	{
		echo "<option value='".$r['seat'].":ksh ".$r['price']."'>".$r['seat'].":ksh".$r['price']."</option>";
	}
			?>
		</select>
		<script>

	document.getElementById("type").selectedIndex = -1;
	</script>
</div>

<div class="form-group m-b-20">
<label style="font-size:13px;font-weight:bold">Number of Seats <span style="color:red">*</span></label>
<input type="number" id="number" value=1 class="form-control" name="number" onchange="myFunction()"  placeholder="no of seats" required>
</div>


<div class="form-group m-b-20">
<label style="font-size:13px;font-weight:bold">Select Snacks and drinks</label>
<select name="snacks"  id="snacks" class="form-control" onchange="myFunction()"   >
<option value="none" >choose</option>

<?php






	$sql="select item,price from snacks_drinks";

	foreach ($con->query($sql) as $r)
	{
		echo "<option value='".$r['item'].":ksh ".$r['price']."'>".$r['item']."</option>";
	}
			?>
		</select>


</div>


</div>


<center><h5 style="color:red;font-weight:bold">Total cost: ksh<input readonly style="width:100px;border:none;color:red;font-weight:bold" name="total_paid" id="demo"></span> </h5></center>

	<center><button name="pay"  type="submit" class="btn btn-success">Pay Now</button> &nbsp;<button  type="submit" name="save" class="btn btn-success">Pay Later</button></center>
	<center><p><i>If you choose to pay later,ensure you pay within 1 hr.</i></p></center>

</form>
</div>
<br>



<?php } }?>



</body>


<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
