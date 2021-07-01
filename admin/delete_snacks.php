
<?php
include ("includes/config.php");
$id=$_GET['id'];

$result=mysqli_query($conn,"DELETE from snacks_drinks WHERE id='$id'");

 if($result){

   echo "<script> alert('Item Deleted successfully');
window.location.href='manage_snacks.php';

   </script>";
 }else{

 echo "<script> alert('Something went wrong') </script>";

 }
?>