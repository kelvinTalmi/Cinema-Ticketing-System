<?php

 $id = "";
  $email = "";
if(isset($_POST['save']))
{	 
	 $name = $_POST['name'];
	 $id = $_POST['id'];
	 $phone_number = $_POST['phone_number'];
	  $pass = md5($_POST['pass']);
	
	  
	  
	  
	  
	  
	  $sql_u = "SELECT * FROM users WHERE email='$id'";
  	
  	$res_u = mysqli_query($con, $sql_u);
  

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... Email already taken"; 	
  	
  	}else{
	  
	  
	  
	  
	
	 $sql = "INSERT INTO users (name,email,phone_number,password)
	 VALUES ('$name','$id','$phone_number','$pass')";
	 if (mysqli_query($con, $sql)) {
		echo "<script type='text/javascript'> document.location = 'confirmlogin.php'; </script>";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
}
}

?>
