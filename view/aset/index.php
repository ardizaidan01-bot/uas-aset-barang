<?php
session_start();

require_once "../../model/Aset.php";

$aset = new Aset();

if(isset($_GET['keyword']) && $_GET['keyword'] != "")
{
    $dataAset = $aset->search($_GET['keyword']);
}
else
{
    $dataAset = $aset->getAll();
}

if(!isset($_SESSION['login']))
{
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Aset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/uas_aset_barang/assets/css/style.css">

</head>
<body>

<div class="container mt-5">

    <h2>Data Aset Barang</h2>

    <hr>

    <a href="../dashboard.php" class="btn btn-secondary">
        Kembali
    </a>

    <a href="tambah.php" class="btn btn-success">
        Tambah Data
    </a>

    <hr>

<hr>

<form method="GET" class="row mb-3">

    <div class="col-md-4">
        <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="Cari kode, nama, kategori, lokasi..."
            value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary">
            Cari
        </button>

        <a href="index.php" class="btn btn-secondary">
            Reset
        </a>
    </div>

</form>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Tanggal Masuk</th>
            <th>Foto</th>
            <th>Diinput Oleh</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    <?php while($row = $dataAset->fetch_assoc()) : ?>

        <tr>

            <td><?= $row['id_aset']; ?></td>
            <td><?= $row['kode_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><?= $row['lokasi']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['kondisi']; ?></td>
            <td><?= $row['tanggal_masuk']; ?></td>

            <td>
                <?php if($row['foto'] != "") : ?>
                    <img src="../../uploads/<?= $row['foto']; ?>" width="80">
                <?php else : ?>
                    Tidak ada foto
                <?php endif; ?>
            </td>

            <td><?= $row['user_input']; ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id_aset']; ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="../../controller/AsetController.php?hapus=<?= $row['id_aset']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>

        </tr>

    <?php endwhile; ?>

    </tbody>

</table>

</div>

</body>
</html>