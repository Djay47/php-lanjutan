<?php
	require '../functions.php';

	// Pagination: Konfigurasi Pagination
	$jmlDataPerHal = 3;
	$jmlData = count( query_select("SELECT * FROM kategori") );
	$jmlHal = ceil($jmlData / $jmlDataPerHal);
	$posHal = ( isset( $_GET["hal"] ) ) ? $_GET["hal"] : 1 ;
	$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;
	
	$kategori = query_select("SELECT * FROM kategori LIMIT $awalData, $jmlDataPerHal");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kategori Page</title>
	</head>
	<body>
		<h1>Daftar Kategori</h1>
		<hr>
		
		<strong><a href="insert.php">Insert</a></strong>	<!-- Menu Insert -->
		<hr>

		<!-- Navigasi Halaman -->
		<?php for ( $i = 1; $i <= $jmlHal; ++$i ) : ?>
			<a href="?hal=<?= $i ?>"><?= $i ?></a>&nbsp &nbsp
		<?php endfor; ?>

		<br><br>

		<!-- Table Data Kategori -->
		<table border="1" cellpadding="7" cellspacing="0">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = $awalData + 1; ?>

				<?php foreach($kategori as $ktgr) : ?>
					<tr>
						<td><?= $nomor ?></td>
						<td><?= $ktgr["kategori"] ?></td>
						<td><a href="confirm-delete.php?id=<?= $ktgr["idkategori"] ?>">Delete</a></td>
					</tr>
					
					<?php ++$nomor; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>