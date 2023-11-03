<?php
require '../function.php';
require '../cek.php';
?>

<html>
<head>
  <title>Data Barang Keluar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Barang Keluar</h2>
			<h4></h4>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Keluar</th>  
                                            <th>Penerima</th> 
                                            <th>Tanggal Keluar</th> 
                                            <th>Jenis</th> 
                                            <th>Satuan</th> 
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            $ambilsemuadatastock =mysqli_query($conn,"SELECT * FROM barang_keluar k, stock_barang s WHERE s.kode_stok = k.kode_stok");
                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                $id = $data['kode_stok'];
                                                $kode_keluar = $data['kode_keluar'];
                                                $nama_barang = $data['nama_barang'];
                                                $jumlah_keluar = $data['jumlah_keluar'];
                                                $jenis = $data['jenis'];
                                                $satuan = $data['satuan'];
                                                $pengguna = $data['pengguna'];
                                                $tgl_masuk = $data['tgl_keluar'];
                                            ?>
                                            <td><?=$i++;?></td>
                                                <td><?=$nama_barang;?></td>
                                                <td><?=$jumlah_keluar;?></td>
                                                <td><?=$pengguna;?></td>
                                                <td><?php $tgl_keluar=$data['tgl_keluar']; echo date("d-M-Y", strtotime($tgl_keluar)) ?></td>
                                                <td><?=$jenis;?></td>
                                                <td><?=$satuan;?></td>
                                            
                                            </tr>
                                            </div>

                                            <?php
                                            };

                                            ?>



                                </tbody>
                                </table>
					
				</div>
                <button type="button" class="btn btn-danger" onclick="history.back()">
                <i class="bi bi-x-square">
                </i> Close
                </button>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>