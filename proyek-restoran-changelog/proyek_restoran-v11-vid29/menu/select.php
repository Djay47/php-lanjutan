<h2>Menu</h2>
<hr class="m-1">
<a type="button" class="btn btn-primary btn-sm m-1" href="?dir=menu&file=insert">Tambah</a>
<hr class="m-1 mb-2">

<?php
	// cek apakah tombol pilih telah ditekan atau belum
	if ( isset($_POST["pilih"]))
	{
		// jika tombol pilih telah ditekn maka inisialisasi nilai variable $idkategori dengan variable superglobal $_POST["idkategori"]
		$idkategori = $_POST["idkategori"];	
		$where = "WHERE idkategori = $idkategori";
	}
	else
	{
		// jika tombol pilih tidak ditekan maka inisialisasi nilai variable $idkateogri dengan 0
		$idkategori = 0; 
		$where = "WHERE idkategori = 1";
	}
?>

<!-- akses table kategori -->
<?php $kategori = $database->query_select("SELECT * FROM kategori"); ?>

<!-- Combo Box -->
<table class="table-sm">
	<form action="" method="post" class="my-3 mx-1">
		<tr>
			<td><label for="idkategori">Pilih Kategori:</label></td>
			<td>
				<select name="idkategori" id="idkategori">
					<?php foreach ($kategori as $ktgr) : ?>
						<option value="<?= $ktgr["idkategori"] ?>" <?= ($ktgr["idkategori"] == $idkategori ) ? "selected" : ""; ?> >
							<?= $ktgr["kategori"] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
			<td>
				<button type="submit" name="pilih" class="btn btn-secondary btn-sm">Pilih</button>
			</td>
		</tr>
	</form>
</table>

<!-- akses table menu -->
<?php $menu = $database->query_select("SELECT * FROM menu $where"); ?>

<!-- Table Data Menu -->
<table class="table table-bordered w-50 m-1">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Menu</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Gambar</th>
			<th class="text-center" colspan="2">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php foreach ($menu as $mn) : ?>
			<tr>
				<td class="text-center"><?= $nomor++ . "."; ?></td>
				<td><?= $mn["menu"]; ?></td>
				<td><?= $mn["harga"] ?></td>
				<td><?= $mn["gambar"] ?></td>
				<td class="text-center">
					<a href="?dir=menu&file=update&id=<?= $mn["idmenu"] ?>" class="btn btn-warning btn-sm m-0 py-0">
						Perbarui
					</a>
				</td>
				<td class="text-center">
					<a href="?dir=menu&file=confirm-delete&id=<?= $mn["idmenu"] ?>" class="btn btn-danger btn-sm m-0 py-0">
						Hapus
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>