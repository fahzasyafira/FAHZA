<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/favicon.png" type="image/ico" />

    <title> ADMIN Lokerisel </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <center>
            &nbsp; <a href="indexr.php" class="fa fa-mortar-board fa-2x" style="color:#fff;"><span><font size="4.95" color="white" face="Helvetica Neue">ADMIN Lokerisel</font></span></a>
            </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/profil.jpeg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Fahza Syafira Karin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                    <i class='bx bx-search' ></i>
                    <input type="text" placeholder="Search...">
                    <span class="tooltip">Search</span> 
                  </li>
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span ></span></a>
                  </li>
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard <span ></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> Data Umkm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=data_umkm">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_umkm">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Data Reseller <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=data_reseller">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_reseller">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fab fa-blogger-b"></i> Blog <span ></span></a>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Approve Umkm <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                        <li><a href="index.php?page=pending_umkm">Dipending</a></li>
                        <li><a href="index.php?page=approve_umkm">Diterima</a></li>
                        <li><a href="index.php?page=tolak_umkm">Ditolak</a></li>
                  </ul>
                  </li>
                  <li><a href="#"><i class="fas fa-percent"></i> Insert Promo <span ></span></a>
                  </li>
                  <li><a href="#"><i class="fas fa-money-check-alt"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                        <li><a href="#">di edit</a></li>
                        <li><a href="#">insert</a></li>
                  </ul>
                  </li>
                  <li><a href="#"><i class="fas fa-link"></i> Komplain <span ></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="#">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" href="#">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock" href="#">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" >
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/profil.jpeg" alt="">Fahza Syafira Karin
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="#"> Profile</a>
                      <a class="dropdown-item"  href="#">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    <a class="dropdown-item"  href="LOGIN PEMWEB/learn.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
      <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
      	case 'data_reseller':
      		# code...
      		include 'tampilr.php';
      		break;
      	case 'tambah_reseller':
      		# code...
      		include 'tambahr.php';
      		break;
        case 'edit_reseller':
        		# code...
        	include 'editr.php';
        	break;
        case 'edit_reseller_save':
          		# code...
          include 'editr.php';
          break;
        default:
		          #code...
		      include 'home.php';
		      break;
        }
        ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright @ 2021 Aplikasi Lokerisel : Fahza Syafira Karin
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>

  </body>
</html>
