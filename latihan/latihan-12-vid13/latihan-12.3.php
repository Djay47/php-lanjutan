<!DOCTYPE html>
<html>
	<head>
		<title>Zodiak</title>
		<style>
			input {width: 100px;}
		</style>
	</head>
	<body>
		<form method="get" action="">
			<input type="number" name="bulan" min="1" max="12" placeholder="Bulan Lahir"><br>
			<input type="number" name="tanggal" min="1" max="31" placeholder="Tanggal Lahir"><br>
			<button type="submit" name="submit">Cek Zodiak</button>
		</form>

		<hr>

		<?php
			if(isset($_GET["submit"]))
			{
				switch($_GET["bulan"])
				{
					case 1:
						if($_GET["tanggal"] >= 1 && $_GET["tanggal"] <= 19)
						{
							echo "Capricorn";
						}
						else if($_GET["tanggal"] >= 20 && $_GET["tanggal"] <= 31)
						{
							echo "Aquarius";
						}
						else
						{
							echo "Tanggal Invalid";
						}
					case 2:
						if($_GET["tanggal"] >= 1 && $_GET["tanggal"] <= 18)
						{
							echo "Capricorn";
						}
						else if($_GET["tanggal"] >= 19 && $_GET["tanggal"] <= 29)
						{
							echo "Aquarius";
						}
						else
						{
							echo "Tanggal Invalid";
						}
				}
			}
		?>
	</body>
</html>