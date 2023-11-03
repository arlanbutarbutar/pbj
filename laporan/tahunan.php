<?php
require '../function.php';
require '../cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title><?php echo $_SESSION['level']; ?> - Laporan Tahunan</title>
    <link rel="shorcut icon" href="img/logo-removebg-preview.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .zoomable {
            width: 100px;
        }

        .zoomable:hover {
            transform: scale(1.8);
            transition: 0.5s ease;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once("../sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <!-- Topbar Search -->
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><img src="img/logo-removebg-preview.png" width="50" height="56" style="margin-top: 91px;padding-top: 0px;margin-bottom: 82px;">
                        <h3 class="text-dark mb-0" style="padding-right: 0px;margin-right: -579px;padding-left: 13px;">Si Pendataan Barang</h3>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?php echo $_SESSION['level']; ?></b></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Laporan Tahunan</h1>
                        <ul class="notification-area pull-right">
                            <h3>
                                <div class="date">
                                    <script type='text/javascript'>
                                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        var date = new Date();
                                        var day = date.getDate();
                                        var month = date.getMonth();
                                        var thisDay = date.getDay(),
                                            thisDay = myDays[thisDay];
                                        var yy = date.getYear();
                                        var year = (yy < 1000) ? yy + 1900 : yy;
                                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                    </script></b>
                                </div>
                            </h3>


                        </ul>
                    </div>

                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Tahunan</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <span style="font-size: 20px;color: #000;font-weight: bold;margin-left: 10px;">Data Stock</span>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tahunan_stock">
                                <i class="bi bi-printer-fill"> Cetak Laporan</i>
                            </button>
                            <div class="modal fade" id="tahunan_stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="export_tahunan_stock.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="year">Pilih Tahun yang mau dicetak</label>
                                                    <input type="number" name="year" value="2018" min="2018" minlength="4" class="form-control" id="year" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tgl Laporan</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Stock</th>
                                            <th>Jenis Barang</th>
                                            <th>Satuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM stock_barang");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {

                                            $nama_barang = $data['nama_barang'];
                                            $jumlah_seluruh = $data['jumlah_seluruh'];
                                            $jenis = $data['jenis'];
                                            $satuan = $data['satuan'];
                                            $id = $data['kode_stok'];


                                            // cek ada gambar atau tidak
                                            $gambar = $data['image'];
                                            if ($gambar == null) {
                                                //jida tidak ada gambar 
                                                $img = 'No Photo';
                                            } else {
                                                // jika ada gambar
                                                $img = '<img src="../images/' . $gambar . '" class="zoomable">';
                                            }


                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td>
                                                    <?php $dateCreate = date_create($data["created_at"]);
                                                    echo date_format($dateCreate, "d M Y h:i a"); ?>
                                                </td>
                                                <td><?= $img; ?></td>
                                                <td><?= $nama_barang; ?></td>
                                                <td><?= $jumlah_seluruh; ?></td>
                                                <td><?= $jenis; ?></td>
                                                <td><?= $satuan; ?></td>

                                            </tr>
                                        <?php
                                        };

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <span style="font-size: 20px;color: #000;font-weight: bold;margin-left: 10px;">Data Barang Masuk</span>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tahunan_masuk">
                                <i class="bi bi-printer-fill"> Cetak Laporan</i>
                            </button>
                            <div class="modal fade" id="tahunan_masuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="export_tahunan_masuk.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="year">Pilih Tahun yang mau dicetak</label>
                                                    <input type="number" name="year" value="2018" min="2018" minlength="4" class="form-control" id="year" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Tahun Produksi</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Jenis Barang</th>
                                            <th>Satuan</th>
                                            <th>Tgl Masuk</th>
                                            <th>Tgl Ubah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM barang_masuk m, stock_barang s WHERE s.kode_stok = m.kode_stok");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $id = $data['kode_stok'];
                                            $kode_barang = $data['kode_barang'];
                                            $nama_barang = $data['nama_barang'];
                                            $jumlah_barang = $data['jumlah_barang'];
                                            $jenis = $data['jenis'];
                                            $satuan = $data['satuan'];
                                            $thn_produksi = $data['thn_produksi'];
                                            $tgl_masuk = $data['tgl_masuk'];

                                            // cek ada gambar atau tidak
                                            $gambar = $data['image'];
                                            if ($gambar == null) {
                                                //jida tidak ada gambar 
                                                $img = 'No Photo';
                                            } else {
                                                // jika ada gambar
                                                $img = '<img src="../images/' . $gambar . '" class="zoomable">';
                                            }



                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $img; ?></td>
                                                <td><?= $nama_barang; ?></td>
                                                <td><?= $jumlah_barang; ?></td>
                                                <td><?= $thn_produksi; ?></td>
                                                <td><?php $tgl_masuk = $data['tgl_masuk'];
                                                    echo date("d-M-Y", strtotime($tgl_masuk)) ?></td>
                                                <td><?= $jenis; ?></td>
                                                <td><?= $satuan; ?></td>
                                                <td>
                                                    <div class="badge badge-success">
                                                        <?php $dateCreate = date_create($data["created_at"]);
                                                        echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="badge badge-warning">
                                                        <?php $dateUpdate = date_create($data["updated_at"]);
                                                        echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php
                                        };

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <span style="font-size: 20px;color: #000;font-weight: bold;margin-left: 10px;">Data Barang Keluar</span>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tahunan_keluar">
                                <i class="bi bi-printer-fill"> Cetak Laporan</i>
                            </button>
                            <div class="modal fade" id="tahunan_keluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="export_tahunan_keluar.php" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="year">Pilih Tahun yang mau dicetak</label>
                                                    <input type="number" name="year" value="2018" min="2018" minlength="4" class="form-control" id="year" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Penerima</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Jenis</th>
                                            <th>Satuan</th>
                                            <th>Tgl Masuk</th>
                                            <th>Tgl Ubah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $ambilsemuadatastock = mysqli_query($conn, "SELECT * FROM barang_keluar k, stock_barang s WHERE s.kode_stok = k.kode_stok");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $id = $data['kode_stok'];
                                            $kode_keluar = $data['kode_keluar'];
                                            $nama_barang = $data['nama_barang'];
                                            $jumlah_keluar = $data['jumlah_keluar'];
                                            $jenis = $data['jenis'];
                                            $satuan = $data['satuan'];
                                            $pengguna = $data['pengguna'];
                                            $tgl_masuk = $data['tgl_keluar'];

                                            // cek ada gambar atau tidak
                                            $gambar = $data['image'];
                                            if ($gambar == null) {
                                                //jida tidak ada gambar 
                                                $img = 'No Photo';
                                            } else {
                                                // jika ada gambar
                                                $img = '<img src="../images/' . $gambar . '" class="zoomable">';
                                            }

                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $img; ?></td>
                                                <td><?= $nama_barang; ?></td>
                                                <td><?= $jumlah_keluar; ?></td>
                                                <td><?= $pengguna; ?></td>
                                                <td><?php $tgl_keluar = $data['tgl_keluar'];
                                                    echo date("d-M-Y", strtotime($tgl_keluar)) ?></td>
                                                <td><?= $jenis; ?></td>
                                                <td><?= $satuan; ?></td>
                                                <td>
                                                    <div class="badge badge-success">
                                                        <?php $dateCreate = date_create($data["created_at"]);
                                                        echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="badge badge-warning">
                                                        <?php $dateUpdate = date_create($data["updated_at"]);
                                                        echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        };

                                        ?>
                                    </tbody>
                                </table>
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
                        <span>Copyright &copy; SI Pendataan Barang Biro PBJ 2023</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave <b> <?php echo $_SESSION['level']; ?></b>?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <?php

    // Query untuk mengambil data
    $query1 = "SELECT DATE_FORMAT(created_at, '%Y') AS tahun, SUM(jumlah_seluruh) AS total_barang FROM stock_barang GROUP BY created_at";

    $result1 = mysqli_query($conn, $query1);
    $data_stok = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        $data_stok[$row['tahun']] = $row['total_barang'];
    }

    // Query untuk mengambil data
    $query2 = "SELECT DATE_FORMAT(created_at, '%Y') AS tahun, SUM(jumlah_barang) AS total_barang FROM barang_masuk GROUP BY created_at";

    $result2 = mysqli_query($conn, $query2);
    $data_masuk = array();
    while ($row = mysqli_fetch_assoc($result2)) {
        $data_masuk[$row['tahun']] = $row['total_barang'];
    }

    // Query untuk mengambil data
    $query3 = "SELECT DATE_FORMAT(created_at, '%Y') AS tahun, SUM(jumlah_keluar) AS total_barang FROM barang_keluar GROUP BY created_at";

    $result3 = mysqli_query($conn, $query3);
    $data_keluar = array();
    while ($row = mysqli_fetch_assoc($result3)) {
        $data_keluar[$row['tahun']] = $row['total_barang'];
    }
    ?>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Data dari PHP
        var tahunanData = <?php echo json_encode($data_stok); ?>;
        var tahunanMasuk = <?php echo json_encode($data_masuk); ?>;
        var tahunanKeluar = <?php echo json_encode($data_keluar); ?>;
        var tahunanLabels = Object.keys(tahunanData);

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: tahunanLabels,
                datasets: [{
                        label: "Jumlah Stok Barang: ",
                        lineTension: 0.3,
                        backgroundColor: "rgba(3, 118, 211, 0.7)",
                        borderColor: "rgba(3, 118, 211, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(3, 118, 211, 1)",
                        pointBorderColor: "rgba(3, 118, 211, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(3, 118, 211, 1)",
                        pointHoverBorderColor: "rgba(3, 118, 211, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: Object.values(tahunanData),
                    },
                    {
                        label: "Jumlah Barang Masuk: ",
                        lineTension: 0.3,
                        backgroundColor: "rgba(224, 214, 9, 0.7)",
                        borderColor: "rgba(224, 214, 9, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(224, 214, 9, 1)",
                        pointBorderColor: "rgba(224, 214, 9, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(224, 214, 9, 1)",
                        pointHoverBorderColor: "rgba(224, 214, 9, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: Object.values(tahunanMasuk),
                    },
                    {
                        label: "Jumlah Barang Keluar: ",
                        lineTension: 0.3,
                        backgroundColor: "rgba(211, 9, 3, 0.7)",
                        borderColor: "rgba(211, 9, 3, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(211, 9, 3, 1)",
                        pointBorderColor: "rgba(211, 9, 3, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(211, 9, 3, 1)",
                        pointHoverBorderColor: "rgba(211, 9, 3, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: Object.values(tahunanKeluar),
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $("#dataTable").DataTable();
            $("#dataTable1").DataTable();
            $("#dataTable2").DataTable();
            $("#dataTable3").DataTable();
        });
    </script>
</body>

</html>