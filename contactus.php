
<?php
session_start();
include('includes/config.php');

if(!isset($_SESSION['login'])){
    
    
    
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
}


if (isset($_POST['submit'])){
    
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $subject=$_POST['subject'];
    $message2=$_POST['message2'];
    
    //mail function
    
    $emailb="talmibooks18@gmail.com";
$headers .= 'From: ' . $email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $subject =$subject ;
         
        $message = '<html><body>';
$message .= "<b>Name:</b>$name <br> <b>Phone Number:</b>$phone_number  <br> <b>Message:</b> $message2 ";
        
$message .= '</body></html>';

        
     if(!@mail($emailb, $subject, $message, $headers)){
         
      echo   "<script> alert('Something went Wrong') </script>";
     }else{
         
       echo   "<script> alert('Message sent successfully') </script>";
         
         
         
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


<div >
                
                    <div class="container">

<br>
                       










                            <div style="float:none;margin:auto" class="col-md-4">
                                <div class="card">
                                  <center>
<div style="color:red" class="card-header">Contact Us</div>
<div class="card-body">
<p>Call:<a href="tel:0717878384">0717878384</a></p>
<p>Email:<a href="mailto:marsentertainment.@gmail.com">marsentertainment.@gmail.com</a></p>
<p>Location:Moi Avenue,Nairobi County</p>



<H5 style="background-color:yellow">Contact Form</H5>
<form method="post">


  <label style="font-weight:bold">Name</label>
  <input type="text" class="form-control"  width=30px; name="name" placeholder="James Doe" required>



  <label  style="font-weight:bold" >Email</label>
  <input type="email" class="form-control"  width=30px; name="email" placeholder="name@example.com" required>




  <label  style="font-weight:bold">Phone Number</label>
  <input type="number" class="form-control"  width=30px; name="phone_number" placeholder="07123345678" >


  <label  style="font-weight:bold">Subject</label>
  <input type="text" class="form-control"   name="subject" placeholder="" required>



  <label  style="font-weight:bold">Message</label>
  <textarea class="form-control"  name="message2" rows="3"></textarea><br>




<button class="btn btn-success" name="submit" >Submit</button><br>
</form>
</div>



</div>
</center>
</div>
</div>
</div>
</div>
<br>


</body>
<?php include("includes/footer.php") ?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
