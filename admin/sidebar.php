<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <hr align="right" color="#fff">
            <div class="mt-2 ms-3 d-flex">
                <div class="image">
                    <img src="../assets/images/users/<?php echo $_SESSION['foto']; ?>" alt="Admin image" class="rounded-circle" width="37">
                </div>
                <div class="info text-white ms-3 waves-effect waves-dark">
                    <?php echo $_SESSION['nama'] ?><br>
                    <small class="hidden-xs"><?php echo $_SESSION['akses'] ?></small>
                </div>
            </div>
            <hr align="rigth" color="#fff">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">&nbsp;Dashboard</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tabel-transaksi.php" aria-expanded="false"><i class="mdi mdi-cart-plus"></i><span class="hide-menu">&nbsp;Cek Transaksi</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tabel-keberangkatan.php" aria-expanded="false"><i class="mdi mdi-airplane-takeoff"></i><span class="hide-menu">&nbsp;Kebarangkatan</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tabel-kelas.php" aria-expanded="false"><i class="mdi mdi-airplane"></i><span class="hide-menu">&nbsp;Kelas Penerbangan</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tabel-pengguna.php" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">&nbsp;Data Admin </span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tabel-customer.php" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">&nbsp;Data Customer </span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>