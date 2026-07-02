<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="/uas_aset_barang/assets/css/style.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="col-md-4 mx-auto">

<div class="card shadow">

<div class="card-header text-center">

<h3>Register</h3>

</div>

<div class="card-body">

<form action="../controller/AuthController.php" method="POST">

<input type="text"
name="nama"
class="form-control mb-3"
placeholder="Nama"
required>

<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button class="btn btn-success w-100"
name="register">

Daftar

</button>

</form>

</div>

</div>

</div>

</div>

</body>

</html>