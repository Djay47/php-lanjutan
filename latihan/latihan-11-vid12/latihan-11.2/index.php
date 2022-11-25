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
		<form method="post" action="process.php">
			<input type="number" name="num1" placeholder="Left Operand" required>
			<input type="text" name="sign" placeholder="[+][-][*][/][%][/]" required>
			<input type="number" name="num2" placeholder="Right Operand" required>
			<button type="submit" name="submit"> = </button>
		</form>
	</body>
</html>