<?php
	require "../functions.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Insert</title>
	</head>
	<body>
		<h1>Data Insert</h1>
		
		<hr>

		<table border="0" cellpadding="5" cellspacing="0">
			<form action="" method="post">
				<tr>
					<th><label for="kategori">Kategori: </label></th>
					<td><input type="text" name="kategori" id="kategori" required></td>
					<th><button type="submit" name="ave">Save</button></th>
				</tr>
			</form>
		</table>
		
		<hr>
		<a href="index.php">Back</a>
		<hr>
	</body>
</html>

<?php
	// cek apakah tombol ave sudah ditekan atau belum
	if ( isset($_POST["ave"]) )
	{
		// cek apakah data berhasil ditambahkan atatu tisak
		if ( query_insert($_POST) > 0 )
		{
			$kategori = htmlspecialchars( $_POST["kategori"] );

			echo "<i>INSERT INTO kategori VALUES ('', '$kategori')</i><br>";
			echo "Query Ok";
		}
		else
		{
			echo "Query Failed<br>";
			echo mysqli_error($conn);
			echo '<hr><a href="insert.php">Refresh</a><hr>';
		}
	}
?>