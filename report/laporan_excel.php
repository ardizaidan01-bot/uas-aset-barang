<?php
include '../config/Database.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Aset.xls");

$db = new Database();
$conn = $db->connect();

$data = mysqli_query($conn, "SELECT * FROM aset");
?>

<h2>Laporan Data Aset Barang</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Jumlah</th>
        <th>Kondisi</th>
        <th>Tanggal Masuk</th>
        <th>User Input</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $row['id_aset']; ?></td>
        <td><?= $row['kode_barang']; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= $row['kategori']; ?></td>
        <td><?= $row['lokasi']; ?></td>
        <td><?= $row['jumlah']; ?></td>
        <td><?= $row['kondisi']; ?></td>
        <td><?= $row['tanggal_masuk']; ?></td>
        <td><?= $row['user_input']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>