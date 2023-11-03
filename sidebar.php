<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="home.php" style="margin-bottom: -35px;padding-bottom: 97px;"><img src="img/logo-removebg-preview.png" width="111" height="110" style="padding-top: 0px;margin-top: 91px;">
      <div class="sidebar-brand-icon rotate-n-15"></div>
      <div class="sidebar-brand-text mx-3"><span></span></div>
      <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="<?= $baseURL ?>home.php" style="margin-top: -39px;margin-bottom: -22px;"><span style="padding-top: 0px;margin-top: 38px;">&nbsp;Barang</span>
        <div class="sidebar-brand-icon rotate-n-15"></div>
        <div class="sidebar-brand-text mx-3"><span style="margin-right: -116px;margin-left: -213px;">Si Pendataan</span></div>
      </a>


      <!-- Nav Item - Dashboard -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= $baseURL ?>home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <!-- Divider -->
      <div class="sidebar-heading">
        Data
      </div>
      <?php
      if ($_SESSION['level'] == "Admin") { ?>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Data</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= $baseURL ?>index.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Stock Barang</span></a>
              <a class="collapse-item" href="<?= $baseURL ?>masuk.php">
                <i class="fas fa-fw fa-table"></i>Data Barang Masuk</a>
              <a class="collapse-item" href="<?= $baseURL ?>keluar.php">
                <i class="fas fa-fw fa-table"></i>Data Barang Keluar</a>


            </div>
          </div>
        </li>


        <hr class="sidebar-divider">

        <div class="sidebar-heading">
          Data Pengguna
        </div>
        <li class="nav-item active">
          <a class="nav-link" href="<?= $baseURL ?>data.php">
            <i class="bi bi-people-fill"></i>
            <span>Data Pengguna</span></a>
        </li>

        <hr class="sidebar-divider">
      <?php } ?>
      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="bi bi-file-earmark-text"></i>
          <span><b>Laporan</b></span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= $baseURL ?>laporan/stock.php">
              <i class="bi bi-file-earmark-text"></i>
              <span> Data Stock Barang</span></a>
            <a class="collapse-item" href="<?= $baseURL ?>laporan/masuk.php">
              <i class="bi bi-file-earmark-text"></i> Data Barang Masuk</a>
            <a class="collapse-item" href="<?= $baseURL ?>laporan/keluar.php">
              <i class="bi bi-file-earmark-text"></i> Data Barang Keluar</a>
            <a class="collapse-item" href="<?= $baseURL ?>laporan/bulanan.php">
              <i class="bi bi-file-earmark-text"></i> Data Bulanan</a>
            <a class="collapse-item" href="<?= $baseURL ?>laporan/tahunan.php">
              <i class="bi bi-file-earmark-text"></i> Data Tahunan</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>
<!-- End of Sidebar -->