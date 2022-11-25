<?php
	session_start();

	function makeSession()
	{
		$_SESSION["name"] = "Adi Jaya";
		$_SESSION["absen"] = 11088;
		$_SESSION["kelas"] = "XI";
		$_SESSION["jurusan"] = "RPL";
	}

	// makeSession();

	// print_r($_SESSION);

	echo '<a href="?select=make">Make</a><br>';
	echo '<a href="?select=delete">Delete All</a><br>';

	echo '<hr>';

	if( isset($_GET["select"]) )
	{
		switch($_GET["select"])
		{
			case "make":
				makeSession();

				// foreach($_SESSION as $value)
				// {
				// 	echo $value . '<br>';
				// }

				print_r($_SESSION);
				break;

			case "delete":
				session_destroy();
				print_r($_SESSION);
				break;
		}
	}


?>