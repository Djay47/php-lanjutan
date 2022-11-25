<?php
	$idpelanggan = $_GET["id"];
	$queryDelete = "DELETE FROM pelanggan WHERE idpelanggan = $idpelanggan";

	if ( $database->query_delete($queryDelete) >= 0 )
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
<!-- Tombol Kembali ke Daftar Pelanggan -->
<a href="?dir=pelanggan&file=select" type="button" class="btn btn-ouline-dar btn-sam py-0">Kembali</a>