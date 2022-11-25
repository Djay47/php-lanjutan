<h2>Tambah Data</h2>
<hr>
<a type="button" class="btn btn-outline-dark btn-sm mx-1 my-2" href="?dir=kategori&file=select">Back</a>
<table class="table-sm mt-3">
	<form action="" method="post">
		<tr>
			<th><label for="kategori">Kategori:</label></th>
			<td><input type="text" name="kategori" id="kategori" required></td>
			<td><button type="submit" class="btn btn-success btn-sm p-1" name="simpan">Simpan</button></th>
		</tr>
	</form>
</table>

<?php
	// cek apakah tombol ave sudah ditekan atau belum
	if ( isset($_POST["simpan"]) )
	{
		// cek apakah data berhasil ditambahkan atatu tisak
		if ( $database->query_insert($_POST) >= 0 )
		{
			$kategori = htmlspecialchars( $_POST["kategori"] );
			echo "INSERT INTO kategori VALUES ('', '$kategori')<br>";
			echo "Query Ok!<br>";
		}
		else
		{
			echo "Query Failed<br>";
			echo mysqli_error($database->conn);
			echo '<hr><a href="?dir=kategori&file=insert">Refresh</a><hr>';
		}
	}
?>