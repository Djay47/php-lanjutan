<?php
	$id = $_GET["id"];

	if ( $database->query_delete($id) >= 0 )
	{
		echo "DELETE FROM kategori WHERE idkategori = $id<br>";
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
<a type="button" class="btn btn-outline-dark btn-sm py-0" href="?dir=kategori&file=select">Back</a>