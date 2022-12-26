<?php
  session_start();
  include 'koneksi.php';

  if(isset($_SESSION["id_akun"])){
    $id_akun = $_SESSION["id_akun"];
    $nama_akun = $_SESSION["nama_akun"];
  } else{
    header("Location:index.php");
  }

  if(isset($_POST["logout"])){
    session_start();
    session_destroy();
    header("Location:index.php");
  }

  $data1 = mysqli_query($koneksi, "SELECT * FROM akun where id_akun='$id_akun'");
  $cek1 = mysqli_num_rows($data1);
  if($cek1 > 0){
    while ($row1 = $data1->fetch_assoc()){
      $username = $row1["username"];
      $password = $row1["password"];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css"/>
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
<body>
    <div id="app">
      <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
          <div class="sidebar-header">
            PT.XYZ
          </div>

            <!-- MENU -->
          <div class="sidebar-menu">
            <ul class="menu">  
              <li class='sidebar-title'>Main Menu</li>
              <li class="sidebar-item">
                <a href="index_absen.php" class='sidebar-link'>
                <i data-feather="check-square" width="20"></i> 
                <span>Absensi</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="index_pegawai.php" class='sidebar-link'>
                <i data-feather="users" width="20"></i> 
                <span>Data Pegawai</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="index_alat.php" class='sidebar-link'>
                <i data-feather="tool" width="20"></i> 
                <span>Data Alat</span>
                </a>
              </li>
            </ul>
          </div>
        <!-- END MENU -->
          <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
      </div>
      <div id="main">
        <nav class="navbar navbar-header navbar-expand navbar-light">
          <!-- <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a> -->
          <a class="sidebar-toggler mt-2" href="#"><i data-feather="menu" style="width: 34px; height: 34px;"></i> </a>
          <h2 class="mt-3">&nbsp&nbsp&nbspAkun</h2>
          <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
              <li class="dropdown pe-4">
                <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                  <div class="avatar me-1">
                    <img src="assets/images/user.png" alt="" srcset="">
                  </div>
                  <div class="d-none d-md-block d-lg-inline-block txt-1-25"><?php echo $nama_akun;?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <form method="post" action="akun_edit.php">
                    <button class="dropdown-item" type="submit" name="akun" value="akun"><i data-feather="user"></i> Akun</button>
                  </form>
                  <div class="dropdown-divider"></div>
                  <form method="post" action="index_pegawai.php">
                    <button class="dropdown-item" type="submit" name="logout" value="logout"><i data-feather="log-out"></i> Logout</button>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </nav>
            <!-- ISI -->
        <div class="main-content container-fluid">
          <div class="page-title ms-5 mt-3">
              <h4 class="">Akun Anda</h4>
          </div>
          <section class="section">
            <div class="card ms-4 mt-2 me-4">
              <div class="card-body mt-3">
                <form method="post" class="form form-horizontal" action="akun_edit_proses.php">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4 mt-2 ps-md-6 text-dark">
                        <label>Nama Akun</label>
                      </div>
                      <div class="col-md-8 form-group pe-md-6">
                        <input type="text" class="form-control" name="nama_akun" placeholder="Masukkan Nama Akun Anda" value="<?php echo $nama_akun;?>">
                      </div>
                      <div class="col-md-4 mt-2 ps-md-6 text-dark">
                        <label>Username</label>
                      </div>
                      <div class="col-md-8 form-group pe-md-6">
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" value="<?php echo $username;?>">
                      </div>
                      <div class="col-md-4 mt-2 ps-md-6 text-dark">
                        <label>Password</label>
                      </div>
                      <div class="col-md-8 form-group pe-md-6">
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda" value="<?php echo $password;?>">
                      </div>
                      <div class="col-sm-12 d-flex justify-content-end pe-md-6 mt-3">
                        <button type="submit" class="btn btn-tema me-1 mb-1">Simpan</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      <!-- END ISI -->
      </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/vendors.js"></script>

    <script src="assets/js/main.js"></script>
</body>
</html>
