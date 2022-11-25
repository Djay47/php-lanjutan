<?php
	require '../dbcontroller.php';
	$database = new Database();

	if ( isset($_POST["register"]) )
	{
		$pelanggan = htmlspecialchars($_POST["nama"]);
		$pelanggan = strtolower($pelanggan);
		$pelanggan = stripslashes($pelanggan);

		$alamat = htmlspecialchars($_POST["alamat"]);
		$telepon = htmlspecialchars($_POST["tlp"]);
		$email = htmlspecialchars($_POST["email"]);
		$password = htmlspecialchars($_POST["password"]);

		$queryInsert = "INSERT INTO pelanggan VALUES ('', '$pelanggan', '$alamat', '$telepon', '$email', '$password', 1)";

		if ( $database->query_insert($queryInsert) >= 0)
		{
			$msg = "Registration Success!<br>Tekan Lanjut untuk Login";
		}
		else
		{
			$msg = "Registration Failed!<br>" . mysqli_error( $database->conn );
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registration Page | Restoran</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	</head>
	<body>
		<div class="container border">
			<div class="row border-bottom border-2">
				<div class="col-md-5 px-0 mx-0">
					<h1>Registration Pelanggan</h1>
				</div>
				<div class="col-md-7">
					<?php if ( isset($_POST["register"]) ) : ?>
						<a href="login.php" class="btn btn-primary float-end my-3 py-0">Login</a>
					<?php else : ?>
						<a href="../index.php" class="btn btn-outline-danger float-end my-3 py-0">Batal</a>
					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<table class="table-sm w-75">
					<form action="" method="post">
						<!-- Nama Pelanggan -->
						<tr><th><label for="nama">Nama:</label></th></tr>
						<tr><td><input type="text" class="w-50" name="nama" id="nama" placeholder="Masukkan Nama Anda" required></td></tr>

						<!-- Alamat Pelanggan -->
						<tr><th><label for="alamat">Alamat (Kota):</label></th></tr>
						<tr><td><input type="text" class="w-50" name="alamat" id="alamat" placeholder="Masukkan Kota Alamat Anda" required></td></tr>

						<!-- No. Telepon Pelanggan -->
						<tr><th><label for="tlp">No. Telepon:</label></th></tr>
						<tr><td><input type="text" class="w-50" name="tlp" id="tlp" placeholder="Masukkan Nomor Telepon Anda" required></td></tr>

						<!-- Email Label -->
						<tr><th><label for="email">Email:</label></th></tr>

						<!-- Email Input -->
						<tr><td><input type="email" class="w-50" name="email" id="email" placeholder="Masukkan Email" required></td></tr>
						
						<!-- Password Label -->
						<tr><th><label for="password">Password:</label></th></tr>

						<!-- Password Inpt -->
						<tr><td><input type="password" class="w-50" name="password" id="password" placeholder="Masukkan Password" required></td></tr>

						<!-- Login Button -->
						<tr><td><button type="submit" name="register" class="btn btn-outline-primary my-2 py-0">Register</button></td></tr>
					</form>
				</table>
			</div>

			<div class="row">
				<?php if ( isset($msg) ) : ?>
					<p><?= $msg ?></p>
				<?php endif; ?>
			</div>
		</div>
	</body>
</html>