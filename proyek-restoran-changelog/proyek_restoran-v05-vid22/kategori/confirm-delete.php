<?php
	$id = $_GET["id"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Delete Confirm</title>
		<style>
			table { margin: auto; }
		</style>
	</head>
	<body>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th colspan="2">Delete?</th>
			</tr>
			<tr>
				<td><a href="index.php">Cancel</a></td>
				<td><a href="delete.php?id=<?= $id ?>">Next</a></td>
			</tr>
		</table>
	</body>
</html>