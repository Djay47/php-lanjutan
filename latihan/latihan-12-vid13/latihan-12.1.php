<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kalkulator</title>
		<style>
			input {width: 200px;}
		</style>
	</head>
	<body>
		<form method="get" action="latihan-12.1.php">
			<input type="number" name="num1" placeholder="Left Operand" required>
			<input type="text" name="sign" placeholder="[+][-][*][/][%][/]" required>
			<input type="number" name="num2" placeholder="Right Operand" required>
			<button type="submit" name="submit"> = </button>
		</form>

		<hr>

		<?php
			if (isset($_GET["submit"]))
			{
				echo $_GET["num1"] . " " . $_GET["sign"] . " " . $_GET["num2"] . " = ";

				switch ($_GET["sign"])
				{
					case "+";
						echo $_GET["num1"] + $_GET["num2"];
						break;
					case "-";
						echo $_GET["num1"] - $_GET["num2"];
						break;
					case "*";
						echo $_GET["num1"] * $_GET["num2"];
						break;
					case "/";
						echo $_GET["num1"] / $_GET["num2"];
						break;
					case "%";
						echo $_GET["num1"] % $_GET["num2"];
						break;
				}
			}
		?>
	</body>
</html>