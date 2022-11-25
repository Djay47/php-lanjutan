<?php
	require "../dbcontroller.php";
	$database = new Database();
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
			<div class="row mb-5">
				<div class="col-md-3">
					<h1>Restoran</h1>
				</div>
				
				<div class="col-md-9">
					<div class="float-end my-3">Logout</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2 px-0">
					<ul class="nav flex-column">
						<li class="nav-item ">
							<a class="nav-link py-1" href="?dir=kategori&file=select">Kategori</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=menu&file=select">Menu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=pelanggan&file=select">Pelanggan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=order&file=select">Order</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=orderdetail&file=select">Order Detail</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-1" href="?dir=user&file=select">User</a>
						</li>
					</ul>
				</div>
				
				<div class="col-md-10 p-2">
					<?php if ( isset($_GET["dir"]) && isset($_GET["file"]) ) : ?>
						<?php
							$directory = $_GET["dir"];
							$file = $_GET["file"];
							$pathFile = "../$directory/$file.php";
						?>
						
						<?php require "$pathFile" ?>

					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<p class="text-center my-1">Copyright 2022 by Djay Grup</p>
			</div>
		</div>
	</body>
</html>