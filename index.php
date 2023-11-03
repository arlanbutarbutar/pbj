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
                        <h1 class="h3 mb-0 text-gray-800">Data Stock Barang</h1>
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
                                Tambah Stock Barang
                            </button>
                        </div>
                        <div class="card-body">

                            <?php
                            $ambildatastock = mysqli_query($conn, "SELECT * FROM stock_barang where jumlah_seluruh < 1");

                            while ($fetch = mysqli_fetch_array($ambildatastock)) {

                                $barang = $fetch['nama_barang'];


                            ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Perhatian!</strong> Stock <?= $barang; ?> Telah Habis
                                </div>

                            <?php
                            }
                            ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Stock</th>
                                            <th>Jenis Barang</th>
                                            <th>Satuan</th>
                                            <th>Tools</th>
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
                                                $img = '<img src="images/' . $gambar . '" class="zoomable">';
                                            }

                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <!-- <td><?= $img; ?></td> -->
                                                <td><?= $nama_barang; ?></td>
                                                <td><?= $jumlah_seluruh; ?></td>
                                                <td><?= $jenis; ?></td>
                                                <td><?= $satuan; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tracking<?= $id; ?>">
                                                                <i class="fas fa-search-location"></i> Tracking
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $id; ?>">
                                                                <i class="fa fa-edit"></i> <br> Ubah
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $id; ?>">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="tracking<?= $id; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-dark">Tracking Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <?php $kode_stok = $data['kode_stok'];
                                                            $tracking = "SELECT * FROM tracking JOIN barang_keluar ON tracking.id_keluar=barang_keluar.kode_keluar WHERE tracking.id_stock='$kode_stok'";
                                                            $view_tracking = mysqli_query($conn, $tracking);
                                                            if (mysqli_num_rows($view_tracking) > 0) { ?>
                                                                <ul>
                                                                    <?php while ($data_tracking = mysqli_fetch_assoc($view_tracking)) { ?>
                                                                        <li>
                                                                            <p class="text-dark"><?= $data_tracking['pengguna'] . ' (' . $data_tracking['jumlah_keluar'] . ')' ?></p>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } else { ?>
                                                                <p>Belum ada data keluar</p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $id; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Data Stock</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="text" name="nama_barang" value="<?= $nama_barang; ?>" class="form-control" required>
                                                                <br>
                                                                <select name="jenis" class="form-control" placeholder="jenis" required>
                                                                    <option values=""><?= $jenis; ?></option>
                                                                    <option values="">Barang Jangka Panjang</option>
                                                                    <option values="">Barang Habis Pakai</option>
                                                                </select>
                                                                <br>
                                                                <select name="satuan" class="form-control" placeholder="satuan" required>
                                                                    <option values=""><?= $satuan; ?></option>
                                                                    <option values="">Unit</option>
                                                                    <option values="">Dos</option>
                                                                    <option values="">Pack</option>
                                                                    <option values="">Box</option>
                                                                </select>
                                                                <br>
                                                                <input type="file" name="file" class="form-control">
                                                                <br>
                                                                <input type="hidden" name="id" value="<?= $id; ?>">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" name="updatebarang">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                            </div>


                            <!-- Delete Modal -->
                            <div class="modal fade" id="delete<?= $id; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus <?= $nama_barang; ?>?
                                                <input type="hidden" name="id" value="<?= $id; ?>">
                                                <br>
                                                <br>
                                                <button type="submit" class="btn btn-danger" name="hapusbarang"><i class="bi bi-x-circle"></i> Hapus</button>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>


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
                <h4 class="modal-title">Tambah Stock Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" required>
                    <br>
                    <input type="number" name="jumlah_seluruh" class="form-control" placeholder="Stock" required>
                    <br>
                    <select name="jenis" class="form-control" placeholder="Jenis" required>
                        <option values="">- Jenis Barang -</option>
                        <option values="">Barang Jangka Panjang</option>
                        <option values="">Barang Habis Pakai</option>
                    </select>
                    <br>
                    <select name="satuan" class="form-control" required>
                        <option values="">- Satuan Barang -</option>
                        <option values="">Unit</option>
                        <option values="">Dos</option>
                        <option values="">Pack</option>
                        <option values="">Box</option>
                    </select>
                    <br>
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="bi bi-x-square"></i> Close</button>
                    <button type="submit" class="btn btn-success" name="addnewbarang"><i class="bi bi-save"></i> Save</button>
                </div>
            </form>

        </div>
    </div>
    <?php require_once("footer.php") ?>
</div>

</html>