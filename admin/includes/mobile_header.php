<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">


              <li>
                  <a href="dashboard.php">
                      <i class="fas fa-tachometer-alt"></i>Dashboard</a>
              </li>





                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-film"></i>Shows</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                      <li>
                          <a href="add_shows.php">Add Shows</a>
                      </li>
                      <li>
                          <a href="upcoming_shows.php">Upcoming Shows</a>
                      </li>

                      <li>
                          <a href="outdated_shows.php">Outdated Shows</a>
                      </li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-ticket-alt"></i>Tickets</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                      <li>
                      <a href="booked_tickets.php">Booked Tickets</a>
                      </li>
                        <li>
                      <a href="receive_ticket.php">Receive tickets</a>
                        </li>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Snacks</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                      <li>
                          <a href="add_snacks.php">Add Snacks and Drinks</a>
                      </li>
                      <li>
                          <a href="manage_snacks.php">Manage Snacks and Drinks</a>
                      </li>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-money-bill-alt"></i>Mpesa</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                      <li>
                          <a href="add_mpesa.php">Add Mpesa Code</a>
                      </li>
                      <li>
                          <a href="manage_mpesa.php">Mpesa records</a>
                      </li>
                    </ul>
                </li>



                <li>
                    <a href="cancelled_shows.php">
                        <i class="fas fa-window-close"></i>Canceled Shows</a>
                </li>



            </ul>
        </div>
    </nav>
</header>
