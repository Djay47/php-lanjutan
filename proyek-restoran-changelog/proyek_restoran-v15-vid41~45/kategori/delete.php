<?php
	$idkategori = $_GET["id"];
	$query = "DELETE FROM kategori WHERE idkategori = $idkategori";

	if ( $database->query_delete($query) >= 0 )
	{
		echo "Query OK!<br>";
	}
	else
	{
		echo "Query Failed!<br>";
		echo mysqli_error($database->conn);
		echo "<br>";
	}
?>
<hr>
<!-- Tombol Kembali ke Daftar Kategori -->
<a type="button" class="btn btn-outline-dark btn-sm py-0" href="?dir=kategori&file=select">Kembali</a>