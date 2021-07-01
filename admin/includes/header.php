<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">

                </form>
                <div class="header-button">
                    <div class="noti-wrap">

                    </div>

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">

                            <div class="content">
                                <a class="js-acc-btn" href="#">

                                  <?php

                                  $result=mysqli_query($conn,"SELECT * FROM admin");
                                  $rows=mysqli_fetch_array($result);
echo $rows['name'];
                                  ?>

                                </a>

                            </div>
                            <div class="account-dropdown js-dropdown">


                                <div class="info clearfix">

                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php

                                            $result=mysqli_query($conn,"SELECT * FROM admin");
                                            $rows=mysqli_fetch_array($result);
          echo $rows['name'];
                                            ?>

                                            </a>
                                        </h5>
                                        <span class="email">

                                        <?php echo $rows['email'];

?>

                                        </span>
                                    </div>
                                </div>

                                <div class="account-dropdown__body">

                                    <div class="account-dropdown__item">
                                        <a href="update_profile.php">
                                            <i class="zmdi zmdi-account"></i>Update Profile</a>
                                    </div>


                                </div>



                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>

</header>
