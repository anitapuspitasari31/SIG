<?php
	error_reporting(0);
    session_start();
    
    $koneksi = new mysqli("localhost","root","","db_sigdorah");

    include "function.php";

    if($_SESSION['admin'] || $_SESSION['user']){

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIDORAH</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <a class="navbar-brand" href="index.php">SIDORAH </a>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo date('d-M-Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>

                    <li>
    <a href="?page=pengguna"><i class="fa fa-user fa-2x"></i> Data Pengguna</a>
</li>

<li>
    <a href="#"><i class="fa fa-laptop fa-2x"></i> Data Pendonor<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="?page=pendonor">Identitas Pendonor</a></li>
        <li><a href="?page=lokasi">Lokasi Pendonor</a></li>
    </ul>
</li>


                    <?php if ($_SESSION['admin']) {?> 
                     
                   
                   
                    <?php } ?>     
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     	
                     	<?php

                     		$page = $_GET['page'];
                     		$aksi = $_GET['aksi'];


                     		if ($page == "pendonor" ) {
                                if ($aksi == "") {
                                    include "page/pendonor/pendonor.php";
                                }elseif ($aksi == "tambah") {
                                   include "page/pendonor/tambah.php";
                               }elseif ($aksi == "ubah") {
                                   include "page/pendonor/ubah.php";
                               }elseif ($aksi == "hapus") {
                                   include "page/pendonor/hapus.php";
                               }elseif ($aksi== "cetak") {
                                   include "page/pendonor/form_laporan_pendonor.php";
                               }
                            }
                            elseif ($page == "lokasi" ) {
                                if ($aksi == "") {
                                    include "page/lokasi/lokasi.php";
                                }elseif ($aksi == "tambah") {
                                    include "page/lokasi/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/lokasi/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/lokasi/hapus.php";
                                }
                            }elseif ($page == "pengguna" ) {
                                if ($aksi == "") {
                                    include "page/pengguna/pengguna.php";
                                }elseif ($aksi == "tambah") {
                                    include "page/pengguna/tambah.php";
                                }elseif ($aksi == "ubah") {
                                    include "page/pengguna/ubah.php";
                                }elseif ($aksi == "hapus") {
                                    include "page/pengguna/hapus.php";
                                }
                            }elseif ($page=="") {
                                include "home.php";
                            }

                     	?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    


    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</body>
</html>

<?php
    }else{
        header("location:Dashboarduser.php");
    }
?>

