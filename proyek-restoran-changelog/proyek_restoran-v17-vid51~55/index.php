<?php
	session_start();

	require "dbcontroller.php";
	$database = new Database();	// instance object $database untuk connect ke database

	$querySelect = "SELECT * FROM kategori";
	$kategori = $database->query_select($querySelect);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home Page | Restoran</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
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
					<div class="float-end my-3 ">
						<?php if ( !isset( $_SESSION["loginPlgn"] ) ) : ?>
							<a href="home/registrasi.php" class="btn btn-outline-dark btn-sm py-0 ms-2">Daftar</a>
							<a href="home/login.php" class="btn btn-outline-primary btn-sm py-0 ms-2">Login</a>
						<?php else : ?>
							<a href="?dir=home&file=riwayat" class="btn btn-outline-dark btn-sm py-0">Riwayat</a>
							<!-- Tombol 'Keranjang' akan tampil jika tombol 'Beli' sudah pernah ditekan -->
							<?php if ( isset( $_SESSION["keranjang"] ) ) : ?> 							
								<a href="?dir=home&file=keranjang" class="btn btn-outline-dark btn-sm py-0 ms-2">Keranjang ( <?= count( $_SESSION["keranjang"] ) ?> )</a>
							<?php endif; ?>
							<span class="btn btn-outline-dark btn-sm py-0 ms-2"><?= strtoupper($_SESSION["pelanggan"]) ?></span>
							<a href="home/logout.php" class="btn btn-outline-danger btn-sm py-0 ms-2">Logout</a>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<!-- Baris Konten 2 -->
			<div class="row">
				<!-- Baris Konten 2 Kolom Konten 1 -->
				<div class="col-md-2 px-0 border-end border-2">
					<h2 style="padding-left: 12px">Kategori</h2>
					<ul class="nav flex-column">
						<?php foreach($kategori as $ktgr) : ?>
							<li class="nav-item">
								<a class="nav-link" href="?dir=home&file=menu&id=<?= $ktgr["idkategori"] ?>&kategori=<?= $ktgr["kategori"] ?>">
									<?= $ktgr["kategori"] ?>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				
				<!-- Baris Konten 2 Kolom Konten 2 -->
				<div class="col-md-10 p-2">
					<?php if ( isset($_GET["dir"]) && isset($_GET["file"]) ) : ?>
						<?php
							$directory = $_GET["dir"];
							$file = $_GET["file"];
							$pathFile = "$directory/$file.php";
							
							require "$pathFile";
						?>
					<?php else : ?>
						<?php require "home/menu.php" ?>
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