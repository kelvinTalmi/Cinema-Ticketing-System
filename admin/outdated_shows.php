


<?php
session_start();
include ("includes/config.php");

if(!isset($_SESSION['adminlogin'])){

  header('location:login.php');
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
<center><h3>OUTDATED SHOWS</h3></center><br>
<table style="background-color:white"class="table table-bordered">
<tr>
<td>#</td>
<td>Title</td>
<td>Date to feature</td>
<td>Time to Feature</td>
<td>More</td>

</tr>
<?php
$result=mysqli_query($conn,"SELECT * FROM shows where status=0");
$i=0;
while($rows=mysqli_fetch_array($result)){
  $i++;
?>
<tr>
<td><?php echo $i  ?>  </td>
<td><?php echo $rows['title']  ?>  </td>
<td><?php echo $rows['date']  ?>  </td>
<td><?php echo $rows['time']  ?>  </td>
<td><a href="show_details2.php?id=<?php echo $rows['id']  ?>">Details</a>  </td>

</tr>
<?php } ?>



</table>








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
