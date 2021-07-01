

<?php

session_start();
include('includes/config.php');




if(!isset($_SESSION['login'])){
    
    
    
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
header('location:login.php');
}

if(isset($_POST['confirm'])){


$code=$_POST['code'];
$wallet=$_POST['wallet'];




$query=mysqli_query($con,"SELECT * FROM mpesa where code='$code'");

while($rowst=mysqli_fetch_array($query)){

$amount=$rowst['amount'];

}



$rowcount=mysqli_num_rows($query);
if($rowcount==0){

echo "<script>

alert('Invalid code')
</script>";

}else {

  $newtotal=$wallet+$amount;


  $sql = "UPDATE users SET wallet=$newtotal ";



  if(mysqli_query($con,$sql)){


  echo "<script>alert('ksh $amount credited into your wallet successfully.Total amount is now: $newtotal') ;

   window.history.back(-4);

  </script>";

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



                    <div class="container">

<br>





<div style="float:none;margin:auto;" class="col col-md-4">
<div class="card">

<center><div class="card-header md-4" ><h6> Deposit</h6> </div></center>
<div class="card-body">


<form method="post" action="">

  <?php
  $email=$_SESSION['login'];
  $usersinfo=mysqli_query($con ,"SELECT * FROM users WHERE email='$email'");
  while ($details=mysqli_fetch_array($usersinfo)){
  ?>

  <b><input hidden style="border:none;width:80px;font-weight:bold"  name="wallet" value= "<?php echo $details['wallet'] ?>" >
  
  
   <center><b>Balance: <?php echo $details['wallet'] ?></b>
</b>
  <?php }?>




  <p>Pay via mpesa payill 12345 then input the mpesa code in the field below</p>
  <p>Enter this demo code:<b>PBC4L5R2BL</b> </p>
  <label style="font-weight:bold">Input the Mpesa code</label><br><br>
<input name="code" class="form-control">
<br>
<p><button  name="confirm" class="btn btn-success">Submit</button></p>


</center>



</form>

</div>

</div>
</div>
<br><br>
</body>

<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
