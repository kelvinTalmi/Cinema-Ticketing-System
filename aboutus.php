
<?php
session_start();
include('includes/config.php');


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



      
               
                    <div class="container">


<br>








                            <div class="col-md-12">
                                <div class="card">
<center><div style="color:red" class="card-header">About Us</div></center>
<div class="card-body">Mars Entertainment website offer an easy way of booking our shows.We always post our shows so that you can have a glimpse
of what we offer.We ensure you are commfortable at our cinema hall.</div>

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
