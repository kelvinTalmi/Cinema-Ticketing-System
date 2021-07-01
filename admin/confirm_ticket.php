
<?php
session_start();
include ("includes/config.php");

if(!isset($_SESSION['adminlogin'])){

  header('location:login.php');
}
$id=$_GET['id'];

if(isset($_POST['receive'])){
mysqli_query($conn,"UPDATE bookings SET status=4 WHERE id=$id");
echo "<script>
alert('Ticket Received successfuuly');

window.location.href='receive_ticket.php';

</script>";

}


if(isset($_POST['submit'])){

$ticket_no=$_POST['ticket_no'];
$id=$_GET['id'];
$result=mysqli_query($conn,"SELECT * FROM bookings WHERE id=$ticket_no and status=1");
if(mysqli_num_rows($result)>0){
header("location:confirm_ticket.php?id=".$ticket_no);
}else{

echo "<script>alert('The ticket number is invalid or has been used')</script>";
}

}




 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="best movie shows">
    <meta name="author" content="mars_entertainment">
    <meta name="keywords" content="mars,entertainment,movies,series">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">


    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" >

    <!-- Vendor CSS-->


    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" >
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

<style>
    @media screen and (min-width: 0px) and (max-width: 998px) {
        .header-desktop{
          display:none;
        }

</style>






</head>

<body >
    <div >
    <?php include ("includes/mobile_header.php") ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include ("includes/sidebar.php") ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
          <?php include ("includes/header.php") ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container">
                    <div style="margin:auto;float:none" class="col-md-5">
<div class="card">
<center><div class="card-header"><H5>Receive Tickets</h5></div></center>
<div class="card-body">
<form method="post">
<label>Enter Ticket No</label>
<input type="text" class="form-control" name="ticket_no"><br>

<center><button class="btn btn-primary" name="submit">Validate</button></center>
</form>


<br>
<form method="post">
<center><h5>Valid Ticket</H5></center>
<?php
$id=$_GET['id'];
$result_confirm=mysqli_query($conn,"SELECT * FROM bookings WHERE id=$id");
while($rows_confirm=mysqli_fetch_array($result_confirm)){
?>
<b>Ticket No:</b> <?php echo $rows_confirm['id']  ?><br>
<b>Name:</b> <?php echo $rows_confirm['name']  ?><br>
<b>Seat Booked:</b>
<?php $seat_type=substr($rows_confirm['seat_type'],0,2);

if($seat_type=='vv'){
  echo "Vvip";
}elseif($seat_type=='vi'){
  echo "Vip";

}else{

  echo "Regular";

}

?>

<br>
<b>No of Seats:</b> <?php echo $rows_confirm['no_of_seats']  ?><br>
<b>Snacks:</b> <?php echo $rows_confirm['snacks_drinks']  ?><br>



<?php } ?>

<center><button name="receive" class="btn btn-success">Receive</button> </center>


</form>

</div>

</div>

</div>





                            </div>
                        </div>
                        <?php include ("includes/footer.php") ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    
    <script src="vendor/animsition/animsition.min.js"></script>
    

    

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
