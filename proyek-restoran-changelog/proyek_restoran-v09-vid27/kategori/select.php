<?php

	// Pagination: Konfigurasi Pagination
	$jmlDataPerHal = 2;
	$jmlData = $database->num_row("SELECT * FROM kategori");
	$jmlHal = ceil( $jmlData / $jmlDataPerHal );
	$posHal = ( isset( $_GET["hal"] ) ? $_GET["hal"] : 1 );
	$awalData = ($jmlDataPerHal * $posHal) - $jmlDataPerHal;

	$kategori = $database->query_select("SELECT * FROM kategori ORDER BY kategori ASC LIMIT $awalData, $jmlDataPerHal");
?>

<style>
</style>

<h2>Kategori</h2>
<hr>
<a href="?dir=kategori&file=insert">Tambah Data</a>
<hr>

<!-- Table Data kategori -->
<table class="table table-bordered table-responsive w-25">
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
				<td><?= $nomor++ . "."; ?></td>
				<td><?= $ktgr["kategori"]; ?></td>
				<td class="text-center"><a href="#">Delete</a></td>
				<td class="text-center"><a href="#">Edit</a></td>
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