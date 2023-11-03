<?php
//menyertakan file fpdf, file fpdf.php di dalam folder FPDF yang diekstrak
include "fpdf.php";
require '../function.php';

//membuat objek baru bernama pdf dari class FPDF
//dan melakukan setting kertas l : landscape, A5 : ukuran kertas
$pdf = new FPDF('L', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
// menyetel font yang digunakan, font yang digunakan adalah arial, bold dengan ukuran 16
$pdf->SetFont('Times', 'B', 14);
// judul
$pdf->Cell(300, 7, 'SEKERTARIAT DAERAH PROVINSI NUSA TENGGARA TIMUR', 0, 1, 'C');
$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(300, 7, 'Biro Pengadan Barang dan Jasa', 0, 1, 'C');
$pdf->SetFont('Times', 'I', 12);
$pdf->Cell(300, 7, 'Jl. Raya El Tari N0.52, Oebobo, Kota Kupang - NTT 85226.', 0, 1, 'C');
$pdf->Image('img/logo-removebg-preview.png', 10, 6, 25, 25);
$pdf->Line(20, 35, 280, 35);
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(90, 30, '', 0, 0, 'C');

if (isset($_POST['month'])) {
    $date = date_create($_POST['month']);
    $month = date_format($date, "m");
    $month_view = date_format($date, "M");
    $year = date_format($date, "Y");
    $tampil = mysqli_query($conn, "SELECT * FROM barang_keluar k, stock_barang s WHERE s.kode_stok = k.kode_stok AND MONTH(k.created_at) = $month AND YEAR(k.created_at) = $year");
}

$pdf->Cell(110, 30, 'Laporan Barang Keluar Bulan ' . $month_view . ' ' . $year, 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(20);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(40, 10, 'Jumlah Keluar', 1, 0, 'C');
$pdf->Cell(40, 10, 'Penerima', 1, 0, 'C');
$pdf->Cell(40, 10, 'Tanggal Keluar', 1, 0, 'C');
$pdf->Cell(50, 10, 'Jenis Barang', 1, 0, 'C');
$pdf->Cell(25, 10, 'Satuan', 1, 1, 'C');


$pdf->SetFont('Times', '', 12);
$pdf->Cell(20);
//koneksi ke database

$no = 1;
while ($hasil = mysqli_fetch_array($tampil)) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(40, 10, $hasil['nama_barang'], 1, 0, 'C');
    $pdf->Cell(40, 10, $hasil['jumlah_keluar'], 1, 0, 'C');
    $pdf->Cell(40, 10, $hasil['pengguna'], 1, 0, 'C');
    $pdf->Cell(40, 10, $hasil['tgl_keluar'], 1, 0, 'C');
    $pdf->Cell(50, 10, $hasil['jenis'], 1, 0, 'C');
    $pdf->Cell(25, 10, $hasil['satuan'], 1, 1, 'C');
    $pdf->Cell(20);
}

$pdf->Cell(20, 20, '', 0, 1);
$pdf->Cell(15);
$pdf->SetFont('Times', 'B', 10);
$pdf->SetX(1);
$pdf->MultiCell(250.10, 2, 'Kupang,               2023', 0, 'R');

$pdf->Cell(4, 4, '', 0, 1);
$pdf->SetFont('Times', 'B', 10);
$pdf->SetX(1);
$pdf->MultiCell(255.10, 2, 'Mengetahui, Kepala Biro', 0, 'R');

$pdf->Cell(15, 15, '', 0, 1);
$pdf->SetFont('Times', 'U', 12);
$pdf->SetX(1);
$pdf->MultiCell(260.5, 0.8, 'Siprianus K. Kelen, S.Sos, M.Si', 0, 'R');

$pdf->Cell(3, 3, '', 0, 1);
$pdf->SetFont('Times', '', 12);
$pdf->SetX(1);
$pdf->MultiCell(256.5, 0.8, 'NIP.  19631119 199108 2 009', 0, 'R');

$pdf->Ln();
$pdf->Output('I');
