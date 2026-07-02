<?php
require('../fpdf/fpdf.php');
include '../config/Database.php';

$db = new Database();
$conn = $db->connect(); // sesuaikan jika nama method berbeda

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'LAPORAN DATA ASET BARANG',0,1,'C');

$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(15,10,'ID',1);
$pdf->Cell(30,10,'Kode',1);
$pdf->Cell(60,10,'Nama Barang',1);
$pdf->Cell(35,10,'Kategori',1);
$pdf->Cell(35,10,'Lokasi',1);
$pdf->Cell(20,10,'Jumlah',1);
$pdf->Cell(25,10,'Kondisi',1);
$pdf->Cell(35,10,'Tanggal',1);

$pdf->Ln();

$pdf->SetFont('Arial','',9);

$query = mysqli_query($conn, "SELECT * FROM aset");

while($row = mysqli_fetch_assoc($query)){

    $pdf->Cell(15,8,$row['id_aset'],1);
    $pdf->Cell(30,8,$row['kode_barang'],1);
    $pdf->Cell(60,8,substr($row['nama_barang'],0,30),1);
    $pdf->Cell(35,8,$row['kategori'],1);
    $pdf->Cell(35,8,$row['lokasi'],1);
    $pdf->Cell(20,8,$row['jumlah'],1);
    $pdf->Cell(25,8,$row['kondisi'],1);
    $pdf->Cell(35,8,$row['tanggal_masuk'],1);

    $pdf->Ln();
}

$pdf->Output('I', 'Laporan_Aset.pdf');
exit;
?>