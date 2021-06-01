<?php 
   session_start();

  include("../koneksi.php");
  
  include ("../proses.php");
 
  
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
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1>
                    <p class="mb-4"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Tanggal Daftar</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Alamat Email</th>
                                            <th class="text-center">Level</th>
                                            <th class="text-center">Id Token</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($enters as $enter) : ?>                                                                
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <?php
                                        $masuk = $enter['date'];
                                        $date = date_create("$masuk");
                                    ?>
                                    <td class="text-center"><?= date_format($date,"d/m/Y"); ?></td>                                    
                                    <td class="text-center"><?= $enter["username"] ?></td>
                                    <td class="text-center"><?= $enter["email"] ?></td>
                                    <td class="text-center"><?= $enter["level"] ?></td>
                                    <td class="text-center"><?= $enter["token"] ?></td>
                                    <td class="text-center">
                                    
                                        <a class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Edit"  href="edit.php?id=<?= $enter["id"]; ?>" onclick="return confirm('Anda yakin ingin mengedit Pengguna ini ?');">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus"  href="hapus.php?id=<?= $enter["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus Pengguna ini ?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                            </td>
                        </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>                    
                    </tbody>
                </table>
                <div class="text-center">
                            <a href="tambah-pengguna.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div>
            </div>
        </div>
    </div>
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
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
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>












































<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Data Pengguna Sistem</div>
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pembuatan</th>                                    
                                    <th>Nama Penggguna</th>
                                    <th>Alamat Email</th>
                                    <th>Level</th>
                                    <th>Token</th>  
                                    <th>Opsi</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($enters as $enter) : ?>                                                                
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <?php
                                        $masuk = $enter['date'];
                                        $date = date_create("$masuk");
                                    ?>
                                    <td><?= date_format($date,"d/m/Y"); ?></td>                                    
                                    <td><?= $enter["username"] ?></td>
                                    <td><?= $enter["email"] ?></td>
                                    <td><?= $enter["level"] ?></td>
                                    <td><?= $enter["token"] ?></td>
                                    <td>

                                        <div class=''><a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm " href="hapus.php?id=<?= $enter["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus Pengguna ini ?');">
                                         <i class="glyphicon glyphicon-trash"></i>
                                            </a>

                                            
                                              </div>
                                    </td>
                                </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>                    
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="tambah-pengguna.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

