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

	echo '<br><br><a href="index.php">Back</a>';
?>