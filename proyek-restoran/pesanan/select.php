<h3>Pesanan</h3>
<hr class="m-1 mb-2">

<?php
	// Pagination
	$jmlDataPerHal = 8;
	$jmlData = $database->num_row("SELECT * FROM vpesanan");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ( $jmlDataPerHal * $posHal ) - $jmlDataPerHal;

	// query SELECT ke view vpesanan
	$query = "SELECT * FROM vpesanan ORDER BY idpesanan ASC LIMIT $awalData, $jmlDataPerHal";
	$vpesanan = $database->query_select($query);
?>

<table class="table table-bordered w-75 m-1 mt-0">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Pelanggan</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Total</th>
			<th class="text-center">Bayar</th>
			<th class="text-center">Kembali</th>
			<th class="text-center">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = $awalData + 1; ?>
		<?php foreach ( $vpesanan as $vpsn ) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "." ?></td>
				<td class="text-capitalize"><?= $vpsn["pelanggan"] ?></td>
				<td><?= $vpsn["tglpesanan"] ?></td>
				<td><?= $vpsn["total"] ?></td>
				<td><?= $vpsn["bayar"] ?></td>
				<td><?= $vpsn["kembali"] ?></td>
				<td class="text-center">
					<?php if ( $vpsn["state"] == 0 ) : ?>
						<a href="?dir=pesanan&file=bayar&id=<?= $vpsn["idpesanan"] ?>" class="btn btn-warning btn-sm m-0 py-0">Dibayar</a>
					<?php else: ?>
						<span class="btn btn-success btn-sm m-0 py-0">Lunas</span>
					<?php endif; ?>
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
			<td><a href="?dir=pesanan&file=select&hal=<?= $i ?>"><?= $i ?></a></td>
		<?php endfor; ?>
	</tr>
</table>