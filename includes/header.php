

<div > <nav style="background-color:green;font-weight:bold; !important"  class="navbar  navbar-expand-lg navbar-dark  ">
      <div style="background-color:green; !important"  class="container">
      <a href="index.php"><img src="uploads/logoimg.png" height=42  ></a>

</h3></a>


        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <li class="nav-item" <?php if (!isset($_SESSION['login'])){ echo 'style="display:none;"'; } ?>>
              <span style="color:yellow" class="nav-link" >Welcome<?php






			  $email=$_SESSION['login'];
$usersinfo=mysqli_query($con ,"SELECT * FROM users WHERE email='$email'");
while ($details=mysqli_fetch_array($usersinfo)){
?>

<?php
$myvalue = $details['name'];
$arr = explode(' ',trim($myvalue));
echo  $arr[0];

 ?>

<?php } ?></span>
            </li>
		  <li class="nav-item">
              <a style="color:white;" class="nav-link" href="index.php">Home</a>
            </li>

		  <li class="nav-item">
              <a style="color:white;" class="nav-link" href="my_tickets.php">My tickets</a>
            </li>


		  <li class="nav-item">
              <a style="color:white;" class="nav-link" href="aboutus.php">About us</a>
            </li>

			<li class="nav-item">
              <a style="color:white;" class="nav-link" href="contactus.php">Contact us</a>
            </li>


			<li class="nav-item" <?php if (!isset($_SESSION['login'])){ echo 'style="display:none;"'; } ?>>
              <a style="color:white;" class="nav-link" href="my_profile.php">Profile</a>
            </li>

			<li class="nav-item"  <?php if (!isset($_SESSION['login'])){ echo 'style="display:none;"'; } ?>>
              <a style="color:white;" class="nav-link" href="logout.php">Logout</a>
            </li>








			<li class="nosession" class="nav-item"  <?php if (isset($_SESSION['login'])){ echo 'style="display:none;"'; } ?>>
              <a style="color:white;" class="nav-link" href="login.php">Log in</a>
            </li>

				<li class="nosession" class="nav-item" <?php if (isset($_SESSION['login'])){ echo 'style="display:none;"'; } ?>>
              <a id="nosession" style="color:white;" class="nav-link" href="register.php">Sign up</a>
            </li>





          </ul>
        </div>
      </div>
    </nav>
</div>
