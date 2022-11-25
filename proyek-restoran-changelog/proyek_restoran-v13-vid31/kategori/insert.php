<h2>Tambah Data</h2>
<hr class="my-1">

<!-- Tombol Kembali ke Daftar Kategori -->
<a type="button" class="btn btn-outline-dark btn-sm py-0 m-1" href="?dir=kategori&file=select">Kembali</a>

<hr class="my-1">

<!-- Table Form untuk menyisipkan data baru -->
<table class="table-sm mt-3">
	<form action="" method="post">
		<tr>
			<td><label for="kategori">Kategori:</label></td>
			<td><input type="text" name="kategori" id="kategori" placeholder="Nama Kategori" required></td>
			<td><button type="submit" name="simpan" class="btn btn-success btn-sm p-1">Simpan</button></td>
		</tr>
	</form>
</table>

<?php
	// cek apakah tombol simpan sudah ditekan atau belum
	if ( isset($_POST["simpan"]) )
	{
		$kategori = htmlspecialchars( $_POST["kategori"] );
		$query = "INSERT INTO kategori VALUES ('', '$kategori')";

		// cek apakah data berhasil ditambahkan atau tidak
		if ( $database->query_insert($query) >= 0 )
		{
			echo "<br>Query Ok!<br>";
		}
		else
		{
			echo "Query Failed<br>";
			echo mysqli_error($database->conn);
			echo '<hr><a type="button" class="btn btn-outline-dark btn-sm mx-1 my-2" href="?dir=kategori&file=insert">Refresh</a><hr>';
		}
	}
?>
