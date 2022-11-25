<?php
	$idmenu = $_GET["id"];
	$queryDelete = "DELETE FROM menu WHERE idmenu = $idmenu";

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
<!-- Tombol Kembali ke Daftar Menu -->
<a href="?dir=menu&file=select" type="button" class="btn btn-ouline-dar btn-sam py-0">Kembali</a>