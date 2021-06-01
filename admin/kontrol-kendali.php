<?php 
    session_start();

include("../koneksi.php");
include("../proses.php");



  
  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }

  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }
 $tokens = mysqli_query($conn,"SELECT * FROM login WHERE username='$username'");

        while($result=mysqli_fetch_array($tokens)){


    ?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Kendali Otomatis</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

<!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <img class="mb-1" src="../assets/img/logo_unpam.png" alt="" width="40" height="40">
                </div>
                <div class="sidebar-brand-text mx-1">Sistem Kendali Otomatis </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="daftar-pengguna.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Pengguna</span></a>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="kontrol-kendali.php">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Kontrol Kendali</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tentang.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tentang</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
<!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                       <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username;?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log Out
                                </a>  
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
            <form action="" method="get">
                <div class="container-fluid">

<!-- Judul Konten -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kontrol Kendali</h1>
                    </div>
                    <div class="form-group">
                        <label for="cari">Token:</label>
                        <input type="text" class="ip" id="ip" name="ip" value="<?php echo ( $result['token']) ?>" readonly>
                    </div>
                    <div class="row">

<!-- Relay 1-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary  mb-1"><h6>Relay 1</h6></div>
                                            
                                            <button class="btn btn-success" id="relay1-on"  type="button">ON</button>
                                            <button class="btn btn-danger" id="relay1-off"  type="button">OFF</button>
                                     
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- Relay 2 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary  mb-1"><h6>Relay 2</h6></div>

                                    <button class="btn btn-success" id="relay2-on"  type="button">ON</button>
                                    <button class="btn btn-danger" id="relay2-off"  type="button">OFF</button>
                                            
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- Relay 3 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-info mb-1"><h6>Relay 3</h6>
                                            </div>
                                    <button class="btn btn-success" id="relay3-on"  type="button">ON</button>
                                    <button class="btn btn-danger" id="relay3-off"  type="button">OFF</button>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- Relay 4 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning  mb-1"><h6>Relay 4</h6></div>
                                    <button class="btn btn-success" id="relay4-on"  type="button">ON</button>
                                    <button class="btn btn-danger" id="relay4-off"  type="button">OFF</button>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

<!-- Script Kirim data Ke Thinkspeak -->
<script>
        document.getElementById('relay1-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field1=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        document.getElementById('relay1-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field1=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        
        document.getElementById('relay2-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field2=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('relay2-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field2=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        
        document.getElementById('relay3-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });
        
        document.getElementById('relay3-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field3=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });

        document.getElementById('relay4-on').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field4=1"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });

        document.getElementById('relay4-off').addEventListener('click', function() {
                var ip = document.getElementById('ip').value;
                var url = "http://api.thingspeak.com/update?api_key="+ ip + "&field4=0"
                $.getJSON(url, function(data) {
                    console.log(data);
                });
        });

        
    </script>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Kendali Otomatis 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>

 <?php
        }
 ?>