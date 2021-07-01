


<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['login'])){



    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
}

$movie=$_GET['id'];
$title=$_GET['title'];

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


<body onload="ticket()">


<?php include('includes/header.php');?>







								<div class="container">
			<?php
$ret=mysqli_query($con,"select * from shows WHERE id=$movie");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret))
{?>

		<div style="float:none;margin:auto;" class="col-sm-10 col-md-5  center">
		<br>

		 <div class="card mb-4 ">
			<div class="card-header"><center><span style="color:red;font-size:15px;font-weight:bold"><?php echo $row['title']?></span></center></div><!-- /.image -->


			<div style="font-size:16px;" class="card-body">

			<img style="float:left" class="card-img-top" src="uploads/images/<?php echo $row['image']?>"      alt="Card image cap">


			<table style="font-size:13px;" class="table table-striped">
			<tr><td> <b>Category: </b></td><td><?php echo $row['category']?></td></tr>
			<tr><td> <b>Starring: </b></td><td><?php echo $row['main_character']?></td></tr>
			<tr><td> <b>Released on: </b></td><td><?php echo $row['release_date']?></td></tr>
			<tr><td><b>Description:</b> </b></td><td><?php echo $row['description']?></td></tr>
			<tr><td><b>Date:</b> </b></td><td><?php echo $row['date']?></td></tr>
			<tr><td><b>Time:</b> </b></td><td><?php echo $row['time']?></td></tr>
			<tr><td><b>Open Seats: </b></td><td>

			<b>vvip:</b>

		<?php


$title=$_GET['title'];


$stmtvv=mysqli_query($con ,"SELECT * FROM seats WHERE seat='vvip'");
$rowvv=mysqli_fetch_array($stmtvv);

			$countvv=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'vvip%' ");
$rowsvv1=mysqli_num_rows($countvv);
	echo $rowvv['total_seats']-$rowsvv1;
	?>



			<br>
			<b>vip:</b> <?php $stmtvi=mysqli_query($con ,"SELECT * FROM seats WHERE seat='vip'");
$rowvi=mysqli_fetch_array($stmtvi);
			$countvi=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'vip%'");
$rowsvii=mysqli_num_rows($countvi);
	echo $rowvi['total_seats']-$rowsvii;

	?>

	<input hidden value="<?php echo $row1['total_seats']-$rows3;  ?>" id="vip2"> <br>
			<b>regular:</b> <?php $stmt=mysqli_query($con ,"SELECT * FROM seats WHERE seat='regular' ");
$row1=mysqli_fetch_array($stmt);




			$count=mysqli_query($con ,"SELECT * FROM bookings WHERE shows='$title' AND status<2 AND seat_type LIKE 'regular%'");
$rows3=mysqli_num_rows($count);
	echo $row1['total_seats']-$rows3;
	?>
	<input hidden  value="<?php echo $row1['total_seats']-$rows3;  ?>" id="regular2">


			</ul></td></tr>


			<tr><td><b>pricing: </b></td><td>

			<b>vvip:</b> ksh <?php echo $row['vvip']?> <br>
			<b>vip:</b> ksh <?php echo $row['vip']?> <br>
			<b>regular:</b> ksh <?php echo $row['regular']?>

			</ul></td></tr>

			<br>

			</table>



			<center><a href="book.php?title=<?php echo $row['title']?>&id=<?php echo $row['id']?> " id="ticket" class="btn btn-primary btn-block">BOOK A TICKET </a></center>
			</div>
			</div>


	  <?php } } else {?>

		<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
		</div>

<?php } ?>












			</div><!-- /.col -->
		</div></div>


</div>
</div>
</center>
</body>
<?php include("includes/footer.php") ?>








<script type='text/javascript'>
    function ticket(){
    var x=document.getElementById('vip2').value;;
    var y=document.getElementById('vip2').value;
    var z=document.getElementById("regular2").value;

    if(y&&x&&z==0)

    {
         document.getElementById("ticket").innerHTML="Booking Closed";
         document.getElementById("ticket").href="#";



    }


    }




</script>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>


<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
