<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

require_once "../../model/Aset.php";

$aset = new Aset();

$id = $_GET['id'];
$data = $aset->getById($id);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" href="/uas_aset_barang/assets/css/style.css">

</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>Edit Data Aset</h4>
        </div>

        <div class="card-body">

            <form action="../../controller/AsetController.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id_aset" value="<?= $data['id_aset']; ?>">

                <div class="mb-3">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control"
                    value="<?= $data['kode_barang']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control"
                    value="<?= $data['nama_barang']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                    value="<?= $data['kategori']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control"
                    value="<?= $data['lokasi']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control"
                    value="<?= $data['jumlah']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Kondisi</label>

                    <select name="kondisi" class="form-select">

                        <option value="Baik"
                        <?= ($data['kondisi']=="Baik") ? "selected" : ""; ?>>
                        Baik
                        </option>

                        <option value="Rusak"
                        <?= ($data['kondisi']=="Rusak") ? "selected" : ""; ?>>
                        Rusak
                        </option>

                    </select>

                </div>

                <div class="mb-3">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control"
                    value="<?= $data['tanggal_masuk']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Foto Baru (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <?php if($data['foto']!="") : ?>

                    <img src="../../uploads/<?= $data['foto']; ?>" width="120">

                <?php endif; ?>

                <br><br>

                <button type="submit" name="update" class="btn btn-primary">
                    Update
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>