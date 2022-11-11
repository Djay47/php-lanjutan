<h3>Riwayat Pembelian</h3>
<hr class="m-1 mb-2">

<?php
	$idpelanggan = (int)$_SESSION["idpelanggan"];
	
	// Pagination
	$jmlDataPerHal = 8;
	$jmlData = $database->num_row("SELECT * FROM vpesanan WHERE idpelanggan = $idpelanggan");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ( $jmlDataPerHal * $posHal ) - $jmlDataPerHal;
	
	$querySelect = "SELECT * FROM vpesanan WHERE idpelanggan = $idpelanggan ORDER BY tglpesanan DESC LIMIT $awalData, $jmlDataPerHal";
	$vpesanan = $database->query_select($querySelect);
	
?>

<!-- <pre><?php // var_dump($vpesanan); ?></pre> -->

<!-- Table Daftar Riwayat Pembelian -->
<table class="table table-bordered w-50 m-1 mt-0">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Total</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = $awalData + 1; ?>
		<?php foreach ( $vpesanan as $vpsn ) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "." ?></td>
				<td><?= $vpsn["tglpesanan"] ?></td>
				<td>Rp <?= $vpsn["total"] ?></td>
				<td class="text-center">
					<a href="?dir=home&file=detail&id=<?= $vpsn["idpesanan"] ?>" class="btn btn-outline-primary btn-sm py-0 m-0">Detail</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<!-- Navigasi Halaman -->
<table border="0" cellpadding="5" cellspacing="0">
	<tr>
		<th>Page:</th>
		<?php for ( $i = 1; $i <= $jmlHal; ++$i ) : ?>
			<td><a href="?dir=home&file=riwayat&hal=<?= $i ?>"><?= $i ?></a></td>
		<?php endfor; ?>
	</tr>
</table>