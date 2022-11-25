<h2>Daftar User</h2>
<hr class="m-1">

<!-- Tombol Tambah -->
<a type="button" class="btn btn-primary btn-sm m-1" href="?dir=user&file=insert">Tambah</a>

<hr class="m-1 mb-2">

<?php
	// Pagination: Konfigurasi Pagination
	$jmlDataPerHal = 5;
	$jmlData = $database->num_row("SELECT * FROM user");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

	$user = $database->query_select("SELECT * FROM user ORDER BY user ASC LIMIT $awalData, $jmlDataPerHal");
?>

<!-- Table Data pelanggan -->
<table class="table table-bordered w-75 m-1">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">User</th>
			<th class="text-center">Email</th>
			<th class="text-center">Posisi</th>
			<th class="text-center">Status</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = $awalData + 1; ?>
		<?php foreach ($user as $usr) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "."; ?></td>
				<td><?= $usr["user"]; ?></td>
				<td><?= $usr["email"]; ?></td>
				<td><?= $usr["posisi"]; ?></td>
				<td class="text-center">
					<?php if ( $usr["status"] == 1 ) : ?>
						<a href="?dir=user&file=update-posisi&id=<?= $usr["iduser"] ?>&status=<?= $usr["status"] ?>" class="btn btn-success btn-sm m-0 py-0">
							AKTIF
						</a>
					<?php else : ?>
						<a href="?dir=user&file=update-posisi&id=<?= $usr["iduser"] ?>&status=<?= $usr["status"] ?>" class="btn btn-danger btn-sm m-0 py-0">
							BANNED
						</a>
					<?php endif; ?>
				</td>
				<td class="text-center">
					<a href="?dir=user&file=confirm-delete&id=<?= $usr["iduser"] ?>" class="btn btn-danger btn-sm m-0 py-0">
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
			<td><a href="?dir=user&file=select&hal=<?= $i ?>"><?= $i ?></a></td>
		<?php endfor; ?>
	</tr>
</table>

<!-- Update Status -->
<?php
	if ( isset($_GET["id"]) )
	{
		$iduser = (int)$_GET["id"];
		$chgStatus = ($_GET["status"] == 1) ? 0 : 1;
		$queryUpdateStatus = "UPDATE user SET status = $chgStatus WHERE iduser = $iduser";
		$database->run_query($queryUpdateStatus);
	}
?>