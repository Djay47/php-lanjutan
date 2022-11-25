<?php
	require "../functions.php";

	$id = $_GET["id"];

	$kategori = query_select("SELECT * FROM kategori WHERE idkategori = $id");

	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Update Data</title>
		<style>
			th { text-align: left; }
		</style>
	</head>
	<body>
		<a href="index.php">Cancel</a>
		<hr>
		<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id ?>">
			<table border="0" cellpadding="5" cellspacing="0">
				<tr>
					<th><label for="kategori">Kategori:</label></th>
					<td><input type="text" name="kategori" value="<?= $kategori[0]["kategori"] ?>" placeholder="<?= $kategori[0]["kategori"] ?>" id="kategori" required></td>
					<td><button type="submit" name="save">Save</button></td>
				</tr>
			</table>
		</form>
		<hr>
	</body>
</html>

<?php
	if ( isset($_POST["save"]) )
	{
		if ( query_update($_POST) > 0 )
		{
			echo "Query OK!<br>";
			echo '<a href="index.php">Back</a>';
		}
		else
		{
			echo "Query Failed!<br>";
			echo mysqli_error($conn);
			echo "<hr>";
			echo '<a href="update.php">Refresh</a>';
		}
	}
?>