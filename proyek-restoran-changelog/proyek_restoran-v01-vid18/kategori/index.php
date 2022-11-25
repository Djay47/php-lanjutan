<?php
	require '../functions.php';

	/*
	$query = "SELECT * FROM kategori";

	$result = mysqli_query($conn, $query);

	$rows = [];

	while($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}

	foreach($rows as $row)
	{
		echo $row["idkategori"] . " | " .$row["kategori"] . "<br>";
	}
	*/

	
	$kategori = query_select("SELECT * FROM kategori");

	// hilangkan comment untuk debugging
	/*
	foreach($kategori as $ktgr)
	{
		echo $ktgr["idkategori"] . " | " . $ktgr["kategori"] . "<br>";
	}
	*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kategori Page</title>
	</head>
	<body>
		<table border = "1" cellpadding = "5" cellspacing = "0">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kategori</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>

				<?php foreach($kategori as $ktgr) : ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $ktgr["kategori"] ?></td>
					</tr>
					
					<?php ++$i; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>