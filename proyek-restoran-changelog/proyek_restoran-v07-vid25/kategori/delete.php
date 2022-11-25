<?php 
	require "../functions.php";

	$id = $_GET["id"];
	
	if ( query_delete($id) > 0 )
	{
		echo "Query OK!<br>";
		echo "<hr>";
	}
	else
	{
		echo "Query Failed!<br>";
		echo mysqli_error($conn);
		echo "<br><hr>";
	}

	echo '<a href="index.php">Back</a>';
?>