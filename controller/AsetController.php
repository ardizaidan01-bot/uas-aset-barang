<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "../model/Aset.php";

$aset = new Aset();

/* =========================
   SIMPAN DATA
========================= */

if (isset($_POST['simpan'])) {

    $namaFoto = "";

    if (!empty($_FILES['foto']['name'])) {

        $namaFoto = time() . "_" . $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "../uploads/" . $namaFoto);
    }

    $data = [
    "id_aset"        => $_POST['id_aset'],
    "kode_barang"    => $_POST['kode_barang'],
    "nama_barang"    => $_POST['nama_barang'],
    "kategori"       => $_POST['kategori'],
    "lokasi"         => $_POST['lokasi'],
    "jumlah"         => $_POST['jumlah'],
    "kondisi"        => $_POST['kondisi'],
    "tanggal_masuk"  => $_POST['tanggal_masuk'],
    "foto"           => $namaFoto,
    "user_input"     => $_SESSION['nama']
];

    if ($aset->insert($data)) {
        header("Location: ../view/aset/index.php");
        exit;
    } else {
        echo "Data gagal disimpan.";
    }
}


/* =========================
   UPDATE DATA
========================= */

if (isset($_POST['update'])) {

    if (!empty($_FILES['foto']['name'])) {

        $foto = time() . "_" . $_FILES['foto']['name'];

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            "../uploads/" . $foto
        );

    } else {

        $dataLama = $aset->getById($_POST['id_aset']);
        $foto = $dataLama['foto'];
    }

    $data = [
    "id_aset"        => $_POST['id_aset'],
    "kode_barang"    => $_POST['kode_barang'],
    "nama_barang"    => $_POST['nama_barang'],
    "kategori"       => $_POST['kategori'],
    "lokasi"         => $_POST['lokasi'],
    "jumlah"         => $_POST['jumlah'],
    "kondisi"        => $_POST['kondisi'],
    "tanggal_masuk"  => $_POST['tanggal_masuk'],
    "foto"           => $foto,
    "user_input"     => $_SESSION['nama']
];

    if ($aset->update($data)) {
        header("Location: ../view/aset/index.php");
        exit;
    } else {
        echo "Data gagal diupdate.";
    }
}


/* =========================
   HAPUS DATA
========================= */

if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    // Ambil data lama
    $data = $aset->getById($id);

    // Hapus foto jika ada
    if ($data && !empty($data['foto'])) {

        $path = "../uploads/" . $data['foto'];

        if (file_exists($path)) {
            unlink($path);
        }
    }

    if ($aset->delete($id)) {

        header("Location: ../view/aset/index.php");
        exit;

    } else {

        echo "Data gagal dihapus.";

    }
}