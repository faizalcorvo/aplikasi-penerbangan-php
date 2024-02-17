<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h3><a href="index.php"><i class="mdi mdi-airplane"></i>E-TIKET PENERBANGAN</a></h3>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=" collapse navbar-collapse yamm" id="navigation">
            <ul class="main-nav nav navbar-nav navbar-right">
                <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="index.php">Home</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="" href="kelas.php">Kelas</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.3s"><a class="" href="maskapai.php">Maskapai</a></li>
                <?php session_start();

                if (isset($_SESSION['nama_user'])) {
                ?>
                    <li class="wow fadeInDown" data-wow-delay="0.4s"><a href="order.php">Order</a></li>
                    <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" data-hover="dropdown" data-delay="200"><?php echo "$_SESSION[nama_user]"; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu navbar-nav">
                            <li>
                                <a href="orderlist.php">My Order List</a>
                            </li>
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li><img src="assets/images/users/<?php echo "$_SESSION[foto]"; ?>" width='50px' height='50px' /></li>
                <?php
                } else {
                ?>
                    <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="register.php">Login</a></li>
                <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- End of nav bar -->