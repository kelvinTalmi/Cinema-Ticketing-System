<?php
$connection = mysqli_connect('localhost', 'talmiboo_quizk', 'Elsielove1135');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'talmiboo_quiz');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>