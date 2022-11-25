<?php
	if (isset($_POST["submit"]))
	{
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

		echo '<br><br><a href="index.php">Back</a>';
	}
?>