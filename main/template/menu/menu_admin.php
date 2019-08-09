   <!-- Navigation -->
   <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?view=home">Mono Train Photo</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">       

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="index.php?view=user_profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="index.php?view=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="index.php?view=home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="index.php?view=kategori"><i class="fa fa-list-ol fa-fw"></i> Kategori</a>
                </li>
                <li>
                    <a href="index.php?view=camera"><i class="fa fa-camera fa-fw"></i> Camera</a>
                </li>
                <li>
                    <a href="index.php?view=pelanggan"><i class="fa fa-users fa-fw"></i> Pelanggan</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       <li>
                        <a href="index.php?view=penyewaan"><i class="fa fa-th-list fa-fw"></i> Penyewaan</a>
                    </li>
                    <li>
                        <a href="index.php?view=pembayaran"><i class="fa fa-dollar fa-fw"></i> Pembayaran</a>
                    </li>
                    <li>
                        <a href="index.php?view=pengembalian"><i class="fa fa-repeat fa-fw"></i> Pengembalian</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>