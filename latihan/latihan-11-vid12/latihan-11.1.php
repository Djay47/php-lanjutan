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
		<form method="post" action="latihan-11.1.php">
			<input type="number" name="num1" placeholder="Left Operand" required>
			<input type="text" name="sign" placeholder="[+][-][*][/][%][/]" required>
			<input type="number" name="num2" placeholder="Right Operand" required>
			<button type="submit" name="submit"> = </button>
		</form>

		<hr>

		<?php
			if (isset($_POST["submit"]))
			{
				/*
				$num1 = $_POST["num1"];
				$num2 = $_POST["num2"];
				$sign = $_POST["sign"];
				*/

				echo $_POST["num1"] . " " . $_POST["sign"] . " " . $_POST["num2"] . " = ";

				switch ($_POST["sign"])
				{
					case "+";
						echo $_POST["num1"] + $_POST["num2"];
						break;
					case "-";
						echo $_POST["num1"] - $_POST["num2"];
						break;
					case "*";
						echo $_POST["num1"] * $_POST["num2"];
						break;
					case "/";
						echo $_POST["num1"] / $_POST["num2"];
						break;
					case "%";
						echo $_POST["num1"] % $_POST["num2"];
						break;
				}
			}
		?>
	</body>
</html>