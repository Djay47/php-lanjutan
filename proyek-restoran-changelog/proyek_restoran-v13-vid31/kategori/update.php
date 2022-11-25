<h2>Perbarui</h2>
<hr class="my-1">

<!-- Tombol Kembali ke Daftar Kategori -->
<a type="button" class="btn btn-outline-dark btn-sm py-0 m-1" href="?dir=kategori&file=select">Kembali</a>

<hr class="my-1">

<?php
	$idkategori = $_GET["id"];
	$kategori = $database->query_select("SELECT kategori FROM kategori WHERE idkategori = $idkategori");
?>

<form action="" method="post" class="mt-3">
	<input type="hidden" name="idkategori" value="<?= $idkategori ?>">
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
		$idkategori = $_POST["idkategori"];
		$kategori = $_POST["kategori"];
		$query = "UPDATE kategori SET kategori = '$kategori' WHERE idkategori = $idkategori";
		
		if ( $database->query_update($query) >= 0 )
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