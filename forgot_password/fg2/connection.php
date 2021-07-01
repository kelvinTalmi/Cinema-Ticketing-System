<?php
$servername='localhost';
$username='talmiboo_shopwithtalmi';
$password='Elsielove1135';
$dbname = "talmiboo_newsportal";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>