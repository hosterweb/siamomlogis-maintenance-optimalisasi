
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>SIA<span></span></span><i class="zmdi zmdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Page title -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                            </li>
                            <li>
                                <h4 class="page-title">Halaman Utama</h4>
                            </li>
                        </ul>

                        <!-- Right(Notification and Searchbox -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>
                            <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->
  <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#"><?php echo $_SESSION['username'];?></a><br><?php echo $_SESSION['nama_lengkap'];?><br> <?php echo $_SESSION['level'];?></h5>
                        <ul class="list-inline">
                          <li>
                                <a href="?page=logout" class="text-custom">
                                    <i class="zmdi zmdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Pilihan Menu</li>

                            <li>
                                <a href="?page=home" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Halaman Utama </span> </a>
                            </li>
                               <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Master</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    
                               <li> <a href="?page=customer">Customer</a></li>
                                <li> <a href="?page=agent">Agent</a></li>
                                 <li> <a href="?page=users">User</a></li>
                                 </ul>   
                            </li>
                               <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Job</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    
                               <li> <a href="?page=create_job">Create Job</a></li>
                                <li> <a href="?page=entry_job">Entry Job</a></li>
                               <li>   <a href="?page=entry_invoice">Entry Invoice</a></li>
                                 </ul>   
                            </li>
                              <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Hutang Piutang</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?page=utang">Hutang</a></li>
                                    <li><a href="?page=piutang">Piutang</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="?page=saldo_awal_mom" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right"></span><span>Saldo Awal</span> </a>
                            </li>
<!--                            <li class="has_sub">
<a href="?page=laporan_invoice" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right"></span><span>Laporan Invoice</span> </a>
                            </li>-->
<!--                             <li class="has_sub">
<a href="?page=coa" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right"></span><span>COA</span> </a>
                            </li>-->
<li class="has_sub"><a href="?page=laporan_pendapatan" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right"></span><span>Laporan Pendapatan</span> </a>
                            </li>
                             <li class="has_sub">
                                <a href="?page=laporan_pembayaran" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right"></span><span>Laporan Pembayaran</span> </a>
                            </li>
<!--<li class="has_sub">
 <a href="?page=kas_bank" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right"></span><span>Kas Bank</span> </a>
</li>-->
                            
<!--<li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Laporan Transaksi</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Debet</a></li>
                                    <li><a href="#">Kredit</a></li>
                                </ul>-->
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Laporan Kas</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?page=kas_masuk">Kas Masuk</a></li>
                                    <li><a href="?page=kas_keluar">Kas Keluar</a></li>
                                    <li><a href="?page=kas_noted">Kas Debet</a></li>
                                </ul>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Laporan Hutang Piutang</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?page=lap_utang">Laporan Hutang</a></li>
                                    <li><a href="?page=lap_piutang">Laporan Piutang</a></li>
                                </ul>
                            </li>
<!-- <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Buku Kas</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?page=buat_rekening">Buat Rekening</a></li>
                                </ul>
                            </li>
-->                          
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Arus Kas</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?page=arus_kas_masuk">Kas Masuk</a></li>
                                    <li><a href="?page=arus_kas_keluar">Kas Keluar</a></li>
                                    <li><a href="#">Kas Debet</a></li>
                                </ul>
                                <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Jurnal Umum</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Kas Masuk</a></li>
                                    <li><a href="#">Kas Keluar</a></li>
                                    <li><a href="#">Kas Debet</a></li>
                                </ul>   
                            </li>
                            </li>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->
