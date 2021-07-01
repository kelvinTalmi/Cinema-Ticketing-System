

<?php
session_start();
include('includes/config.php');


if(!isset($_SESSION['login'])){

    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
}


    ?>

<! DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">
  <meta name="description" content="Mars Entertainment Ticketing System">
  <meta name="keywords" content="Mars,Entertainment,movies,shows,ticketing">
  <meta name="author" content="Stanley">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>






</head>

<body>
<div style="padding-bottom:10px;position:static;"> <?php include('includes/header.php');?></div>


  <!-- Navigation -->


<div class='container' >



<center><h6 class="alert alert-primary">Open Shows</h6></center>

								<div class="row">
			<?php

			if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM shows";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$ret=mysqli_query($con,"select * from shows WHERE status=1 order by id desc  LIMIT $offset, $no_of_records_per_page");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret))
{?>

		<div  class="col-sm-10 col-md-3">
			<div  class="products">
	<div>
		 <div  class="card mb-4">
			<div class="card-header"><center><span style="color:red;font-size:16px;font-weight:bold"><?php echo $row['title']?></span></center></div><!-- /.image -->


			<div  class="card-body">

			<img class="card-img-top" src="uploads/images/<?php echo $row['image']?>"  height="230px"   alt="Card image cap">



			<table style="font-size:13px;" class="table table-striped">
			<tr><td><b>Category:</b> </b></td><td><?php echo $row['category']?></td></tr>
			<tr><td> <b>Released on: </b></td><td><?php echo $row['release_date']?></td></tr>
			<tr><td><b>
Starring:</b> </b></td><td><?php echo $row['main_character']?></td></tr>



			</table>


			<center><a href="description.php?id=<?php echo $row['id']?>&title=<?php echo $row['title']?>"  class="btn btn-primary btn-block">More Details </a></center>
			</div>
			</div>



			</div>
			</div>
		</div>
	  <?php } } else {?>

		<div class="col-md-4 "> <h3>No Product Found</h3>
		</div>

<?php } ?>












		</div></div>


</div>
</div>
  <!-- Pagination -->


    <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>

        </div>


        </body>
<?php include("includes/footer.php") ?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	</html>
