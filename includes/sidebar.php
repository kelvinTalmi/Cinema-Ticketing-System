  
  
  <div class="col-md-4" style="margin-top:4%">

          <!-- Search Widget -->
          
			   <div id="side"></div>
             

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Latest Series</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
<?php $query=mysqli_query($con,"select series from movies_series");
while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                     <?php echo $row['series'];?>
                    </li>
<?php } ?>
                  </ul>
                </div>
       <div id="counties"></div>
              </div>
            </div>
          </div>

<div class="card my-4">
            <h5 class="card-header">Latest Movies</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
<?php $query=mysqli_query($con,"select movies from movies_series");
while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                      <?php echo $row['movies'];?>
                    </li>
<?php } ?>
                  </ul>
                </div>
       <div id="counties"></div>
              </div>
            </div>
          </div>
          <!-- Side Widget -->

