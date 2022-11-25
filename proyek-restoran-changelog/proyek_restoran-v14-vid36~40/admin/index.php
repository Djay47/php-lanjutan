<?php
	session_start();
	if ( !isset( $_SESSION["login"] ) )
	{
		header("Location: login.php");
		exit;
	}
	
	$user = $_SESSION["user"];
	$iduser = $_SESSION["iduser"];

	require "../dbcontroller.php";
	$database = new Database();	// instance object $database untuk connect ke database
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Page | Restoran</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<!-- Baris Konten 1 -->
			<div class="row mb-5 ">
				<!-- Baris Konten 1 Kolom Konten 1 -->
				<div class="col-md-2">
					<h1><a href="index.php" class="navbar-text nav-link">Restoran</a></h1>
				</div>
				
				<!-- Baris Konten 1 Kolom Konten 2 -->
				<div class="col-md-10">
					<div class="float-end my-3">
						<a href="?dir=user&file=update&id=<?= $iduser ?>" class="btn btn-outline-dark btn-sm py-0"><?= $user ?></a>
						<a href="logout.php" class="btn btn-outline-danger btn-sm py-0 ms-2">Logout</a>
					</div>
				</div>
			</div>

			<!-- Baris Konten 2 -->
			<div class="row">
				<!-- Baris Konten 2 Kolom Konten 1 -->
				<div class="col-md-2 px-0 border-end border-2">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=kategori&file=select">
								Kategori
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=menu&file=select">
								Menu
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=pelanggan&file=select">
								Pelanggan
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=order&file=select">
								Order
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=orderdetail&file=select">
								Order Detail
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=user&file=select">
								User
							</a>
						</li>
					</ul>
				</div>
				
				<!-- Baris Konten 2 Kolom Konten 2 -->
				<div class="col-md-10 p-2">
					<?php if ( isset($_GET["dir"]) && isset($_GET["file"]) ) : ?>
						<?php
							$directory = $_GET["dir"];
							$file = $_GET["file"];
							$pathFile = "../$directory/$file.php";

							require "$pathFile";
						?>
					<?php else : ?>
						<?php
							$directory = "kategori";
							$file = "select";
							$pathFile = "../$directory/$file.php";

							require "$pathFile";
						?>
					<?php endif; ?>
				</div>
			</div>

			<!-- Baris Konten 3 -->
			<div class="row">
				<p class="text-center my-1 small">Copyright 2022 by Djay Grup</p>
			</div>
		</div>
	</body>
</html>