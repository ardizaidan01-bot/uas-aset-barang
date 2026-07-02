<!DOCTYPE html>

<html>

<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="/uas_aset_barang/assets/css/style.css">

</head>

<body class="bg-primary">

<div class="container mt-5">

<div class="col-md-4 mx-auto">

<div class="card shadow">

<div class="card-header text-center">

<h3>Login</h3>

</div>

<div class="card-body">

<form action="../controller/AuthController.php" method="POST">

<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username">

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password">

<button class="btn btn-primary w-100"
name="login">

Login

</button>

</form>

<hr>

<a href="register.php">

Belum punya akun?

</a>

</div>

</div>

</div>

</div>

</body>

</html>