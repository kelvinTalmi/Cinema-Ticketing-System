


<?php
session_start();
include ("includes/config.php");

if(!isset($_SESSION['adminlogin'])){

  header('location:login.php');
}

$show_id=$_GET['id'];


if(isset($_POST['delete'])){
	$delete=mysqli_query($conn,"DELETE FROM  shows  WHERE id=$show_id");
	
	
	if($delete){

  echo "<script> alert('Show deleted successfully');
  window.location.href='outdated_shows.php';

  </script>";

}else{

echo "<script> alert('Something went wrong') </script>";

}
	
}










if(isset($_POST['update_status'])){
$update_status=mysqli_query($conn,"UPDATE shows set status=1 WHERE id=$show_id");
if($update_status){

  echo "<script> alert('Show updated successfully');
  window.location.href='outdated_shows.php';

  </script>";

}else{

echo "<script> alert('Something went wrong') </script>";

}

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

$imgfile=$_FILES["imageupload"]["name"];
if($imgfile==""){

  $result_update=mysqli_query($conn,"UPDATE shows SET title='$title',description='$description',date='$date',time='$time',regular='$regular',main_character='$main_character',rating='$rating',vip='$vip',vvip='$vvip',category='$category',release_date='$release_date' WHERE id=$show_id");

  if($result_update){

    echo "<script> alert('Show updated successfully') </script>";
  }else{

  echo "<script> alert('Something went wrong') </script>";

  }


}else{

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

$result_update=mysqli_query($conn,"UPDATE shows SET title='$title',description='$description',date='$date',time='$time',regular='$regular',main_character='$main_character',rating='$rating',vip='$vip',vvip='$vvip',category='$category',release_date='$release_date',image='$imgnewfile' WHERE id=$show_id");




if($result_update){

  echo "<script> alert('Show updated successfully') </script>";
}else{

echo "<script> alert('Something went wrong') </script>";

}









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
                    <?php
$results=mysqli_query($conn,"SELECT * FROM shows WHERE id=$show_id");
while($rows=mysqli_fetch_array($results)){
?>


                      <div style="float:none;margin:auto" class="col-md-5">
                    <div class="card">
                      <center><div class="card-header"> <h5> <B><?php echo $rows['title'] ?></B> </H5> </div></center>
                      <div class="card-body">
                      <img class="card-img-top" src="../uploads/images/<?php echo $rows['image'] ?>"  height="220px"   alt="Card image cap">
<br><br>
                    <form method="post" enctype="multipart/form-data">
                      <label>Title</label>
                        <input required type="text" value="<?php echo $rows['title'] ?>" name="title" class="form-control" >

                        <label>Main Character</label>
                          <input required type="text" value="<?php echo $rows['main_character'] ?>" name="main_character" class="form-control" >

                          <label>Category</label>
                            <input required type="text" value="<?php echo $rows['category'] ?>" name="category" class="form-control" >
<label>Rating</label>
                            <select required class="form-control" name="rating">
<option value="<?php echo $rows['rating'] ?>"><?php echo $rows['rating'] ?> </option>
                            <option  value="5">5</option>
                            <option  value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>

                            </select>

                            <label>Release Date</label>
                              <input required type="date" value="<?php echo $rows['release_date'] ?>" name="release_date" class="form-control" >

                        <label>Description</label>
                          <textarea required name="description"  class="form-control" ><?php echo $rows['description'] ?></textarea>

                        <label>Date to feature</label>
                          <input required type="date" value="<?php echo $rows['date'] ?>" name="date" class="form-control" >

                          <label>Time to feature</label>
                            <input required type="time" value="<?php echo $rows['time'] ?>" name="time" class="form-control" >


                          <label>VVIP Charges</label>
                            <input required type="number" name="vvip" value="<?php echo $rows['vvip'] ?>" class="form-control" >

                            <label>VIP Charges</label>
                              <input  required type="number" name="vip" value="<?php echo $rows['vip'] ?>" class="form-control" >

                              <label>Regular Charges</label>
                                <input required type="number" name="regular" value="<?php echo $rows['regular'] ?>" class="form-control" >


                                <label>Update Image</label>
                            <input  type="file" class="form-control" id="imageupload" name="imageupload"><br>

                            <br>
                            <center>
                            <button name="submit" class="btn btn-primary">Update</button>
                            <button name="update_status" class="btn btn-success">Rewind</button>
							<button name="delete" class="btn btn-warning">Delete</button>
                            <p><i>Remember to change date and time when you rewind a show</i> </p>

                            </center>

                    </form>

                      </div>


                    </div>

<?php } ?>





























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
