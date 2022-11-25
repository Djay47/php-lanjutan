<?php
	session_start();

	require "../dbcontroller.php";
	$database = new Database();	// instance object $database untuk connect ke database

	// Cek apakah tombol login sudah ditekan atau belum
	if ( isset( $_POST["login"] ) )
	{
		// Mengambil data dari variable $_POST
		$email = $_POST["email"];
		$password = $_POST["password"];

		// melakukan SQL query SELECT terhadap table user dengan acuan email dari variable $_POST["email"]
		$result = mysqli_query( $database->conn, "SELECT * FROM user WHERE email = '$email'");

		// Cek email -> menampilkan banyaknya data user yang memiliki email yang sesuai (1 untuk ada dan 0 untuk tidak ada)
		if ( mysqli_num_rows($result) === 1 )
		{
			// ambil data dari baris yang ditemukan
			$row = mysqli_fetch_assoc($result);

			// Cek password
			if ( $password == $row["password"])
			{
				$_SESSION["login"] = true;	// inisialisasi variable superglobal $_SESSION["login"] dengan true jika password benar
				$_SESSION["user"] = $row["user"];
				$_SESSION["iduser"] = $row["iduser"];

				header("Location: index.php");	// Redirect ke halaman index.php
				exit;
			}
		}
		$error = true;	// inisialisasi variable $error dengan true jika email atau password tidak sesuai
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login Page | Restoran</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<h1>Login</h1>
			
			<hr>
			
			<table class="table-sm mx-auto">
				<form action="" method="post">
					<!-- Email Label -->
					<tr>
						<th><label for="email">Email:</label></th>
					</tr>

					<!-- Email Input -->
					<tr>
						<td><input type="email" name="email" id="email" placeholder="Masukkan Email" required></td>
					</tr>
					
					<!-- Password Label -->
					<tr>
						<th><label for="password">Password:</label></th>
					</tr>

					<!-- Password Inpt -->
					<tr>
						<td><input type="password" name="password" id="password" placeholder="Masukkan Password" required></td>
					</tr>

					<!-- Login Button -->
					<tr>
						<td class="text-center"><button type="submit" name="login" class="btn btn-outline-primary my-2 py-0">Login</button></td>
					</tr>
				</form>
			</table>
			
			<hr>
			
			<!-- Dijalankan ketika login gagal (email atau password salah) -->
			<?php if ( isset( $error ) ) : ?>
				<p class="text-center">
					Login Gagal!
					<br>
					Email atau Password Salah!
				</p>
			<?php endif; ?>
		</div>
	</body>
</html>