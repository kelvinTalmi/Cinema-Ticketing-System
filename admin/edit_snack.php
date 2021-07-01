


<?php
session_start();
include ("includes/config.php");

if(!isset($_SESSION['adminlogin'])){

  header('location:login.php');
}

if(isset($_POST['submit'])){
$id=$_GET['id'];
$snack=$_POST['snack'];
$price=$_POST['price'];
 $result=mysqli_query($conn,"UPDATE snacks_drinks SET item='$snack',price='$price' WHERE id='$id'");

 if($result){

   echo "<script> alert('Item updated successfully') </script>";
 }else{

 echo "<script> alert('Something went wrong') </script>";

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

<?php
$id=$_GET['id'];
$resultedit=mysqli_query($conn,"SELECT * FROM snacks_drinks WHERE id=$id");
while($rowsedit=mysqli_fetch_array($resultedit)){
?>

                    <div class="card">
                    <center><div class="card-header"><H5>Edit Snacks and Drinks</h5></div></center>
                    <div class="card-body">
                    <form method="post">
                    <label>Snack && drinks</label>
                    <input type="text" value="<?php echo $rowsedit['item']?>" class="form-control" name="snack" required>

                    <label>Price</label>
                    <input type="number" value="<?php echo $rowsedit['price']?>" class="form-control" name="price" required><br>

                    <center><button class="btn btn-primary" name="submit">Update</button></center>
                    </form>
                    </div>

                    </div>
<?php } ?>
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
