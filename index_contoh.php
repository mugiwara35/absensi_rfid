<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
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
                <li class="sidebar-item active ">
                <a href="index.php" class='sidebar-link'>
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
                <h2 class="mt-3">&nbsp&nbsp&nbspAbsensi</h2>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <!-- ISI -->
            <div class="main-content container-fluid">
                <div class="page-title ms-5 mt-3">
                    <h3 class="">Hasil Rekap Absensi Karyawan Anda</h3>
                </div>
                <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Dale</td>
                            <td>fringilla.euismod.enim@quam.ca</td>
                            <td>0500 527693</td>
                            <td>New Quay</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathaniel</td>
                            <td>mi.Duis@diam.edu</td>
                            <td>(012165) 76278</td>
                            <td>Grumo Appula</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Darius</td>
                            <td>velit@nec.com</td>
                            <td>0309 690 7871</td>
                            <td>Ways</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Oleg</td>
                            <td>rhoncus.id@Aliquamauctorvelit.net</td>
                            <td>0500 441046</td>
                            <td>Rossignol</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kermit</td>
                            <td>diam.Sed.diam@anteVivamusnon.org</td>
                            <td>(01653) 27844</td>
                            <td>Patna</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Jermaine</td>
                            <td>sodales@nuncsit.org</td>
                            <td>0800 528324</td>
                            <td>Mold</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Ferdinand</td>
                            <td>gravida.molestie@tinciduntadipiscing.org</td>
                            <td>(016977) 4107</td>
                            <td>Marlborough</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kuame</td>
                            <td>Quisque.purus@mauris.org</td>
                            <td>(0151) 561 8896</td>
                            <td>Tresigallo</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Deacon</td>
                            <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                            <td>07740 599321</td>
                            <td>Karapınar</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Channing</td>
                            <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                            <td>0845 46 49</td>
                            <td>Warrnambool</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Aladdin</td>
                            <td>sem.ut@pellentesqueafacilisis.ca</td>
                            <td>0800 1111</td>
                            <td>Bothey</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Cruz</td>
                            <td>non@quisturpisvitae.ca</td>
                            <td>07624 944915</td>
                            <td>Shikarpur</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Keegan</td>
                            <td>molestie.dapibus@condimentumDonecat.edu</td>
                            <td>0800 200103</td>
                            <td>Assen</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Ray</td>
                            <td>placerat.eget@sagittislobortis.edu</td>
                            <td>(0112) 896 6829</td>
                            <td>Hofors</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxwell</td>
                            <td>diam@dapibus.org</td>
                            <td>0334 836 4028</td>
                            <td>Thane</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Carter</td>
                            <td>urna.justo.faucibus@orci.com</td>
                            <td>07079 826350</td>
                            <td>Biez</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Stone</td>
                            <td>velit.Aliquam.nisl@sitametrisus.com</td>
                            <td>0800 1111</td>
                            <td>Olivar</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Berk</td>
                            <td>fringilla.porttitor.vulputate@taciti.edu</td>
                            <td>(0101) 043 2822</td>
                            <td>Sanquhar</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Philip</td>
                            <td>turpis@euenimEtiam.org</td>
                            <td>0500 571108</td>
                            <td>Okara</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kibo</td>
                            <td>feugiat@urnajustofaucibus.co.uk</td>
                            <td>07624 682306</td>
                            <td>La Cisterna</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Bruno</td>
                            <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                            <td>07624 869434</td>
                            <td>Rocca d'Arce</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Leonard</td>
                            <td>blandit.enim.consequat@mollislectuspede.net</td>
                            <td>0800 1111</td>
                            <td>Lobbes</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Hamilton</td>
                            <td>mauris@diam.org</td>
                            <td>0800 256 8788</td>
                            <td>Sanzeno</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Harding</td>
                            <td>Lorem.ipsum.dolor@etnetuset.com</td>
                            <td>0800 1111</td>
                            <td>Obaix</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Emmanuel</td>
                            <td>eget.lacus.Mauris@feugiatSednec.org</td>
                            <td>(016977) 8208</td>
                            <td>Saint-Remy-Geest</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
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
