<h3>Detail Pembelian</h3>
<hr class="m-1 mb-2">

<?php
	// $idpelanggan = (int)$_SESSION["idpelanggan"];
	$idpesanan = (int)$_GET["id"];
	
	// Pagination
	$jmlDataPerHal = 8;
	$jmlData = $database->num_row("SELECT * FROM vdetailpesanan WHERE idpesanan = $idpesanan");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ( $jmlDataPerHal * $posHal ) - $jmlDataPerHal;
	
	$querySelect = "SELECT * FROM vdetailpesanan WHERE idpesanan = $idpesanan ORDER BY iddetailpesanan ASC LIMIT $awalData, $jmlDataPerHal";
	$vdetailpesanan = $database->query_select($querySelect);
	
?>

<!-- Table Daftar Riwayat Pembelian -->
<table class="table table-bordered w-50 m-1 mt-0">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Pesanan</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = $awalData + 1; ?>
		<?php foreach ( $vdetailpesanan as $vdpsn ) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "." ?></td>
				<td><?= $vdpsn["tglpesanan"] ?></td>
				<td><?= $vdpsn["menu"] ?></td>
				<td>Rp <?= $vdpsn["harga"] ?></td>
				<td><?= $vdpsn["jumlah"] ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<!-- Navigasi Halaman -->
<table border="0" cellpadding="5" cellspacing="0">
	<tr>
		<th>Page:</th>
		<?php for ( $i = 1; $i <= $jmlHal; ++$i ) : ?>
			<td><a href="?dir=home&file=detail&hal=<?= $i ?>&id=<?= $idpesanan ?>"><?= $i ?></a></td>
		<?php endfor; ?>
	</tr>
</table>