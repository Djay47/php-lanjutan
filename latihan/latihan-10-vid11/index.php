<?php
	require_once "data.php";

	foreach($days as $day)
	{
		echo $day . "<br>";
	}

	echo "-------------------------------<br>";

	foreach($students as $key => $student)
	{
		echo $key . ": " . $student . "<br>";
	}
?>