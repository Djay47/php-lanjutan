<h2>Daftar Pelanggan</h2>
<hr class="m-1 mb-2">

<?php
	// Pagination: Konfigurasi Pagination
	$jmlDataPerHal = 5;
	$jmlData = $database->num_row("SELECT * FROM pelanggan");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

	$pelanggan = $database->query_select("SELECT * FROM pelanggan ORDER BY pelanggan ASC LIMIT $awalData, $jmlDataPerHal");
?>

<!-- Table Data pelanggan -->
<table class="table table-bordered w-50 m-1">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Pelanggan</th>
			<th class="text-center">Alamat</th>
			<th class="text-center">No. Telepon</th>
			<th class="text-center">Email</th>
			<th class="text-center">Status</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = $awalData + 1; ?>
		<?php foreach ($pelanggan as $plgn) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "."; ?></td>
				<td><?= $plgn["pelanggan"]; ?></td>
				<td><?= $plgn["alamat"]; ?></td>
				<td><?= $plgn["telepon"]; ?></td>
				<td><?= $plgn["email"]; ?></td>
				<td class="text-center">
					<?php if ( $plgn["status"] == 1 ) : ?>
						<a href="?dir=pelanggan&file=update-status&id=<?= $plgn["idpelanggan"] ?>&status=<?= $plgn["status"] ?>" class="btn btn-success btn-sm m-0 py-0">
							AKTIF
						</a>
					<?php else : ?>
						<a href="?dir=pelanggan&file=update-status&id=<?= $plgn["idpelanggan"] ?>&status=<?= $plgn["status"] ?>" class="btn btn-danger btn-sm m-0 py-0">
							TIDAK AKTIF
						</a>
					<?php endif; ?>
				</td>
				<td class="text-center">
					<a href="?dir=pelanggan&file=confirm-delete&id=<?= $plgn["idpelanggan"] ?>" class="btn btn-danger btn-sm m-0 py-0">
						Hapus
					</a>
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
			<td><a href="?dir=pelanggan&file=select&hal=<?= $i ?>"><?= $i ?></a></td>
		<?php endfor; ?>
	</tr>
</table>



