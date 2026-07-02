<?php

session_start();

if(!isset($_SESSION['login']))
{
    header("Location: login.php");
    exit;
}

?>

<?php

include '../config/Database.php';

$db = new Database();
$conn = $db->connect();

$totalAset = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) as total FROM aset")
);

$totalKategori = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(DISTINCT kategori) as total FROM aset")
);

$kategoriTerbanyak = mysqli_fetch_assoc(
    mysqli_query($conn,"
        SELECT kategori, SUM(jumlah) as total
        FROM aset
        GROUP BY kategori
        ORDER BY total DESC
        LIMIT 1
    ")
);

$userTerbanyak = mysqli_fetch_assoc(
    mysqli_query($conn,"
        SELECT user_input, COUNT(*) as total
        FROM aset
        GROUP BY user_input
        ORDER BY total DESC
        LIMIT 1
    ")
);

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="/uas_aset_barang/assets/css/style.css">

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h3>Aset Barang</h3>

    <a href="dashboard.php">📊 Dashboard</a>

    <a href="aset/index.php">📦 Data Aset</a>

    <a href="aset/tambah.php">➕ Tambah Aset</a>

    <a href="/uas_aset_barang/report/laporan_excel.php">
        📊 Export Excel
    </a>

    <a href="/uas_aset_barang/report/laporan_pdf.php">
        📄 Export PDF
    </a>

    <a href="/uas_aset_barang/logout.php">
        🚪 Logout
    </a>

</div>

<!-- CONTENT -->
<div class="content">

    <div class="alert alert-success">
        <h3>Selamat Datang <?= $_SESSION['nama']; ?></h3>
        <p class="mb-0">
            Selamat datang di Sistem Informasi Data Aset Barang
        </p>
    </div>

    <div class="card">
        <div class="card">
    <div class="card-header">
        Statistik Aset
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5>Total Aset</h5>
                        <h2><?= $totalAset['total']; ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card border-success">
                    <div class="card-body">
                        <h5>Total Kategori</h5>
                        <h2><?= $totalKategori['total']; ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-warning">
                    <div class="card-body">
                        <h5>Kategori Terbanyak</h5>
                        <b><?= $kategoriTerbanyak['kategori']; ?></b>
                        <br>
                        <?= $kategoriTerbanyak['total']; ?> unit
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-info">
                    <div class="card-body">
                        <h5>User Input Terbanyak</h5>
                        <b><?= $userTerbanyak['user_input']; ?></b>
                        <br>
                        <?= $userTerbanyak['total']; ?> data
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</div>

</body>
</html>