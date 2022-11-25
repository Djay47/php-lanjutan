<?php

	// Pagination: Konfigurasi Pagination
	$jmlDataPerHal = 5;
	$jmlData = $database->num_row("SELECT * FROM kategori");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

	$kategori = $database->query_select("SELECT * FROM kategori ORDER BY kategori ASC LIMIT $awalData, $jmlDataPerHal");
?>

<h2>Daftar Kategori</h2>
<hr class="m-1">

<!-- Tombol Tambah -->
<a type="button" class="btn btn-primary btn-sm m-1" href="?dir=kategori&file=insert">Tambah</a>

<hr class="m-1 mb-2">

<!-- Table Data kategori -->
<table class="table table-bordered w-50 m-1">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Kategori</th>
			<th class="text-center" colspan="2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = $awalData + 1; ?>
		<?php foreach ($kategori as $ktgr) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "."; ?></td>
				<td><?= $ktgr["kategori"]; ?></td>
				<td class="text-center">
					<a href="?dir=kategori&file=update&id=<?= $ktgr["idkategori"] ?>" class="btn btn-warning btn-sm m-0 py-0">
						Perbarui
					</a>
				</td>
				<td class="text-center">
					<a href="?dir=kategori&file=confirm-delete&id=<?= $ktgr["idkategori"] ?>" class="btn btn-danger btn-sm m-0 py-0">
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
			<td><a href="?dir=kategori&file=select&hal=<?= $i ?>"><?= $i ?></a></td>
		<?php endfor; ?>
	</tr>
</table>