<!DOCTYPE html>
<html lang="en">
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
?>
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
              <li class="sidebar-item active">
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
          <h2 class="mt-3">&nbsp&nbsp&nbspData Alat</h2>
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
                  <div class="d-none d-md-block d-lg-inline-block txt-1-25"><?php echo $nama_akun ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <form method="post" action="akun_edit.php">
                    <button class="dropdown-item" type="submit" name="akun" value="akun"><i data-feather="user"></i> Akun</button>
                  </form>
                  <div class="dropdown-divider"></div>
                  <form method="post" action="index_alat.php">
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
              <h3 class="">List Data Alat</h3>
          </div>
          <section class="section">
          <div class="card ms-4 mt-1 me-4">
              <div class="card-body mt-2">
                <table class='table table-striped' id="table1">
                  <thead>
                    <tr>
                      <th>ID Alat</th>
                      <th>IP Alat</th>
                      <th>Nama Alat</th>
                      <th>Lokasi Alat</th>
                      <th>SSID</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $data1 = mysqli_query($koneksi, "SELECT * FROM alat order BY id_alat ASC");
                    $cek1 = mysqli_num_rows($data1);
                    $no = 0;
                    if($cek1 > 0){
                      while ($row1 = $data1->fetch_assoc()){
                        $no++;
                  ?>
                        <tr>
                          <td><?php echo $row1["id_alat"];?></td>
                          <td><?php echo $row1["ip_alat"];?></td>
                          <td><?php echo $row1["nama_alat"];?></td>
                          <td><?php echo $row1["lokasi_alat"];?></td>
                          <td><?php echo $row1["ssid"];?></td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-gear-fill"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <form method="post" action="alat_edit.php">
                                  <button class="dropdown-item" type="submit" name="id_alat" value="<?php echo $row1["id_alat"]; ?>"><i class="bi bi-pencil pe-2"></i>Edit</button>
                                </form>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="alat_hapus.php">
                                  <button class="dropdown-item" type="submit" name="id_alat" value="<?php echo $row1["id_alat"];?>"><i class="bi bi-trash pe-2"></i>Hapus</button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                  <?php 
                      }
                    }
                  ?>
                  </tbody>
                </table>
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
