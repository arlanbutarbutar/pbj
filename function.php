<?php
session_start();
// koneksi
$conn = mysqli_connect("localhost", "root", "", "pbj");

// Alert
if (isset($_SESSION["time-message"])) {
  if ((time() - $_SESSION["time-message"]) > 2) {
    if (isset($_SESSION["message-success"])) {
      unset($_SESSION["message-success"]);
    }
    if (isset($_SESSION["message-info"])) {
      unset($_SESSION["message-info"]);
    }
    if (isset($_SESSION["message-warning"])) {
      unset($_SESSION["message-warning"]);
    }
    if (isset($_SESSION["message-danger"])) {
      unset($_SESSION["message-danger"]);
    }
    if (isset($_SESSION["message-dark"])) {
      unset($_SESSION["message-dark"]);
    }
    unset($_SESSION["time-alert"]);
  }
}

$baseURL = "http://$_SERVER[HTTP_HOST]/";

//menambat stock barang baru
if (isset($_POST['addnewbarang'])) {
  $nama_barang = $_POST['nama_barang'];
  $jumlah_seluruh = $_POST['jumlah_seluruh'];
  $jenis = $_POST['jenis'];
  $satuan = $_POST['satuan'];

  //gambar
  $allowed_extension = array('png', 'jpg');
  $nama = $_FILES['file']['name'];
  $dot = explode('.', $nama);
  $ekstensi = strtolower(end($dot));
  $ukuran = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];

  //penamaan file -> enkripsi
  $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;


  //validasi barang sudah ada atau belum barangnya

  $cek = mysqli_query($conn, "SELECT * FROM stock_barang where nama_barang='$nama_barang'");
  $hitung = mysqli_num_rows($cek);

  if ($hitung < 1) {



    // proses uplode gambar
    if (in_array($ekstensi, $allowed_extension) === true) {

      //validasi ukuran file
      if ($ukuran < 15000000) {
        move_uploaded_file($file_tmp, 'images/' . $image);


        $addtotable = mysqli_query($conn, "INSERT into stock_barang (nama_barang, jumlah_seluruh, jenis, satuan, image) values('$nama_barang', '$jumlah_seluruh', '$jenis', '$satuan', '$image')");
        if ($addtotable) {
          $_SESSION["message-success"] = "Barang berhasil ditambahkan ke stok";
          $_SESSION["time-message"] = time();
          header("Location: index.php");
          exit();
        } else {
          $_SESSION["message-warning"] = "Maaf, barang belum berhasil ditambahkan ke stok";
          $_SESSION["time-message"] = time();
          header("Location: " . $_SESSION["page-url"]);
          exit();
        }
      } else {
        //kalau file lebih dari 15mb
        $_SESSION["message-warning"] = "Maaf, ukuran file gambar terlalu besar";
        $_SESSION["time-message"] = time();
        header("Location: index.php");
        exit();
      }
    } else {
      // file tidak png/jpg
      $_SESSION["message-warning"] = "Maaf, file gambar harus PNG/JPG";
      $_SESSION["time-message"] = time();
      header("Location: index.php");
      exit();
    };
  } else {
    // Jika Barang Sudah Ada
    $_SESSION["message-danger"] = "Maaf, nama barang sudah terdaftar";
    $_SESSION["time-message"] = time();
    header("Location: index.php");
    exit();
  };
};

//Menambah Barang Masuk
if (isset($_POST['barangmasuk'])) {
  $barangnya = $_POST['barangnya'];
  $jumlah_barang = $_POST['jumlah_barang'];
  $thn_produksi = $_POST['thn_produksi'];
  $tgl_masuk = $_POST['tgl_masuk'];

  $cekstocksekarang = mysqli_query($conn, "SELECT * from stock_barang where kode_stok='$barangnya'");
  $ambildatanya = mysqli_fetch_array($cekstocksekarang);

  $stocksekarang = $ambildatanya['jumlah_seluruh'];
  $tambahkanstockdenganjumlahbarang =  $stocksekarang + $jumlah_barang;

  $addtomasuk = mysqli_query($conn, "INSERT into barang_masuk (`kode_stok`,`jumlah_barang`,`thn_produksi`,`tgl_masuk`) values('$barangnya','$jumlah_barang','$thn_produksi','$tgl_masuk')");
  $updatestockmasuk = mysqli_query($conn, "UPDATE stock_barang set jumlah_seluruh	='$tambahkanstockdenganjumlahbarang' where kode_stok='$barangnya'");
  if ($addtomasuk && $updatestockmasuk) {
    $_SESSION["message-success"] = "Data anda berhasil ditambahkan ke barang masuk";
    $_SESSION["time-message"] = time();
    header("Location: masuk.php");
    exit();
  } else {
    $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat menghapus data dari barang masuk";
    $_SESSION["time-message"] = time();
    header("Location: masuk.php");
    exit();
  };
};

//Menambah Barang Keluar
if (isset($_POST['addbarangkeluar'])) {
  $barangnya = $_POST['barangnya'];
  $jumlah_keluar = $_POST['jumlah_keluar'];
  $pengguna = $_POST['pengguna'];
  $tgl_keluar = $_POST['tgl_keluar'];

  $cekstocksekarang = mysqli_query($conn, "SELECT * from stock_barang where kode_stok='$barangnya'");
  $ambildatanya = mysqli_fetch_array($cekstocksekarang);

  $stocksekarang = $ambildatanya['jumlah_seluruh'];

  $barang_keluar = "SELECT * FROM barang_keluar ORDER BY kode_keluar DESC LIMIT 1";
  $checkID = mysqli_query($conn, $barang_keluar);
  if (mysqli_num_rows($checkID) > 0) {
    $row = mysqli_fetch_assoc($checkID);
    $kode_keluar = $row['kode_keluar'] + 1;
  } else {
    $kode_keluar = 1;
  }

  if ($stocksekarang >= $jumlah_keluar) {

    //Jika Stock Cukup
    $tambahkanstockdenganjumlahbarang =  $stocksekarang - $jumlah_keluar;

    $addtomasuk = mysqli_query($conn, "INSERT into barang_keluar(kode_keluar, kode_stok, tgl_keluar,jumlah_keluar, pengguna) values('$kode_keluar', '$barangnya', '$tgl_keluar', '$jumlah_keluar', '$pengguna')");
    $addtomasuk = mysqli_query($conn, "INSERT into tracking(id_stock, id_keluar) values('$barangnya', '$kode_keluar')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock_barang set jumlah_seluruh	='$tambahkanstockdenganjumlahbarang' where kode_stok='$barangnya'");
    if ($addtomasuk && $updatestockmasuk) {
      $_SESSION["message-success"] = "Data anda berhasil ditambahkan ke barang keluar";
      $_SESSION["time-message"] = time();
      header("Location: keluar.php");
      exit();
    } else {
      $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat menghapus data dari barang keluar";
      $_SESSION["time-message"] = time();
      header("Location: keluar.php");
      exit();
    }
  } else {
    // Jika Stock Tidak Cukup
    $_SESSION["message-success"] = "Maaf, stok saat ini tidak cukup";
    $_SESSION["time-message"] = time();
    header("Location: keluar.php");
    exit();
  }
}

//Update info Barang
if (isset($_POST['updatebarang'])) {
  $id = $_POST['id'];
  $nama_barang = $_POST['nama_barang'];
  $jenis = $_POST['jenis'];
  $satuan = $_POST['satuan'];


  //gambar
  $allowed_extension = array('png', 'jpg');
  $nama = $_FILES['file']['name'];
  $dot = explode('.', $nama);
  $ekstensi = strtolower(end($dot));
  $ukuran = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];

  //penamaan file -> enkripsi
  $image = md5(uniqid($nama, true) . time()) . '.' . $ekstensi;

  if ($ukuran == 0) {
    //jika tidak ingin uplode
    $update = mysqli_query($conn, "UPDATE stock_barang set nama_barang='$nama_barang', jenis='$jenis', satuan='$satuan', updated_at=current_timestamp where kode_stok='$id'");
    if ($update) {
      $_SESSION["message-success"] = "Data stok barang berhasil diubah";
      $_SESSION["time-message"] = time();
      header("Location: index.php");
      exit();
    } else {
      $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat mengubah data dari stok barang";
      $_SESSION["time-message"] = time();
      header("Location: index.php");
      exit();
    }
  } else {
    // jika ingin
    move_uploaded_file($file_tmp, 'images/' . $image);
    $update = mysqli_query($conn, "UPDATE stock_barang set nama_barang='$nama_barang', jenis='$jenis', satuan='$satuan', image='$image', updated_at=current_timestamp where kode_stok='$id'");
    if ($update) {
      $_SESSION["message-success"] = "Data stok barang berhasil diubah";
      $_SESSION["time-message"] = time();
      header("Location: index.php");
      exit();
    } else {
      $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat mengubah data dari stok barang";
      $_SESSION["time-message"] = time();
      header("Location: index.php");
      exit();
    }
  };
};

//menghapus Barang Stock
if (isset($_POST['hapusbarang'])) {
  $id = $_POST['id'];

  $gambar = mysqli_query($conn, "SELECT * FROM stock_barang where kode_stok='$id'");
  $get = mysqli_fetch_array($gambar);
  $img = 'images/' . $get['image'];
  unlink($img);

  $hapus = mysqli_query($conn, "DELETE from stock_barang where kode_stok='$id'");
  if ($hapus) {
    $_SESSION["message-success"] = "Barang berhasil dihapus dari stok";
    $_SESSION["time-message"] = time();
    header("Location: index.php");
    exit();
  } else {
    $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat menghapus data dari stok";
    $_SESSION["time-message"] = time();
    header("Location: index.php");
    exit();
  };
};

//Update Barang Masuk
if (isset($_POST['updatebarangmasuk'])) {
  $id = $_POST['id'];
  $kode_barang = $_POST['kode_barang'];
  $jumlah_barang = $_POST['jumlah_barang'];
  $thn_produksi = $_POST['thn_produksi'];
  $tgl_masuk = $_POST['tgl_masuk'];


  $lihatstock = mysqli_query($conn, "select * from stock_barang where kode_stok='$id'"); //lihat stock barang  saat ini
  $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
  $stockskrg = $stocknya['jumlah_seluruh']; //jumlah stocknya skrg

  $lihatdataskrg = mysqli_query($conn, "select * from barang_masuk where kode_barang='$kode_barang'"); //lihat qty saat ini
  $preqtyskrg = mysqli_fetch_array($lihatdataskrg);
  $qtyskrg = $preqtyskrg['jumlah_barang']; //jumlah skrg

  if ($jumlah_barang >= $qtyskrg) {
    //ternyata inputan baru lebih besar jumlah masuknya, maka tambahi lagi stock barang
    $hitungselisih = $jumlah_barang - $qtyskrg;
    $tambahistock = $stockskrg + $hitungselisih;

    $queryx = mysqli_query($conn, "update stock_barang set jumlah_seluruh='$tambahistock', updated_at=current_timestamp where kode_stok='$id'");
    $updatedata1 = mysqli_query($conn, "update barang_masuk set tgl_masuk='$tgl_masuk',jumlah_barang='$jumlah_barang',thn_produksi='$thn_produksi', updated_at=current_timestamp where kode_barang='$kode_barang'");

    //cek apakah berhasil
    if ($updatedata1 && $queryx) {
      $_SESSION["message-success"] = "Data barang masuk berhasil diubah";
      $_SESSION["time-message"] = time();
      header("Location: masuk.php");
      exit();
    } else {
      $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat mengubah data dari barang masuk";
      $_SESSION["time-message"] = time();
      header("Location: masuk.php");
      exit();
    };
  } else {
    //ternyata inputan baru lebih kecil jumlah masuknya, maka kurangi lagi stock barang
    $hitungselisih = $qtyskrg - $jumlah_barang;
    $kurangistock = $stockskrg - $hitungselisih;

    $query1 = mysqli_query($conn, "update stock_barang set jumlah_seluruh='$kurangistock', updated_at=current_timestamp where kode_stok='$id'");
    $updatedata = mysqli_query($conn, "update barang_masuk set tgl_masuk='$tgl_masuk',jumlah_barang='$jumlah_barang',thn_produksi='$thn_produksi', updated_at=current_timestamp where kode_barang='$kode_barang'");

    //cek apakah berhasil
    if ($query1 && $updatedata) {
      $_SESSION["message-success"] = "Data barang masuk berhasil diubah";
      $_SESSION["time-message"] = time();
      header("Location: masuk.php");
      exit();
    } else {
      $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat mengubah data dari barang masuk";
      $_SESSION["time-message"] = time();
      header("Location: masuk.php");
      exit();
    }
  };
};

//menghapus barang masuk
if (isset($_POST['hapusbarangmasuk'])) {
  $id = $_POST['id'];
  $kode_barang = $_POST['kode_barang'];
  $jumlah_barang = $_POST['jumlah_barang'];

  $lihatstock = mysqli_query($conn, "select * from stock_barang where kode_stok='$id'"); //lihat stock barang itu saat ini
  $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
  $stockskrg = $stocknya['jumlah_seluruh']; //jumlah stocknya skrg

  $lihatdataskrg = mysqli_query($conn, "select * from barang_masuk where kode_barang='$kode_barang'"); //lihat qty saat ini
  $preqtyskrg = mysqli_fetch_array($lihatdataskrg);
  $qtyskrg = $preqtyskrg['jumlah_barang']; //jumlah skrg

  $adjuststock = $stockskrg - $qtyskrg;

  $queryx = mysqli_query($conn, "update stock_barang set jumlah_seluruh='$adjuststock' where kode_stok='$id'");
  $del = mysqli_query($conn, "delete from barang_masuk where kode_barang='$kode_barang'");

  //cek apakah berhasil
  if ($queryx && $del) {
    $_SESSION["message-success"] = "Data berhasil dihapus dari barang masuk";
    $_SESSION["time-message"] = time();
    header("Location: masuk.php");
    exit();
  } else {
    $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat menghapus data dari barang masuk";
    $_SESSION["time-message"] = time();
    header("Location: masuk.php");
    exit();
  }
}

// Update Barang Keluar
if (isset($_POST['updatebarangkeluar'])) {
  $id = $_POST['id']; //iddata
  $kode_keluar = $_POST['kode_keluar']; //idbarang
  $jumlah_keluar = $_POST['jumlah_keluar'];
  $pengguna = $_POST['pengguna'];
  $tgl_keluar = $_POST['tgl_keluar'];

  $lihatstock = mysqli_query($conn, "select * from stock_barang where kode_stok='$id'"); //lihat stock barang itu saat ini
  $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
  $stockskrg = $stocknya['jumlah_seluruh']; //jumlah stocknya skrg

  $lihatdataskrg = mysqli_query($conn, "select * from barang_keluar where kode_keluar='$kode_keluar'"); //lihat qty saat ini
  $preqtyskrg = mysqli_fetch_array($lihatdataskrg);
  $qtyskrg = $preqtyskrg['jumlah_keluar']; //jumlah skrg

  if ($jumlah_keluar >= $qtyskrg) {
    //ternyata inputan baru lebih besar jumlah keluarnya, maka kurangi lagi stock barang
    $hitungselisih = $jumlah_keluar - $qtyskrg;
    $kurangistock = $stockskrg - $hitungselisih;

    $queryx = mysqli_query($conn, "update stock_barang set jumlah_seluruh='$kurangistock', updated_at=current_timestamp where kode_stok='$id'");
    $updatedata1 = mysqli_query($conn, "update barang_keluar set tgl_keluar='$tgl_keluar',jumlah_keluar='$jumlah_keluar',pengguna='$pengguna', updated_at=current_timestamp where kode_keluar='$kode_keluar'");

    //cek apakah berhasil
    if ($updatedata1 && $queryx) {
      $_SESSION["message-success"] = "Data barang keluar berhasil diubah";
      $_SESSION["time-message"] = time();
      header("Location: keluar.php");
      exit();
    } else {
      $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat mengubah data dari barang keluar";
      $_SESSION["time-message"] = time();
      header("Location: keluar.php");
      exit();
    };
  } else {

    //ternyata inputan baru lebih kecil jumlah keluarnya, maka tambahi lagi stock barang
    $hitungselisih = $qtyskrg - $jumlah_keluar;
    $tambahistock = $stockskrg + $hitungselisih;

    $query1 = mysqli_query($conn, "update stock_barang set jumlah_seluruh='$tambahistock', updated_at=current_timestamp where kode_stok='$id'");

    $updatedata = mysqli_query($conn, "update barang_keluar set tgl_keluar='$tgl_keluar',jumlah_keluar='$jumlah_keluar',pengguna='$pengguna', updated_at=current_timestamp where kode_keluar='$kode_keluar'");

    //cek apakah berhasil
    if ($query1 && $updatedata) {
      $_SESSION["message-success"] = "Data barang keluar berhasil diubah";
      $_SESSION["time-message"] = time();
      header("Location: keluar.php");
      exit();
    } else {
      $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat mengubah data dari barang keluar";
      $_SESSION["time-message"] = time();
      header("Location: keluar.php");
      exit();
    }
  };
};

// Hapus Barang Keluar
if (isset($_POST['hapusbarangkeluar'])) {
  $id = $_POST['id'];
  $kode_keluar = $_POST['kode_keluar'];
  $jumlah_keluar = $_POST['jumlah_keluar'];

  $lihatstock = mysqli_query($conn, "select * from stock_barang where kode_stok='$id'"); //lihat stock barang itu saat ini
  $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
  $stockskrg = $stocknya['jumlah_seluruh']; //jumlah stocknya skrg

  $lihatdataskrg = mysqli_query($conn, "select * from barang_keluar where kode_keluar='$kode_keluar'"); //lihat qty saat ini
  $preqtyskrg = mysqli_fetch_array($lihatdataskrg);
  $qtyskrg = $preqtyskrg['jumlah_keluar']; //jumlah skrg

  $adjuststock = $stockskrg + $qtyskrg;

  $queryx = mysqli_query($conn, "update stock_barang set jumlah_seluruh='$adjuststock' where kode_stok='$id'");
  $del = mysqli_query($conn, "delete from barang_keluar where kode_keluar='$kode_keluar'");

  //cek apakah berhasil
  if ($queryx && $del) {
    $_SESSION["message-success"] = "Data berhasil dihapus dari barang keluar";
    $_SESSION["time-message"] = time();
    header("Location: keluar.php");
    exit();
  } else {
    $_SESSION["message-success"] = "Maaf, sepertinya ada kesalahan saat menghapus data dari barang keluar";
    $_SESSION["time-message"] = time();
    header("Location: keluar.php");
    exit();
  }
}

// Add Pengguna
if (isset($_POST['addnewpengguna'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $level = $_POST['level'];


  $addtotable = mysqli_query($conn, "INSERT into login (email, password, level) values('$email', '$password', '$level')");
  if ($addtotable) {
    echo " <div class='alert alert-success'>
            <strong>Success!</strong> Redirecting you back in 5 seconds.
          </div>
        <meta http-equiv='refresh' content='1; url= data.php'/>  ";
  } else {
    echo "<div class='alert alert-warning'>
            <strong>Failed!</strong> Redirecting you back in 5 seconds.
          </div>
        <meta http-equiv='refresh' content='1; url= data.php'/> ";
  }
}

//update pengguna
if (isset($_POST['updatepengguna'])) {
  $kode_login = $_POST['kode_login'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $level = $_POST['level'];


  $update = mysqli_query($conn, "UPDATE login set email='$email', password='$password', level='$level' where kode_login='$kode_login'");
  if ($update) {
    echo " <div class='alert alert-success'>
            <strong>Success!</strong> Redirecting you back in 5 seconds.
          </div>
        <meta http-equiv='refresh' content='1; url= data.php'/>  ";
  } else {
    echo "<div class='alert alert-warning'>
            <strong>Failed!</strong> Redirecting you back in 5 seconds.
          </div>
        <meta http-equiv='refresh' content='1; url= data.php'/> ";
  }
}

// Hapus Pengguna
if (isset($_POST['hapuspengguna'])) {
  $kode_login = $_POST['kode_login'];


  $hapus = mysqli_query($conn, "DELETE from login where kode_login='$kode_login'");
  if ($hapus) {

    echo " <div class='alert alert-success'>
      <strong>Success!</strong> Redirecting you back in 5 seconds.
    </div>
  <meta http-equiv='refresh' content='1; url= data.php'/>  ";
  } else {
    echo "<div class='alert alert-warning'>
      <strong>Failed!</strong> Redirecting you back in 5 seconds.
    </div>
   <meta http-equiv='refresh' content='1; url= data.php'/> ";
  };
};
