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

  if(isset($_POST["tanggal"])){
    $tanggal = $_POST["tanggal"];
    $_SESSION['tanggal'] = $tanggal;
  }else{
    $tanggal = $_SESSION["tanggal"];
  }

  $data1 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pegawai");

  $hasil1 = mysqli_fetch_assoc($data1);
  $total1 = $hasil1["total"];

  $data2 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM absensi WHERE tanggal='$tanggal'");
  $hasil2 = mysqli_fetch_assoc($data2);
  $hadir = $hasil2["total"];

  $belum_hadir = $total1 - $hadir;
  $persen = round(($hadir/$total1) * 100, 2);
  // echo $hadir;
  // echo $belum_hadir;
  // echo $persen."%";
  // die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/datepicker/css/datepicker.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css"/>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css"/>
    <script src="assets/js/jquery-3.4.1.js"></script>
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <script src="assets/js/config.js"></script>
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
              <li class="sidebar-item active ">
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
        <!-- NAV BAR -->
        <nav class="navbar navbar-header navbar-expand navbar-light">
          <!-- <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a> -->
          <a class="sidebar-toggler mt-2" href="#"><i data-feather="menu" style="width: 34px; height: 34px;"></i> </a>
          <h2 class="mt-3">&nbsp&nbsp&nbspAbsensi</h2>
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
                  <form method="post" action="index_absen.php">
                    <button class="dropdown-item" type="submit" name="logout" value="logout"><i data-feather="log-out"></i> Logout</button>
                  </form>
                  </div>
              </li>
            </ul>
          </div>
        </nav>
        <!-- END NAV BAR -->
            <!-- ISI -->
        <div class="main-content container-fluid">
          <div class="page-title ms-5 mt-3">
              <h3 class="">Hasil Rekap Absensi Karyawan</h3>
          </div>
          <section class="section">
            <div class="card ms-4 mt-1 me-4">
              <div class="card-body mt-2">
                <form method="post" action="#" class="form form-horizontal">
                  <div class="row pb-3">
                    <div class="col-7 col-md-5">
                      <div class="form-group">
                        <label class="text-dark">Tanggal :</label>
                        <input type="text"  name="tanggal" value="<?php echo $tanggal;?>"  class="form-control datepicker" autocomplete="off" required/>
                        <!-- <input type="date" class="form-control"> -->
                      </div>
                    </div>
                    <div class="col-3 col-md-6 pt-1-7">
                      <button class="btn btn-info">Pilih</button>
                    </div>
                  </div>
                </form>
                <table class='table table-striped' id="table1">
                  <thead>
                    <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Kelas Jabatan</th>
                      <th>Nama Alat</th>
                      <th>Status</th>
                      <th>Waktu Tap</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $data1 = mysqli_query($koneksi, "SELECT pegawai.nip, pegawai.nama, pegawai.kelas_jabatan, absensi.waktu, alat.nama_alat FROM pegawai LEFT JOIN absensi on pegawai.nip=absensi.nip and absensi.tanggal='$tanggal' left JOIN alat on absensi.id_alat = alat.id_alat ");
                    $cek1 = mysqli_num_rows($data1);
                    $no = 0;
                    if($cek1 > 0){
                      while ($row1 = $data1->fetch_assoc()){
                        $no++;
                  ?>
                    <tr>
                      <td><?php echo $row1["nip"];?></td>
                      <td><?php echo $row1["nama"];?></td>
                      <td><?php echo $row1["kelas_jabatan"];?></td>
                      <?php
                      if($row1["waktu"] == null){
                      ?>
                      <td>-</td>
                      <td>
                        <span class="badge bg-danger">Belum Hadir</span>
                      </td>
                      <td>-</td>
                    <?php
                      } else{ ?>
                      <td><?php echo $row1["nama_alat"];?></td>
                      <td>
                        <span class="badge bg-success">Hadir</span>
                      </td>
                      <td><?php echo $row1["waktu"];?></td>
                    <?php  }
                    ?>
                    </tr>
                  <?php 
                      }
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- CHART -->
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="page-title ms-5 mt-3">
                  <h3 class="">Persentase Kehadiran</h3>
                </div>
                <div class="card ms-4 mt-1">
                  <div class="card-body mt-2">
                    <div class="row border-bottom pb-2">
                      <div class="col-12 col-lg-7 col-xl-6">
                        <div id="orderStatisticsChart1" align="center"></div>
                      </div>
                      <div class="col-12 col-lg-5 col-xl-6">
                        <div class="legends ms-2">
                          <div class="legend d-flex flex-row align-items-center mt-3">
                            <div class='w-3 h-3 rounded-full bg-success me-2'></div><span class='text-xs'>Hadir</span>
                          </div>
                          <div class="legend d-flex flex-row align-items-center mt-2">
                            <div class='w-3 h-3 rounded-full bg-danger me-2'></div><span class='text-xs'>Tidak Hadir</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <!-- <div class="col-12 col-lg-7 col-xl-6 text-center"> -->
                      <div class="col-12 text-center">
                        <span>Jumlah Pegawai:</span><br>   
                        <h4><?php echo $total1;?></h4>
                      </div>
                      <!-- <div class="col-12 col-lg-7 col-xl-6">
                        bagian2
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-12 col-lg-6">
                <div class="page-title ms-4 mt-3">
                  <h3 class="">Waktu Kedatangan</h3>
                </div>
                <div class="card mt-1 me-4">
                  <div class="card-body mt-2">
                    <div class="row">

                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </section>
        </div>
      <!-- END ISI -->
      </div>
    </div>
    <script type="text/javascript">
      $(function(){
        $(".datepicker").datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
        });
      });
    </script>
    
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/vendors.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/dashboards-analytics.js"></script>

    <script>
      let cardColor, headingColor, axisColor, shadeColor, borderColor;

      cardColor = config.colors.white;
      headingColor = config.colors.headingColor;
      axisColor = config.colors.axisColor;
      borderColor = config.colors.borderColor;

      const chartOrderStatistics1 = document.querySelector('#orderStatisticsChart1'),
      orderChartConfig1 = {
        chart: {
          height: 175,
          width: 140,
          type: 'donut'
        },
        labels: ['Hadir', 'Belum Hadir'],
        series: [ <?php echo $hadir;?>, <?php echo $belum_hadir;?>],
        // labels: ['Electronic', 'Sports', 'Decor', 'Fashion'],
        // series: [85, 15, 50, 50],
        colors: [config.colors.success, config.colors.danger],
        stroke: {
          width: 5,
          colors: cardColor
        },
        dataLabels: {
          enabled: false,
          formatter: function (val, opt) {
            return parseInt(val);
          }
        },
        legend: {
          show: false
        },
        grid: {
          padding: {
            top: 0,
            bottom: 0,
            right: 15
          }
        },
        plotOptions: {
          pie: {
            donut: {
              size: '75%',
              labels: {
                show: true,
                value: {
                  fontSize: '1.5rem',
                  fontFamily: 'Public Sans',
                  color: headingColor,
                  offsetY: -15,
                  formatter: function (val) {
                    return parseInt(val);
                  }
                },
                name: {
                  offsetY: 20,
                  fontFamily: 'Public Sans'
                },
                total: {
                  show: true,
                  fontSize: '0.8125rem',
                  color: axisColor,
                  label: 'Kehadiran',
                  formatter: function (w) {
                    // return  echo $persen;?>;
                    return <?php echo $persen;?> + '%';
                  }
                }
              }
            }
          }
        }
      };
    if (typeof chartOrderStatistics1 !== undefined && chartOrderStatistics1 !== null) {
      const statisticsChart1 = new ApexCharts(chartOrderStatistics1, orderChartConfig1);
      statisticsChart1.render();
    }
    </script>
</body>
</html>
