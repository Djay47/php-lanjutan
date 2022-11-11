<h2>Tambah Data</h2>
<hr class="my-1">

<!-- Tombol Kembali ke Daftar Menu -->
<a type="button" class="btn btn-outline-dark btn-sm py-0 m-1" href="?dir=menu&file=select">Kembali</a>

<hr class="my-1">

<?php $kategori = $database->query_select("SELECT * FROM kategori") ?>

<!-- Table form untuk menyisipkan data baru -->
<table class="table-sm mt-3 mb-1">
	<form acton="" method="post" enctype="multipart/form-data">
		
		<!-- Pilih Kategori -->
		<tr>
			<td><label for="idkategori">Pilih Kategori</label></td>
			<td>: 
				<select name="idkategori" id="idkateori">
					<?php foreach ( $kategori as $ktgr ) : ?>
						<option value="<?= $ktgr["idkategori"] ?>">
							<?= $ktgr["kategori"] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		
		<!-- Menu -->
		<tr>
			<td><label for="menu">Menu</label></td>
			<td>: <input type="text" name="menu" id="menu" placeholder="Ketik nama menu" required></td>
		</tr>
		
		<!-- Harga -->
		<tr>
			<td><label for="harga">Harga</label></td>
			<td>: <input type="text" name="harga" id="harga" placeholder="Ketik harga menu" required></td>
		</tr>
		
		<!-- Gambar -->
		<tr>
			<td><label for="gambar">Gambar</label></td>
			<td>: <input type="file" name="gambar" id="gambar" required></td>
		</tr>
		
		<!-- Tombol Submit -->
		<tr>
			<td><button type="submit" name="simpan" class="btn btn-success btn-sm p-1 mt-3">Simpan</button></td>
		</tr>
	</form>
</table>

<?php
	if ( isset($_POST["simpan"]) )
	{
		$idkategori = (int)$_POST["idkategori"];
		$menu = htmlspecialchars($_POST["menu"]);
		$harga = htmlspecialchars($_POST["harga"]);
		$gambar = $database->upload();

		$queryInsert = "INSERT INTO menu VALUES ('', '$idkategori', '$menu', '$gambar', '$harga')";

		if ( $database->query_insert($queryInsert) >= 0 )
		{
			echo "<br>Query Ok!<br>"; 
		}
		else
		{
			echo "Query Failed<br>";
			echo mysqli_error($database->conn);
			echo '<hr><a type="button" class="btn btn-outline-dark btn-sm mx-1 my-2" href="?dir=menu&file=insert">Refresh</a><hr>';
		}
	}
?>