<?php
	$id = $_GET["id"];
	$kategori = $database->query_select("SELECT kategori FROM kategori WHERE idkategori = $id");
?>

<h2>Perbarui</h2>

<hr>

<a type="button" class="btn btn-outline-dark btn-sm" href="?dir=kategori&file=select">Kembali</a>

<form action="" method="post" class="mt-3">
	<input type="hidden" name="id" value="<?= $id ?>">
	<table class="table-sm">
		<th><label for="kategori">Kategori:</label></th>
		<td>
			<input type="text" name="kategori" value="<?= $kategori[0]["kategori"] ?>" placeholder="<?= $kategori[0]["kategori"] ?>" required>
		</td>
		<td><button type="submit" name="simpan" class="btn btn-success btn-sm">Simpan</buton></td>
	</table>
</form>

<?php
	if ( isset($_POST["simpan"]) )
	{
		if ( $database->query_update($_POST) >= 0 )
		{
			echo "Query Ok!<br>";
		}
		else
		{
			echo "Query Failed!<br>";
			echo mysqli_error($database->conn);
		}
	}
?>