<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once("header.php") ?>

</head>

<body id="page-top">
    <?php if (isset($_SESSION["message-success"])) { ?>
        <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
    <?php }
    if (isset($_SESSION["message-info"])) { ?>
        <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
    <?php }
    if (isset($_SESSION["message-warning"])) { ?>
        <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
    <?php }
    if (isset($_SESSION["message-danger"])) { ?>
        <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
    <?php } ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once("sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

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
                        <h1 class="h3 mb-0 text-gray-800">Data Barang Keluar</h1>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                <i class="bi bi-plus-circle-fill"></i>
                                Tambah Barang Keluar
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                            <th style="width: 10%">Tools</th>
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
                                                $img = '<img src="images/' . $gambar . '" class="zoomable">';
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
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $kode_keluar; ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $kode_keluar; ?>">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $kode_keluar; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Barang Keluar</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang'] ?>  Stock (<?php echo $data['jumlah_seluruh'] ?>) Jenis (<?php echo $data['jenis'] ?>)" disabled>
                                                                <br>
                                                                <input type="number" name="jumlah_keluar" value="<?= $jumlah_keluar; ?>" class="form-control" required>
                                                                <br>
                                                                <input type="date" id="tgl_keluar" name="tgl_keluar" class="form-control" value="<?php echo $data['tgl_keluar'] ?>">
                                                                <br>
                                                                <select name="pengguna" class="form-control" placeholder="Penerima" required>
                                                                    <option values=""><?= $pengguna; ?></option>
                                                                    <option values="Biro Umum">Biro Umum</option>
                                                                    <option values="Biro Hubungan Masyarakat">Biro Hubungan Masyarakat</option>
                                                                    <option values="Biro Hukum">Biro Hukum</option>
                                                                    <option values="Biro Kerjasama">Biro Kerjasama</option>
                                                                    <option values="Biro Kesejahteraan Rakyat">Biro Kesejahteraan Rakyat</option>
                                                                    <option values="Biro Organisasi">Biro Organisasi</option>
                                                                    <option values="Biro Pemerintahan">Biro Pemerintahan</option>
                                                                    <option values="Biro Pengadaan Barang dan Jasa">Biro Pengadaan Barang dan Jasa</option>
                                                                    <option values="Biro Perekonomian">Biro Perekonomian</option>
                                                                </select>


                                                                <input type="hidden" name="id" value="<?= $id; ?>">
                                                                <input type="hidden" name="kode_keluar" value="<?= $kode_keluar; ?>">
                                                                <br>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" name="updatebarangkeluar">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                            </div>


                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete<?= $kode_keluar; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Barang Keluar</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus <?= $nama_barang; ?>?
                                                <input type="hidden" name="id" value="<?= $id; ?>">
                                                <input type="hidden" name="kode_keluar" value="<?= $kode_keluar; ?>">
                                                <input type="hidden" name="jumlah_keluar" value="<?= $jumlah_keluar; ?>">
                                                <br>
                                                <br>
                                                <button type="submit" class="btn btn-danger" name="hapusbarangkeluar">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                <span>Copyright &copy; Si Pendataan Barang Biro PBJ 2023</span>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang Keluar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <select name="barangnya" class="form-control">
                        <?php
                        $ambilsemuadatanya = mysqli_query($conn, "SELECT * from stock_barang");
                        while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                            $nama_barang = $fetcharray['nama_barang'];
                            $kode_stok = $fetcharray['kode_stok'];
                            $jumlah_seluruh = $fetcharray['jumlah_seluruh'];
                            $tgl_masuk = $fetcharray['tgl_keluar'];

                        ?>

                            <option value="<?= $kode_stok; ?>"><?= $nama_barang; ?> (Id: <?= $kode_stok; ?> Stock: <?= $jumlah_seluruh; ?>)</option>

                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <input type="number" name="jumlah_keluar" class="form-control" placeholder="Jumlah Barang Yang Keluar" required>
                    <br>
                    <div class="form-group">
                        <input name="tgl_keluar" type="date" class="form-control">
                        </br>
                        <select name="pengguna" class="form-control" placeholder="Penerima" required>
                            <option values="">- Penerima -</option>
                            <option values="Biro Umum">Biro Umum</option>
                            <option values="Biro Hubungan Masyarakat">Biro Hubungan Masyarakat</option>
                            <option values="Biro Hukum">Biro Hukum</option>
                            <option values="Biro Kerjasama">Biro Kerjasama</option>
                            <option values="Biro Kesejahteraan Rakyat">Biro Kesejahteraan Rakyat</option>
                            <option values="Biro Organisasi">Biro Organisasi</option>
                            <option values="Biro Pemerintahan">Biro Pemerintahan</option>
                            <option values="Biro Pengadaan Barang dan Jasa">Biro Pengadaan Barang dan Jasa</option>
                            <option values="Biro Perekonomian">Biro Perekonomian</option>
                        </select>
                        <br>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="bi bi-x-square"></i> Close</button>
                        <button type="submit" class="btn btn-success" name="addbarangkeluar"><i class="bi bi-save"></i> Save</button>
                    </div>
            </form>

        </div>
    </div>
    <?php require_once("footer.php") ?>
</div>

</html>