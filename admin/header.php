<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.php">
                <!-- Logo icon -->
                <b class="logo-icon ps-2">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="../assets/images/logo-1.png" alt="homepage" class="light-logo" width="30" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text ms-2">
                    <!-- dark Logo text -->
                    <img src="../assets/images/text.png" alt="homepage" class="light-logo" width="180" height="50" />
                </span>
            </a>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/images/users/<?php echo $_SESSION['foto']; ?>" alt="user" class="rounded-circle" width="31" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <li class="user-header bg-dark mb-1">
                            <center>
                                <img src="../assets/images/users/<?php echo $_SESSION['foto']; ?>" alt="Admin Image" class="rounded-circle mt-2 mb-2" width="70">
                                <p class="text-white">
                                    <?php echo $_SESSION['nama'] ?><br>
                                    <small class="hidden-xs"><?php echo $_SESSION['akses'] ?></small><br>
                                    <small>Today Login : <?= date("d F Y") ?></small>
                                </p>
                            </center>
                        </li>
                        <a class="dropdown-item" href="logout.php">
                            <i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>