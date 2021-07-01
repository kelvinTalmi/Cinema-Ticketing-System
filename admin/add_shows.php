


<?php
session_start();
include ("includes/config.php");

if(!isset($_SESSION['adminlogin'])){

  header('location:login.php');
}


if(isset($_POST['submit'])){

$title=$_POST['title'];
$main_character=$_POST['main_character'];
$category=$_POST['category'];
$rating=$_POST['rating'];
$release_date=$_POST['release_date'];
$description=$_POST['description'];
$date=$_POST['date'];
$time=$_POST['time'];
$vvip=$_POST['vvip'];
$vip=$_POST['vip'];
$regular=$_POST['regular'];


//image upload
$imgfile=$_FILES["imageupload"]["name"];
// get the image extension
$imageFileType = strtolower(pathinfo($imgfile,PATHINFO_EXTENSION));

// allowed extensions
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<script> 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'</script>";

}else
{
	if ($_FILES["imageupload"]["size"] > 50000000 ) {
  echo "<script> 'Sorry, your file is too large.'</script>";

}else{
//rename the image file

$name=time();
$imgnewfile=$name.$imgfile;


// Code for move image into directory
move_uploaded_file($_FILES["imageupload"]["tmp_name"],"../uploads/images/".$imgnewfile);

$result_insert=mysqli_query($conn,"INSERT INTO shows(title,description,date,time,regular,main_character,rating,vip,vvip,category,release_date,image)VALUES('$title','$description','$date','$time','$regular','$main_character','$rating','$vip','$vvip','$category','$release_date','$imgnewfile')");

if($result_insert){

  echo "<script> alert('Show uploaded successfully') </script>";
}else{

echo "<script> alert('Something went wrong') </script>";

}











}
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



                      <div style="float:none;margin:auto" class="col-md-5">
                    <div class="card">
                      <center><div class="card-header"> <h5> <B>Add Show</B> </H5> </div></center>
                      <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                      <label>Title</label>
                        <input required type="text" name="title" class="form-control" >

                        <label>Main Character</label>
                          <input required type="text" name="main_character" class="form-control" >

                          <label>Category</label>
                            <input required type="text" name="category" class="form-control" >
<label>Rating</label>
                            <select required class="form-control" name="rating">

                            <option  value="5">5</option>
                            <option  value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>

                            </select>

                            <label>Release Date</label>
                              <input required type="date" name="release_date" class="form-control" >




                        <label>Description</label>
                          <textarea required name="description" class="form-control" ></textarea>

                        <label>Date to feature</label>
                          <input required type="date" name="date" class="form-control" >

                          <label>Time to feature</label>
                            <input required type="time" name="time" class="form-control" >


                         
                            <input hidden required type="number" name="vvip" value="1000"   class="form-control" >

                            
                              <input  hidden required type="number" name="vip" value="500" class="form-control" >

                                <input hidden required type="number" name="regular" value="300" class="form-control" >


                            <label>Upload Image</label>
                            <input required type="file" class="form-control" id="imageupload" name="imageupload"><br>


                            <br>
                            <center><button name="submit" class="btn btn-primary">Submit</button></center>

                    </form>

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
