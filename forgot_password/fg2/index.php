<?php
session_start();
include_once 'connection.php';
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $result = mysqli_query($conn,"SELECT * FROM tbladmin where email='" . $_POST['id'] . "'");
    $row = mysqli_fetch_assoc($result);
$fetch_id=$row['email'];
	$email=$row['email'];
	$pass=$row['password'];
	if($id==$fetch_id) {
				$to =$email;
                $subject = "Password";
                $message = "Your password is :$pass";
                $headers = "From:talmischool@gmail.com" . "\r\n" .
               "CC:kelvinkariuki141@gmail.com";
                mail($to,$subject,$message,$headers);
                echo "<p style='text-align:center;color:red;font-size:15px;'>Password sent to the email you gave during registration.</p>";
			}
				else{
					echo "<p style='text-align:center;color:red;font-size:15px;'>Email Not valid</p>";
				}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="author" content="PHPGurukul">


        <!-- App title -->
        <title>Shop With Talmi</title>

        <!-- App css -->
        <link href="../user/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="../user/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="../user/assets/js/modernizr.min.js"></script>
<style>
h4 {
  color: #ffffff !important;
  font-size: 24px;

  font-family: 'Hind Madurai', sans-serif;
  font-weight: 600;

}
</style>
    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div  class="wrapper-page">

                            <div  class="m-t-40 account-pages">
                                <div style="background-color:#000080; !important" class="text-center account-logo-box">
                                   
                                        <a  href="../index.php" class="text-success">
										 <div style="background-color:#000080; !important"  class="container">
                                            <h4   style="color:white;font-family:sans-serif; !important">Shop With Talmi</h6>
											</div>
                                        </a>
                                 <span style="color:white;font-size:19px;font-weight: 600;"> Forgot Password </span>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
								
                                <div class="account-content">
							
                                    <form class="form-horizontal" action='' method='post' >

                                        <div class="form-group ">
                                            <div class="col-xs-12">
											<h5>Email</h5>
                                                <input class="form-control" type="email" required="" name="id" placeholder="Enter email" autocomplete="off">
                                            </div>
                                        </div>

                                      


                     
                                        <center>
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" name='submit' type="submit" >Submit</button>
                                          
</center>
                                    </form>
									<br>
<center><a href="forgot-password">Forgot Password?</a> &nbsp; &nbsp; &nbsp;  <a href="register.php"> Register</a></center>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                    

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../user/assets/js/jquery.min.js"></script>
        <script src="../user/assets/js/bootstrap.min.js"></script>
        <script src="../user/assets/js/detect.js"></script>
        <script src="../user/assets/js/fastclick.js"></script>
        <script src="../user/assets/js/jquery.blockUI.js"></script>
        <script src="../user/assets/js/waves.js"></script>
        <script src="../user/assets/js/jquery.slimscroll.js"></script>
        <script src="../user/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="../user/assets/js/jquery.core.js"></script>
        <script src="../user/assets/js/jquery.app.js"></script>

    </body>
</html>